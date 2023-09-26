<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", function () {
    return response("<h1>Hello</h1>", 300)
    ->header('Content-Type', 'text/plain')
    ->header('foo', 'bar');
});

Route::get("/posts/{id}", function($id){
    // dd($id); // Dump and Die - it will stop everything and show data
    // ddd($id); // Dump Debbug Die - special debbug view
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // name of parameter, regular expression, what this parametert should be 

Route::get('/search', function(Request $request){ // right click, then import class
    // dd($request);
    // dd("Name: " . $request->name . " City: " . $request->city);
    return  $request->name . ' ' . $request->city;
});