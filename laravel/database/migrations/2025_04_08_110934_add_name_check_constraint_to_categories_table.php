<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the check constraint for the 'name' column
        DB::statement("ALTER TABLE categories ADD CONSTRAINT name_is_alpha 
    CHECK (name REGEXP '^[A-Za-z[:space:]]+$')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the check constraint
        $connection = DB::connection();
    
        if ($connection instanceof \Illuminate\Database\PostgresConnection || 
            $connection instanceof \Illuminate\Database\MySqlConnection) {
            DB::statement('ALTER TABLE categories DROP CONSTRAINT IF EXISTS name_is_alpha');
        }
    }
};
