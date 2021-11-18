<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\TagsController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('blog.about');
})->name('about');

Route::get('/blog', function () {
    return view('blog.blog');
})->name('blog');

Route::get('/detail', function () {
    return view('blog.detail');
})->name('detail');


require __DIR__.'/auth.php';


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostController@index')->name('index');
            Route::get('/create',                                       'PostController@create')->name('create');
            Route::post('/',                                            'PostController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostController@update')->name('update');
            Route::delete('/{post}',                                    'PostController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('blogs')->name('blogs/')->group(static function() {
            Route::get('/',                                             'BlogController@index')->name('index');
            Route::get('/create',                                       'BlogController@create')->name('create');
            Route::post('/',                                            'BlogController@store')->name('store');
            Route::get('/{blog}/edit',                                  'BlogController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BlogController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{blog}',                                      'BlogController@update')->name('update');
            Route::delete('/{blog}',                                    'BlogController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tags')->name('tags/')->group(static function() {
            Route::get('/',                                             'TagsController@index')->name('index');
            Route::get('/create',                                       'TagsController@create')->name('create');
            Route::post('/',                                            'TagsController@store')->name('store');
            Route::get('/{tag}/edit',                                   'TagsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TagsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tag}',                                       'TagsController@update')->name('update');
            Route::delete('/{tag}',                                     'TagsController@destroy')->name('destroy');
        });
    });
});
