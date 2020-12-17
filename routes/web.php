<?php

Route::get('/admin', function () {
    $attributes = Attribute::first();
    $locale = app()->getLocale();
    return redirect('admin/en')->with($locale, $attributes);
});
Route::get('createTranslate', 'HomeController@createTranslate')->name('createTranslate');


Route::post('destroyAll', 'adminControllers\ContactController@destroyAll')->name('destroyAll');


Route::middleware('auth')->prefix('admin/{locale}')->group(function () {


    Route::get('/', 'adminControllers\AdminController@index')->name('dashboard');

    Route::resource('category', 'adminControllers\CategoryController');
    Route::resource('sub-category', 'adminControllers\SubCategoryController');
    Route::resource('product', 'adminControllers\ProductController');
    Route::resource('attribute', 'adminControllers\AttributeController');
    Route::resource('contact', 'adminControllers\ContactController');
    Route::resource('image', 'adminControllers\ImageController');
    Route::resource('about', 'adminControllers\AboutController');
    Route::resource('info', 'adminControllers\InfoController');
    Route::resource('slide', 'adminControllers\SlideController');
    Route::resource('partner', 'adminControllers\PartnerController');

});
