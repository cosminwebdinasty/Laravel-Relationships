<?php

use Illuminate\Support\Facades\Route;


use App\Models\User;
use App\Models\Photo;
use App\Models\Staff;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function(){
	
	$staff = Staff::find(3);
	
	$staff->photos()->create(['path'=>'new.jpg']);
	
});



Route::get('/read', function(){
	
	$staff = Staff::findOrFail(2);
	
	foreach($staff->photos as $photo){
		
		return $photo->path;
		
	}
	
});



Route::get('/update', function(){
	
	$staff = Staff::findOrFail(2);
	
	$photo = $staff->photos()->whereId(2)->first();
	
	$photo->path = "updated.jpg";
	
	$photo->save();
	
} );




Route::get('/delete', function(){
	
	$staff = Staff::findOrFail(2);
	
	$staff->photos()->delete();
	
});



Route::get('/assign', function(){
	
	$staff = Staff::findOrFail(3);
	
	$photo = Photo::findOrFail(5);
	
	$staff->photos()->save($photo);
	
});


Route::get('/unassign', function(){
	
	$staff = Staff::findOrFail(3);
	
	
	$staff->photos()->whereId(5)->update(['imageable_id'=>'', 'imageable_type'=>'']);
	
});





