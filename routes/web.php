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

Route::post('register', 'Auth\RegisterController@createMedia');

//Route::post('register', 'Auth\RegisterController@register');

Route::post('save', 'Auth\RegisterController@save')->name('save');

//Route::get('/getStades', 'Auth\RegisterController@getStades')->name('getStades');
Route::get('/getStades', 'DashboardController@getStades')->name('getStades');

//Activé Journée

Route::get('changeStatus', 'JourneeController@ChangeUserStatus')->name('changeStatus');

//Activé compte d'un Media
Route::get('updateStatus', 'AdminController@ChangeUserStatus')->name('updateStatus');

//Account Verification
Route::get('/verify', 'VerifyController@getVerify')->name('getVerify');

Route::post('/verify', 'VerifyController@postVerify')->name('verify');

//Post Category

//Route::get('categorie/{slug}', ['as' => 'categoryPosts', 'uses' => 'PagesController@categoryPosts']);

//Route::get('post/{slug}', ['as' => 'blog.show', 'uses' => 'PagesController@postDetails']);

//Route::get('post/author/{name}', ['as' => 'author.show', 'uses' => 'PagesController@authorPost']);

Route::get('categorie/check_slug', 'CategoryController@check_slug')->name('category.check_slug');

Route::get('postn/check_slug', 'PostController@check_slug')->name('post.check_slug');

Route::get('/pending/posts', 'PostController@pending')->name('pending_posts');

Route::resource('posts', 'PostController');

//Route Super Admin

Route::name('super.')->group(function () {

    Route::group(['prefix' => 'super'], function () {  

        Route::resource('users', 'UserController');
    });
});

//Routes Admin

Route::name('admin.')->group(function () {

    Route::group(['prefix' => 'admin'], function () {  

        Route::resource('categories', 'CategoryController');

        Route::resource('medias', 'MediaController');

        Route::get('/pending/media', 'MediaController@pending')->name('pending_media');

        Route::resource('typemedias', 'TypeMediaController');

        Route::resource('typeaccreditations', 'TypeAccreditationController');

        Route::resource('villes', 'VilleController');

        Route::resource('journees', 'JourneeController');

        Route::resource('stades', 'StadeController');

        Route::resource('administrators', 'AdminController');

        Route::resource('roles', 'RoleController');

        Route::resource('permissions', 'PermissionController');

        Route::resource('evenements', 'EvenementController');

        Route::resource('accreditations', 'InscriptionController');

        Route::patch('international/accreditation/upadte', 'InscriptionController@international_update')->name('international_accreditation_update');

        Route::get('international/accreditation/{id}/edit', ['as' => 'inter_accreditation_edit', 'uses' => 'InscriptionController@edit_inter']);
        
        Route::get('/inscription/media', 'EtatController@media')->name('inscription_media');

        Route::get('/inscription/stade', 'EtatController@stade')->name('inscription_stade');

    });
});

//Routes Media

Route::name('media.')->group(function () {

    Route::group(['prefix' => 'media'], function () {  

        Route::resource('accreditations', 'AccreditationController');

        Route::post('international/accreditation/save', 'AccreditationController@save')->name('international_accreditation_save');

        Route::patch('international/accreditation/upadte', 'AccreditationController@international_update')->name('international_accreditation_update');
        
        Route::get('international/accreditation/{id}/edit', ['as' => 'inter_accreditation_edit', 'uses' => 'AccreditationController@edit_inter']);
        
        Route::get('/accreditation/pending', 'AccreditationController@pending')->name('accreditation_pending');

        Route::get('/accreditation/archived', 'AccreditationController@archived')->name('accreditation_archived');

    });
});     

Route::get('post/inscription/stade', 'EtatController@postStade')->name('post_inscription_stade');

Route::get('post/inscription/media', 'EtatController@postMedia')->name('post_inscription_media');

Route::post('search/inscription/stade', 'EtatController@searchStade')->name('search_inscription_stade');

Route::post('search/inscription/media', 'EtatController@searchMedia')->name('search_inscription_medie');

Route::resource('profils', 'ProfilController');

Route::post('/updatepassword', 'ProfilController@updatePassword')->name('updatepassword');

/*Route::get('/create_role_permission', function () {
    $role = Role::create(['name' => 'Admin']);
    $permission = Permission::create(['name' => 'Admin Permissions']);
    auth()->user()->assignRole('Admin');
    auth()->user()->givePermissionTo('Admin Permissions');  
});*/
