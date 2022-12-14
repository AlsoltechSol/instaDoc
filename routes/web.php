<?php

use App\Http\Controllers\Backend\LabcenterController;
use App\Http\Controllers\Backend\LabCenterController as BackendLabCenterController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);
    
    //doctor
    Route::resource('doctor', 'Backend\DoctorController', ['names' => 'admin.doctor']);

    //patient
    Route::resource('patient', 'Backend\PatientController', ['names' => 'admin.patient']);

    //visa/passport/travel 
    Route::resource('vpt_request', 'Backend\VPT_Controller', ['names' => 'admin.vpt_request']);

    //medical-record
    Route::resource('medical_record', 'Backend\MedicalRecordController', ['names' => 'admin.medical_record']);

    //appointment
    Route::resource('appointment', 'Backend\AppointmentPatientController', ['names' => 'admin.appointment']);


    //slot
    Route::resource('slot', 'Backend\SlotController', ['names' => 'admin.slot']);

    
    //lab-center
    Route::resource('lab-center', BackendLabCenterController::class, ['names' => 'admin.lab_centers']);


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    // Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    // Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
