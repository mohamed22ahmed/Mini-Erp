<?php


Route::prefix('dashboard')->group(function(){

    Route::get('login','DashboardController@login');
    Route::post('login','DashboardController@loggedin');
    Route::get('forget','DashboardController@forget');
    Route::post('forget','DashboardController@forget_send');
    Route::get('code','DashboardController@code');
    Route::post('code','DashboardController@code_check');
    Route::get('reset_pass','DashboardController@reset_page');
    Route::post('reset_pass','DashboardController@reset');

    Route::get('/','DashboardController@index');


    // Branch Routes
    Route::get('branches', 'BranchController@index')->name('branches');
    Route::get('branches/getdata', 'BranchController@getdata')->name('branches.getdata');
    Route::post('branches/postdata', 'BranchController@postdata')->name('branches.postdata');
    Route::get('branches/fetchdata/', 'BranchController@fetchdata')->name('branches.fetchdata');
    Route::get('branches/removedata', 'BranchController@removedata')->name('branches.removedata');
    Route::get('branches/active', 'BranchController@active')->name('branches.active');

    // Category Routes
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('categories/getdata', 'CategoryController@getdata')->name('categories.getdata');
    Route::post('categories/postdata', 'CategoryController@postdata')->name('categories.postdata');
    Route::get('categories/fetchdata/', 'CategoryController@fetchdata')->name('categories.fetchdata');
    Route::get('categories/removedata', 'CategoryController@removedata')->name('categories.removedata');
    Route::get('categories/active', 'CategoryController@active')->name('categories.active');

    // Colors Route
    Route::get('colors', 'ColorController@index')->name('colors');
    Route::get('colors/getdata', 'ColorController@getdata')->name('colors.getdata');
    Route::post('colors/postdata', 'ColorController@postdata')->name('colors.postdata');
    Route::get('colors/fetchdata/', 'ColorController@fetchdata')->name('colors.fetchdata');
    Route::get('colors/removedata', 'ColorController@removedata')->name('colors.removedata');
    Route::get('colors/active', 'ColorController@active')->name('colors.active');

    // Units Route
    Route::get('units', 'UnitController@index')->name('units');
    Route::get('units/getdata', 'UnitController@getdata')->name('units.getdata');
    Route::post('units/postdata', 'UnitController@postdata')->name('units.postdata');
    Route::get('units/fetchdata/', 'UnitController@fetchdata')->name('units.fetchdata');
    Route::get('units/removedata', 'UnitController@removedata')->name('units.removedata');
    Route::get('units/active', 'UnitController@active')->name('units.active');

    // Cities Route
    Route::get('cities', 'CityController@index')->name('cities');
    Route::get('cities/getdata', 'CityController@getdata')->name('cities.getdata');
    Route::post('cities/postdata', 'CityController@postdata')->name('cities.postdata');
    Route::get('cities/fetchdata/', 'CityController@fetchdata')->name('cities.fetchdata');
    Route::get('cities/removedata', 'CityController@removedata')->name('cities.removedata');
    Route::get('cities/active', 'CityController@active')->name('cities.active');

    // Income Outcome Route
    Route::get('in_outs', 'In_outController@index')->name('in_outs');
    Route::get('in_outs/getdata', 'In_outController@getdata')->name('in_outs.getdata');
    Route::post('in_outs/postdata', 'In_outController@postdata')->name('in_outs.postdata');
    Route::get('in_outs/fetchdata/', 'In_outController@fetchdata')->name('in_outs.fetchdata');
    Route::get('in_outs/removedata', 'In_outController@removedata')->name('in_outs.removedata');
    Route::get('in_outs/active', 'In_outController@active')->name('in_outs.active');

    // Discounts Route
    Route::get('discounts', 'DiscountController@index')->name('discounts');
    Route::get('discounts/getdata', 'DiscountController@getdata')->name('discounts.getdata');
    Route::post('discounts/postdata', 'DiscountController@postdata')->name('discounts.postdata');
    Route::get('discounts/fetchdata/', 'DiscountController@fetchdata')->name('discounts.fetchdata');
    Route::get('discounts/removedata', 'DiscountController@removedata')->name('discounts.removedata');
    Route::get('discounts/active', 'DiscountController@active')->name('discounts.active');




//-------------------------------------- Administrator Routes -----------------------------------------------
    // Admin Routes
    Route::resource('admins','AdminController');

    //compnay info Routes
    Route::resource('company', 'CompanyController');





});
Route::post('logout','DashboardController@logout');
