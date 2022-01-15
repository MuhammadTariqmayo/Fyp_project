<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommitteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CsvFile;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SuperviseradviserController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Superadmin
Route::get('/committe_list',[CommitteController::class,'index'])->name('committe.index');
Route::get('/committe_create',[CommitteController::class,'create'])->name('committe.create');
Route::post('/committe_store',[CommitteController::class,'store'])->name('committe.store');
Route::get('/committe_show',[CommitteController::class,'show'])->name('committe.show');
Route::get('/committe_edit/{id}',[CommitteController::class,'edit'])->name('committe.edit');
Route::post('/committe_update/{id}',[CommitteController::class,'update'])->name('committe.update');
Route::get('/committe_destroy/{id}',[CommitteController::class,'destroy'])->name('committe.destroy');


// Committe
Route::get('/',function(){
    return view('welcome');
});
Route::get('csv_file',[CsvFile::class,'index'])->name('csv_file');
Route::any('csv_file/import',[CsvFile::class,'csv_import'])->name('import');
Route::get('csv_file/export',[CsvFile::class,'csv_export'])->name('export');
Route::any('csv_file_pagination',[CsvFile::class,'show'])->name('csv_file_pagination');


// students

Route::get('student',[StudentController::class,'index']);
Route::get('/student_list',[StudentController::class,'show'])->name('student_list');
Route::get('/student_edit/{id}',[StudentController::class,'edit'])->name('student_edit');
Route::any('/student_update/{id}',[StudentController::class,'send'])->name('student_update');
Route::any('/student_delete/{id}',[StudentController::class,'delete'])->name('student_delete');
Route::any('/student_request/{id}',[StudentController::class,'create'])->name('student_request');
Route::get('/mylist',[StudentController::class,'store'])->name('mylist');
Route::any('/student_accept/{id}',[StudentController::class,'accept'])->name('student_accept');
Route::any('/student_reject/{id}',[StudentController::class,'reject'])->name('student_reject');
Route::any('/superviser_adviser_ideas',[StudentController::class,'ideas'])->name('superviser_adviser_ideas');
Route::any('/superviser_adviser_ideas',[StudentController::class,'allideas'])->name('superviser_adviser_ideas');


// superviser/Adviser

Route::get('/supervisor',[SuperviseradviserController::class,'show'])->name('supervisor');
Route::get('/idea',[SuperviseradviserController::class,'index'])->name('idea');
Route::post('/idea',[SuperviseradviserController::class,'create'])->name('idea');
Route::get('/myideas',[SuperviseradviserController::class,'shows'])->name('myideas');
Route::any('/myideas',[SuperviseradviserController::class,'allideas'])->name('myideas');
Route::any('/adviser_request/{id}',[SuperviseradviserController::class,'send'])->name('adviser_request');
Route::any('/adviser_delete/{id}',[SuperviseradviserController::class,'destroy'])->name('adviser_delete');
Route::get('/adviserlist',[SuperviseradviserController::class,'store'])->name('adviserlist');
Route::any('/adviser_accept/{id}',[SuperviseradviserController::class,'accept'])->name('adviser_accept');
Route::any('/adviser_reject/{id}',[SuperviseradviserController::class,'reject'])->name('adviser_reject');


