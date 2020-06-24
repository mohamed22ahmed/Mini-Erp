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
    Route::get('companies','CompanyController@index');
    Route::post('companies','CompanyController@update');


// --------------------------------------- Recharg Routes -----------------------------------------------------

    // Recharge Company Route
    Route::get('recharge_company','Recharge_companyController@index');
    Route::post("recharge_company/insert",'Recharge_companyController@insert')->name('recharge_company_insert');
    Route::get('recharge_company/edit/{id}','Recharge_companyController@edit');
    Route::post("recharge_company/edit/{id}",'Recharge_companyController@update');
    Route::get('recharge_company/delete/{id}','Recharge_companyController@del');
    Route::get('recharge_company/active/{id}','Recharge_companyController@active');

    // Recharge Company Route
    Route::get('recharge_value','Recharge_valueController@index');

// ---------------------------------------- Expenses and revenues -----------------------------------------------
    Route::get('exp_rev','Exp_revController@index');




// ------------------------------------------ Stores Routes ------------------------------------------------------
    // store Routes
    Route::get('store','StoreController@index');

    // store transfer Routes
    Route::get('store_transfer','Store_transferController@index');

    // store transfer products Routes
    Route::get('store_products','Store_productController@index');




// ------------------------------------------ Products Routes ------------------------------------------------------
    // product Routes
    Route::get('product','ProductController@index');

    //product colors routes
    Route::get('product_color','Product_colorController@index');

    //product discount routes
    Route::get('product_discount','Product_discountController@index');

    //product unit routes
    Route::get('product_unit','Product_unitController@index');

// -------------------------------------------------------- Client & Provider Routes-----------------------------------
    // client Routes
    Route::get('client','ClientController@index');


    // provider Routes
    Route::get('provider','ProviderController@index');



// ----------------------------------------------------------Mandoop and Delivery Routes -------------------------------
    // mandoop Routes
    Route::get('mandoop','MandoopController@index');


    // delivery Routes
    Route::get('delivery','DeliveryController@index');


});
Route::post('logout','DashboardController@logout');
