<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function getAuthors(){
        return response()->json([
            'message' => 'Get all authors'
        ]);
    }
}
