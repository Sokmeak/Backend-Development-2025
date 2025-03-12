<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    //

    public function getRatings(){
        return response()->json([
            'message' => 'Get all ratings'
        ]);
    }
}
