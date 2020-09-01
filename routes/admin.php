<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Admin','middleware'=>'guest'],function(){

    Route::match(['get','post'],'login','AdminController@login');

});

    Route::group(['namespace'=>'Admin','middleware'=>'admin'],function() {
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/logout', 'AdminController@logout');

        //////////////// Add Sections /////////
    Route::get('sections','SectionController@sections');
    Route::post('update-section-status','SectionController@updateSectionStatus');
    Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');
    Route::get('delete-section/{id}','SectionController@deleteSection');



    //////////////// Add Categories ////////////
    Route::get('categories','CategoryController@categories');
    Route::post('update-category-status','CategoryController@updateCategoryStatus');
    Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
    Route::post('append-categories-level','CategoryController@appendCategoriesLevel');
    Route::get('delete-category/{id}','CategoryController@deleteCategory');



});





