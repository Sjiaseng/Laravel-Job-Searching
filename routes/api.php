<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Note: /api/posts
Route::get('/posts-test', function(){
    return response()->json([
        'posts' => [
            [
                'title' => 'Post One'
            ]
        ]
    ]);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
