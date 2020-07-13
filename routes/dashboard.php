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
    Route::get('branches', 'BranchController@index')->name('branches.index');
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


// --------------------------------------- Recharg Routes -----------------------------------------------------

    // Recharge Company Route
    Route::get('recharge_company','Recharge_companyController@index');
    Route::post("recharge_company/insert",'Recharge_companyController@insert')->name('recharge_company_insert');
    Route::post("recharge_company/update",'Recharge_companyController@update')->name('recharge_company_update');
    Route::get('recharge_company/delete/{id}','Recharge_companyController@del');
    Route::get('recharge_company/active/{id}','Recharge_companyController@active');

    // Recharge value Route
    Route::get('recharge_value','Recharge_valueController@index');
    Route::post("recharge_value/insert",'Recharge_valueController@insert')->name('recharge_value_insert');
    Route::post("recharge_value/update",'Recharge_valueController@update')->name('recharge_value_update');
    Route::get('recharge_value/delete/{id}','Recharge_valueController@del');

// ---------------------------------------- Expenses and revenues -----------------------------------------------
    Route::get('exp_rev','Exp_revController@index');
    Route::post("exp_rev/insert",'Exp_revController@insert')->name('exp_rev_insert');
    Route::post("exp_rev/update",'Exp_revController@update')->name('exp_rev_update');
    Route::get('exp_rev/delete/{id}','Exp_revController@del');
    Route::get('exp_rev/active/{id}','Exp_revController@active');



// ------------------------------------------ Stores Routes ------------------------------------------------------
    // store Routes
    Route::get('store','StoreController@index');
    Route::post("store/insert",'StoreController@insert')->name('store_insert');
    Route::post("store/update",'StoreController@update')->name('store_update');
    Route::get('store/delete/{id}','StoreController@del');
    Route::get('store/active/{id}','StoreController@active');

    // store transfer Routes
    Route::get('store_transfer','Store_transferController@index');
    Route::post("store_transfer/insert",'Store_transferController@insert')->name('store_transfer_insert');
    Route::post("store_transfer/update",'Store_transferController@update')->name('store_transfer_update');
    Route::get('store_transfer/delete/{id}','Store_transferController@del');

    // store transfer products Routes
    Route::get('store_products','Store_productController@index');
    Route::post("store_products/insert",'Store_productController@insert')->name('store_products_insert');
    Route::post("store_products/update",'Store_productController@update')->name('store_products_update');
    Route::get('store_products/delete/{id}','Store_productController@del');



// ------------------------------------------ Products Routes ------------------------------------------------------
    // product Routes
    Route::get('product','ProductController@index')->name('products.index');
    Route::get('product/create','ProductController@create')->name('products.create');
    Route::get('product/edit/{id}','ProductController@edit')->name('products.edit');
    Route::post('product/store','ProductController@store')->name('products.store');
    Route::post('product/update/{id}','ProductController@update')->name('products.update');

    //product colors routes
    Route::get('product_color','Product_colorController@index');
    Route::post("product_color/insert",'Product_colorController@insert')->name('product_color_insert');
    Route::post("product_color/update",'Product_colorController@update')->name('product_color_update');
    Route::get('product_color/delete/{id}','Product_colorController@del');

    //product discount routes
    Route::get('product_discount','Product_discountController@index');
    Route::post("product_discount/insert",'Product_discountController@insert')->name('product_discount_insert');
    Route::post("product_discount/update",'Product_discountController@update')->name('product_discount_update');
    Route::get('product_discount/delete/{id}','Product_discountController@del');
    //product unit routes
    Route::get('product_unit','Product_unitController@index');
    Route::post("product_unit/insert",'Product_unitController@insert')->name('product_unit_insert');
    Route::post("product_unit/update",'Product_unitController@update')->name('product_unit_update');
    Route::get('product_unit/delete/{id}','Product_unitController@del');
// -------------------------------------------------------- Client & Provider Routes-----------------------------------
    // client Routes
    Route::get('client','ClientController@index');
    Route::post("client/insert",'ClientController@insert')->name('client_insert');
    Route::post("client/update",'ClientController@update')->name('client_update');
    Route::get('client/delete/{id}','ClientController@del');
    Route::get('client/active/{id}','ClientController@active');

    // provider Routes
    Route::get('provider','ProviderController@index');
    Route::post("provider/insert",'ProviderController@insert')->name('provider_insert');
    Route::post("provider/update",'ProviderController@update')->name('provider_update');
    Route::get('provider/delete/{id}','ProviderController@del');
    Route::get('provider/active/{id}','ProviderController@active');


// ----------------------------------------------------------Mandoop and Delivery Routes -------------------------------
    // mandoop Routes
    Route::get('mandoop','MandoopController@index');
    Route::post("mandoop/insert",'MandoopController@insert')->name('mandoop_insert');
    Route::post("mandoop/update",'MandoopController@update')->name('mandoop_update');
    Route::get('mandoop/delete/{id}','MandoopController@del');
    Route::get('mandoop/active/{id}','MandoopController@active');

    // delivery Routes
    Route::get('delivery','DeliveryController@index');
    Route::post("delivery/insert",'DeliveryController@insert')->name('delivery_insert');
    Route::post("delivery/update",'DeliveryController@update')->name('delivery_update');
    Route::get('delivery/delete/{id}','DeliveryController@del');
    Route::get('delivery/active/{id}','DeliveryController@active');

//-------------------------------------- Administrator Routes -----------------------------------------------
    // Admin Routes
    Route::get('admins','AdminController@index');
    Route::post("admins/insert",'AdminController@insert')->name('admin_insert');
    Route::post("admins/update",'AdminController@update')->name('admin_update');
    Route::get('admins/delete/{id}','AdminController@del');
    Route::get('admins/active/{id}','AdminController@active');

    //compnay info Routes
    Route::get('companies','CompanyController@index');
    Route::post('companies','CompanyController@update');

});

Route::post('logout','DashboardController@logout');
