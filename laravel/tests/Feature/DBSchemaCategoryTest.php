<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use Exception;

class DBSchemaCategoryTest extends TestCase
{
  use RefreshDatabase;
   /**
     * Description: Verify categories table structure
     * Precondition: Database migrated
     * Test Steps: 1. Get columns from categories table
     *             2. Check for required columns
     * Test Data: None
     * Expected Result: Table should have all expected columns
     * Actual Result: Table has all expected columns
     * Status: Passed
     * Remark: None
     */
 
    
     public function test_categories_table_has_expected_columns(){
        $this->assertTrue(
            Schema::hasColumns('categories', [
                'id', 'name', 'created_at', 'updated_at'
            ]),
            'Categories table does not have expected columns.'
        );
    }



        /**
     * Description: Verify name column constraint
     * Precondition: None
     * Test Steps: 1. Attempt to insert null name
     * Test Data: ['name' => null]
     * Expected Result: Should throw QueryException
     * Actual Result: Throws QueryException
     * Status: Passed
     * Remark: None
     */

     public function test_name_column_cannot_be_null()
     {
         $this->expectException(QueryException::class);
 
         Category::create([
             'name' => null,
            
         ]);
     }
 

        /**
     * Description: Verify name column accepts only strings
     * Precondition: Database migrated
     * Test Steps: 1. Attempt to insert non-string name via Eloquent
     *             2. Check for database exceptions
     * Test Data: ['name' => 123] (integer)
     * Expected Result: Should throw database exception
     * Actual Result: Throws database exception
     * Status: Passed
     * Remark: Depends on DB column type (e.g., VARCHAR)
     */

     public function test_name_column_accepts_only_strings()
    {
//     $validator = Validator::make(
//         ['name' => 123],
//         ['name' => 'string'] // Validation rule
//     );

//     $this->assertFalse($validator->passes());
//     $this->assertStringContainsString('must be a string', $validator->errors()->first('name'));

// Attempt to insert an invalid value (non-string)
    try {
        DB::table('categories')->insert([
            'name' => 123, //  to insert an integer
        ]);
    } catch (Exception $e) {
        // Catch the exception thrown due to invalid data type
        $this->assertTrue(true);  // Test passes if an exception occurs
        return;
    }

// Fail the test if no exception is thrown (meaning the database did not enforce the constraint)
    $this->fail('Database did not enforce string constraint for the name column.');


}



    
}
