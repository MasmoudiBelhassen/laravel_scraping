<?php

use DiDom\Document;


Route::group(['middleware' => 'web'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('Adminusers', 'UserController');
    Route::resource('interests', 'InterestController');
    Route::delete('deleteInterest/{id}','InterestController@destroy');
    Route::post('store', 'InterestController@store');
    Route::resource('typeSource','typeSourceController');
    Route::get('selectTypeSource','typeSourceController@selectTypeSource')->name('selectTypeSource');
    Route::get('indexAddNewSource','SourceController@indexAddNewSource');
    Route::resource('articles','ArticlesController');

});
    Route::get('source','SourceController@index');

    Route::get('editScrapingInformation\{id}','SourceController@editScrapingInformation')->name('editScrapingInformation');
    Route::PATCH('updateScrapingInformation\{id}','SourceController@updateScrapingInformation')->name('updateScrapingInformation');
    Route::get('index2','SourceController@index2')->name('index2');
    Route::post('save','SourceController@save')->name('save');
    Route::post('addNewUrlToExistSource','SourceController@addNewUrlToExistSource')->name('addNewUrlToExistSource');
    Route::get('interestSource','SourceController@interestSource');
    Route::get('verif','SourceController@verif');
    Route::get('metaSolution','SourceController@metaSolution');







