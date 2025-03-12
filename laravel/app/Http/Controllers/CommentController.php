<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function getComments(){
        return response()->json([
            'message' => 'Get all comments'
        ]);
    }
}
