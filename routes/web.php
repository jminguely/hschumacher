<?php

/**
 * Application routes.
 */

Route::any('tax', ['type', 'uses' => 'ReferenceController@archive']);
Route::any('postTypeArchive', ['reference', 'uses' => 'ReferenceController@archive']);
Route::any('singular', ['reference', 'uses' => 'ReferenceController@single']);
Route::get('/references/{id}.pdf', 'ReferenceController@pdf');

Route::any('home', 'PostController@archive');
Route::any('category', 'PostController@archive');
Route::any('single', 'PostController@single');

Route::any('template', ['homepage', 'uses' => 'PageController@front']);
Route::any('template', ['contact', 'uses' => 'PageController@contact']);
Route::any('template', ['notre-objectif', 'uses' => 'PageController@notreObjectif']);
Route::any('page', 'PageController@single');
