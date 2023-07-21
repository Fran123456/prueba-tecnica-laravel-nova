<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    $var = "[{
          attachTo: { element: '#foo' },
          content: { title: 'Welcome!' }
        },
        {
          attachTo: { element: '#bar' },
          content: {
            title: 'Do it!',
            description: 'This is a description field and I really don't know what to write here...'
          }
        },
        {
          attachTo: { element: '#bar2' },
          content: {
            title: 'Do it! 2',
            description: '2.'
          }
        }
    ]";
    $var = [
        array(
            "attachTo"=> array("element"=>'#foo' , "content" => array("title"=>"Welcome"))
        ),
        array(
            "attachTo"=> array("element"=>'#bar' , "content" => array("title"=>"Do it!", "description"=>"xxxx"))
        ),
        array(
            "attachTo"=> array("element"=>'#bar2' , "content" => array("title"=>"final"))
        ),
        ];
    return $var;




});
