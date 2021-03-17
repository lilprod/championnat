<?php

use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/', 'DashboardController@index')->name('dashboard');

// Registration Routes...
Route::get('inscription', 'Auth\RegisterController@showRegistrationForm')->name('inscription');

Route::post('save', 'Auth\RegisterController@save')->name('save');

Route::get('/getStades', 'Auth\RegisterController@getStades')->name('getStades');

Route::name('admin.')->group(function () {

    Route::group(['prefix' => 'admin'], function () {  

        Route::resource('typemedias', 'TypeMediaController');

        Route::resource('villes', 'VilleController');

        Route::resource('journees', 'JourneeController');

        Route::resource('stades', 'StadeController');

        Route::resource('administrators', 'UserController');

        Route::resource('roles', 'RoleController');

        Route::resource('permissions', 'PermissionController');

        Route::resource('evenements', 'EvenementController');

    });
});

Route::resource('profils', 'ProfilController');

Route::post('/updatepassword', 'ProfilController@updatePassword')->name('updatepassword');

/*Route::get('/create_role_permission', function () {
    $role = Role::create(['name' => 'Admin']);
    $permission = Permission::create(['name' => 'Admin Permissions']);
    auth()->user()->assignRole('Admin');
    auth()->user()->givePermissionTo('Admin Permissions');  
});*/
