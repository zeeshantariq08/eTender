<?php

use App\Province;
use App\Tender;
use App\TenderCategory;
use App\UserGroup;

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

Route::get('/admin', function () {
   return redirect('login');
});
Route::get('/', function () {
    $provinces = Province::with('districts')->get();
    $categories = TenderCategory::get(['id','title']);
    return view('main.index', compact('categories', 'provinces'));
})->name('main.index');

Route::get('/search', function () {
    $provinces = Province::with('districts')->get();
    $categories = TenderCategory::get(['id','title']);
    return view('main.search', compact('categories', 'provinces'));
})->name('search');


// Route::get('/tender-detail', function () {
//    return view('tender.tender-detail');
// });

// Route::get('files/{file_name}', function($file_name = null)
// {
//     $path = storage_path().'/'.'app'.'/files/'.$file_name;
//     if (file_exists($path)) {
//         return Response::download($path);
//     }
// })->name('download');


Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('IsAdmin')->name('home');

Route::get('/Clientlogin', function () {
    return view('main.login')->with('usergroups',UserGroup::whereIn('name', ['Tenderer','Bidder'])->get());;
})->name('clientLogin');

Route::get('/post-tender', function () {
    $provinces = Province::with('districts')->get();
    $categories = TenderCategory::get(['id','title']);

    return view('main.post-tender',  compact('categories', 'provinces'));
    //return view('main.create-bid');

})->name('postTender');

Route::get('/tender-list', function () {
    $tenders = Tender::with('tenderCategories')->orderBy('id','DESC')->get();
    return view('main.tenders', compact('tenders'));
})->name('tenders');

Route::get('tender-detail/{id}', 'FrontManagement\FrontmanagementController@tender_detail')->name('tender.detail');

Route::get('post-bid/{id}', 'FrontManagement\FrontmanagementController@add_bid')->name('post.bid');

Route::post('filter-tenders', 'FrontManagement\FrontmanagementController@getTenders')->name('filter.tender');



// UserManagement Routes
// ======== Athuntication ========== //
// UserManagement Module Require To Access this group Routes
Route::group([ 'namespace' => 'UserManagement', 'prefix' => 'UserManagement'], function () {

    Route::get('/', 'UserManagementController@index')->name('usermanagement.index');
	// User CRUD Routes
	Route::resource('users', 'UserController');

    Route::get('change-password','UserController@ChangePassword')->name('password.change');
    Route::post('change-password','UserController@UpdatePassword')->name('password.update');
    Route::put('users/status/{id}', 'UserController@toggleStatus')->name('users.toggleStatus');

    // // User Groups CRUD Routes
    Route::resource('usergroups', 'UserGroupController');
    Route::put('usergroups/status/{id}', 'UserGroupController@toggleStatus')->name('usergroups.toggleStatus');

    //Permission Controller

    Route::resource('permissions', 'PermissionController');

});

Route::group([ 'namespace' => 'Admin'], function () {

    //Route::get('/', 'UserManagementController@index')->name('usermanagement.index');
	Route::resource('tenderCategories', 'TenderCategoryController')->only('store'); 
    Route::resource('tenders', 'TenderController');
    Route::put('tender/status/{id}', 'TenderController@tenderStatus')->name('tenders.tenderStatus');

    Route::get('Districts/get_by_province', 'TenderController@get_by_province')->name('districts.get_by_province');
    // Route::resource('tenders.bids', 'AnswersController')->except('index','create','show');
    Route::resource('tenders.bids', 'BidsController');
    Route::put('bidding/status/{id}', 'BidsController@toggleStatus')->name('bidding.toggleStatus');
});

// Route::group([ 'namespace' => 'FrontManagement'], function () {

// });

Route::resource('clients', 'ClientManagement\ClientController');

Route::post('client/login', 'ClientManagement\ClientController@login')->name('client.login');
Route::post('client/logout', 'ClientManagement\ClientController@logout')->name('client.logout');



