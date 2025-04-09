<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
   /**
    * Description: Check if we can access the get all categories api
    * Precondition: None
    * Test Steps: 1. Hit the get all categories api
    *    2. Check if the response status is 200
    * Test Data : None
    * Expected Result: The response status should be 200
    * Actual Result: The response status is 200
    * Status: Passed
    * Remark: None
    */

    // get all categories api
    public function test_if_we_can_access_get_all_categories_api(): void
    {
        
    $response = $this->get('/api/categories');
    $response->assertStatus(200)
        ->assertJson([
            'message' => 'Get all categories success!',
            
        ]);
    }

    /**
     * Description: Check if we can access the create category api
     * Precondition: None
     * Test Steps: 1. Hit the create category api
     *    2. Check if the response status is 200
     * Test Data: 'name' => 'Electronics', 
     * Expected Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */
    // create category api
    public function test_if_we_can_access_create_category_api(): void
    {
       
        
          $response = $this->post('/api/categories', [
          'name' => 'Books',
         ]);


        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Category created successfully',
                'category' => [
                    'name' => 'Books',
                ]
            ]);
    }


        /**
     * Description: Verify single category retrieval
     * Precondition: Category must exist
     * Test Steps: 1. Create test category
     *             2. Hit GET /api/categories/{id}
     *             3. Check response
     * Test Data: 1 category record
     * Expected Result: Should return 200 status with category data
     * Actual Result: Returns 200 status with category data
     * Status: Passed
     * Remark: None
     */
    // get single category api
    public function test_if_we_can_access_get_single_category_api(): void
    {
        $category = Category::create([
            'name' => 'Test my Category',
        ]);
        $response = $this->get('/api/categories/' . $category->id);
        $response->assertStatus(200)
        ->assertJson([
            'message' => 'Get category success',
            'category' => [
                'id' => $category->id,
                'name' => 'Test my Category',
            ]
        ]);
    }


        /**
     * Description: Verify category update
     * Precondition: Category must exist
     * Test Steps: 1. Create test category
     *             2. Send PUT request with update data
     *             3. Check response and database
     * Test Data: ['name' => 'Updated Name']
     * Expected Result: Should return 200 status with updated data
     * Actual Result: Returns 200 status with updated data
     * Status: Passed
     * Remark: None
     */

    // update category api
    public function test_if_we_can_access_update_category_api(): void
    {
        $category = Category::create([
            'name' => 'Category',
        ]);
        $response = $this->patch('/api/categories/'.$category->id, [
            'name' => 'new Category',
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Category updated successfully',
                'category' => [
                    'id'=> $category->id,
                    'name' => 'new Category',

                ]
            ]);
    }
    /**
     * Description: Verify category deletion
     * Precondition: Category must exist
     * Test Steps: 1. Create test category
     *             2. Send DELETE request
     *             3. Check response and database
     * Test Data: None
     * Expected Result: Should return 200 status with success message
     * Actual Result: Returns 200 status with success message
     * Status: Passed
     * Remark: None
     */
    // delete category api
    public function test_if_we_can_access_delete_category_api(): void
    {
        $category = Category::create([
            'name' => 'Test Category',
        ]);

        // include soft delete
        $response = $this->delete('/api/categories/'. $category->id);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Category deleted successfully',
            ]);
    }



}
