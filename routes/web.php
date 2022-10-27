<?php

use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;


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


Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Account
Route::get('user/account', [UserController::class, 'viewAccount'])->name("user.account");


// Resource Controllers
Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('employment', EmploymentController::class);
Route::resource('education', EducationController::class);
Route::resource('users', UserController::class);
Route::resource('entries', EntryController::class);

//Contact
Route::get('/contact', function () {
    return (new ContactController())->show();
})->name("contact");
Route::post('/contact', function (Request $request) {
    return (new ContactController())->send($request);
});

Route::get("/about", function(){
   return view("about");
})->name("about");

require __DIR__.'/auth.php';
