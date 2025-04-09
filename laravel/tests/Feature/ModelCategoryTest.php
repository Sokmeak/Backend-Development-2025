<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;
use Illuminate\Database\QueryException;


class ModelCategoryTest extends TestCase
{


    /**
     * Description: Verify category model creation
     * Precondition: None
     * Test Steps: 1. Create category with factory
     *             2. Check model attributes
     * Test Data: ['name' => 'Test', 'description' => 'Test']
     * Expected Result: Should create with correct attributes
     * Actual Result: Creates with correct attributes
     * Status: Passed
     * Remark: None
     */

     public function test_category_model_can_be_created()
     {
         $category = Category::factory()->create([
             'name' => 'Test',
            
         ]);
 
         $this->assertDatabaseHas('categories', [
             'name' => 'Test',
          
         ]);
     }



    


        /**
     * Description: Verify name is required
     * Precondition: None
     * Test Steps: 1. Attempt to create category with null name
     * Test Data: ['name' => null]
     * Expected Result: Should throw QueryException
     * Actual Result: Throws QueryException
     * Status: Passed
     * Remark: None
     */
    public function test_name_field_is_required()
    {
        $this->expectException(QueryException::class);

        Category::create([
            'name' => null,
        ]);
    }


    /**
     * Description: Verify name is unique
     * Precondition: None
     * Test Steps: 1. Create category with factory
     *             2. Attempt to create another category with same name
     * Test Data: ['name' => 'Test']
     * Expected Result: Should throw QueryException
     * Actual Result: Throws QueryException
     * Status: Passed
     * Remark: None
     */
    public function test_it_requires_unique_name() {

       
      
    // Category::factory()->create(['name' => 'Test']);
    
    // $response = $this->postJson('/api/categories', [
    //     'name' => 'Test'
    // ]);
    
    // $response->assertStatus(422)
    //     ->assertJsonValidationErrors(['name']);


    $existingCategory = Category::factory()->create(['name' => 'Electronics']);
    
    // Act - Attempt to create duplicate
    $response = $this->postJson('/api/categories', [
        'name' => 'Electronics' // Same name as existing
    ]);
    
    // Assert
    $response->assertStatus(422) // HTTP 422 Unprocessable Entity
        ->assertJsonValidationErrors(['name'])
        ->assertJson([
            'message' => 'The name has already been taken.',
            'errors' => [
                'name' => [
                    'The name has already been taken.'
                ]
            ]
        ]);
    
   
    
}

}
