<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
   // Get /api/products

public function getProducts()
{
    return ["message" => "Getting list of products"];
}

// Post /api/products

public function createProduct()
{
    return ["message" => "Creating a new product"];
}

// Get /api/products/{productId}

public function getProduct($productId)
{
    return ["message" => "Getting a product based on given $productId"];
}

// Patch /api/products/{productId}

public function updateProduct($productId)
{
    return ["message" => "Updating a product based on given $productId"];
}

// Delete /api/products/{productId}

public function deleteProduct($productId)
{
    return ["message" => "Deleting a product based on given $productId"];
}



}
