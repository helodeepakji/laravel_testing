<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Student;
use App\Http\Controllers\StudentController;
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
    return view('index');
});

Route::post('/contact', function (Request $request) {
    $contact = new Contact;
    $contact->fullname = $request->post('fullname');
    $contact->email = $request->post('email');
    $contact->message = $request->post('message');
    $contact->save();
    return redirect('/');
});

Route::get('/contact', function () {
    $contact = Contact::all();
    return view('contact',['contact' => $contact]);
});



Route::get('/student',[StudentController::class , 'viewStudent']);
Route::post('/student',[StudentController::class , 'saveStudent']);
Route::get('/deletestudent/{id}',[StudentController::class , 'deleteStudent']);
Route::get('/student/{id}',[StudentController::class , 'getStudent']);
Route::post('/student/{id}',[StudentController::class, 'updateStudent']);