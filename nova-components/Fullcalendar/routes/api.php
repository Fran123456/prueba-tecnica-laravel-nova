<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

 Route::get('/', function (Request $request) {
   // return User::select('name as title',DB::raw('strftime("created_at", "%d-%m-%Y") as date') )->get();

    $data = User::select('name as title', 'created_at as date' )->get();
    
    return $data;
 });
