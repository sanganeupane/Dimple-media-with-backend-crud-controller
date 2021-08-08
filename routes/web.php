<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'frontend'], function () {
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('/contact', 'ApplicationController@contact')->name('contact');
    Route::any('/about', 'ApplicationController@about')->name('about');
    Route::any('/news', 'ApplicationController@news')->name('news');
    Route::any('/confession', 'ApplicationController@confession')->name('confession');
    Route::any('/opinion', 'ApplicationController@opinion')->name('opinion');
    Route::any('/policypage', 'ApplicationController@policypage')->name('policypage');
    Route::any('/singleconfession/{id?}', 'ApplicationController@singleconfession')->name('singleconfession');
    Route::any('/singlenews/{id?}', 'ApplicationController@singlenews')->name('singlenews');
    Route::any('/singleopinion/{id?}', 'ApplicationController@singleopinion')->name('singleopinion');
    Route::any('/talks', 'ApplicationController@talks')->name('talks');
    Route::any('/termspage', 'ApplicationController@termspage')->name('termspage');


    Route::any('/login', 'ApplicationController@login')->name('login');


    Route::group(['prefix' => 'users', 'middleware' => 'auth:web'], function () {
        Route::any('/', 'ApplicationController@user')->name('users');

        Route::any('logout', 'ApplicationController@logout')->name('logout');

    });
});


Route::group(['namespace' => 'backend'], function () {
    Route::any('admin-login', 'AdminUserController@login')->name('admin-login');
});

Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::any('/', 'DashboardController@index')->name('admin');
    Route::group(['prefix' => 'admin-users'], function () {
        Route::any('/', 'AdminUserController@index')->name('show-admin-users');
        Route::any('/add-admin-user', 'AdminUserController@add')->name('add-admin-user');
        Route::any('update-user-status', 'AdminUserController@updateStatus')->name('update-user-status');
        Route::any('update-user-type', 'AdminUserController@updateType')->name('update-user-type');
        Route::any('delete-admin-user/{criteria?}', 'AdminUserController@delete')->name('delete-admin-user');
        Route::any('edit-admin-user/{id?}', 'AdminUserController@edit')->name('edit-admin-user');
        Route::any('edit-admin-user-action', 'AdminUserController@editAction')->name('edit-admin-user-action');
    });


//   confession

    Route::any('/admin-confession', 'confession@adminconfession')->name('admin-confession');
    Route::any('/addConfession', 'confession@addConfession')->name('addConfession');
    Route::any('/show-confession', 'confession@showConfession')->name('show-confession');
    Route::any('edit-admin-confession/{id?}', 'confession@editConfession')->name('edit-admin-confession');
    Route::any('edit-admin-confession-action', 'confession@editConfessionAction')->name('edit-admin-confession-action');
    Route::any('delete-admin-confession/{criteria?}', 'confession@deleteConfessionAction')->name('delete-admin-confession');


    //  contact
    Route::any('/admin-contact', 'contactController@adminContact')->name('admin-contact');
    Route::any('/add-contact', 'contactController@addContact')->name('add-contact');
    Route::any('/show-contact', 'contactController@showContact')->name('show-contact');
    Route::any('/edit-admin-contact/{id?}', 'contactController@editContact')->name('edit-admin-contact');
    Route::any('/edit-admin-contact-action', 'contactController@editContactAction')->name('edit-admin-contact-action');
    Route::any('/delete-admin-contact/{criteria?}', 'contactController@deleteContactAction')->name('delete-admin-contact');


//  opinion
    Route::any('/admin-opinion', 'opinion@adminOpinion')->name('admin-opinion');
    Route::any('/add-opinion', 'opinion@addOpinion')->name('add-opinion');
    Route::any('/show-opinion', 'opinion@showOpinion')->name('show-opinion');
    Route::any('/edit-admin-opinion/{id?}', 'opinion@editOpinion')->name('edit-admin-opinion');
    Route::any('/edit-admin-opinion-action/{id?}', 'opinion@editOpinionAction')->name('edit-admin-opinion-action');
    Route::any('/delete-admin-opinion-action/{criteria?}', 'opinion@deleteOpinionAction')->name('delete-admin-opinion-action');


//  news
    Route::any('/admin-news', 'newsController@adminNews')->name('admin-news');
    Route::any('/add-news', 'newsController@addNews')->name('add-news');
    Route::any('/show-news', 'newsController@showNews')->name('show-news');
    Route::any('/edit-admin-news/{id?}', 'newsController@editNews')->name('edit-admin-news');
    Route::any('/edit-admin-news-action', 'newsController@editNewsAction')->name('edit-admin-news-action');
    Route::any('/delete-admin-news/{criteria?}', 'newsController@deleteNewsAction')->name('delete-admin-news');


    //  about
    Route::any('/admin-about', 'aboutController@adminAbout')->name('admin-about');
    Route::any('/add-about', 'aboutController@addAbout')->name('add-about');
    Route::any('/show-about', 'aboutController@showAbout')->name('show-about');
    Route::any('/edit-admin-about/{id?}', 'aboutController@editAbout')->name('edit-admin-about');
    Route::any('/edit-admin-about-action', 'aboutController@editAboutAction')->name('edit-admin-about-action');
    Route::any('/delete-admin-about-action/{criteria?}', 'aboutController@deleteAboutAction')->name('delete-admin-about-action');


    //  ourteam
    Route::any('/admin-ourteam', 'ourteamController@adminOurteam')->name('admin-ourteam');
    Route::any('/add-ourteam', 'ourteamController@addOurteam')->name('add-ourteam');
    Route::any('/show-ourteam', 'ourteamController@showOurteam')->name('show-ourteam');
    Route::any('/edit-admin-ourteam/{id?}', 'ourteamController@editOurteam')->name('edit-admin-ourteam');
    Route::any('/edit-admin-ourteam-action', 'ourteamController@editOurteamAction')->name('edit-admin-ourteam-action');
    Route::any('/delete-admin-ourteam/{criteria?}', 'ourteamController@deleteOurteam')->name('delete-admin-ourteam');


    //  privacy
    Route::any('/admin-privacy', 'privacyController@adminPrivacy')->name('admin-privacy');
    Route::any('/add-privacy', 'privacyController@addPrivacy')->name('add-privacy');
    Route::any('/show-privacy', 'privacyController@showPrivacy')->name('show-privacy');
    Route::any('/edit-admin-privacy/{id?}', 'privacyController@editPrivacy')->name('edit-admin-privacy');
    Route::any('/edit-admin-privacy-action', 'privacyController@editPrivacyAction')->name('edit-admin-privacy-action');
    Route::any('/delete-admin-privacy-action/{criteria?}', 'privacyController@deletePrivacyAction')->name('delete-admin-privacy-action');

//  termspage
    Route::any('/admin-termspage', 'termspageController@adminTermspage')->name('admin-termspage');
    Route::any('/add-termspage', 'termspageController@addTermspage')->name('add-termspage');
    Route::any('/show-termspage', 'termspageController@showTermspage')->name('show-termspage');
    Route::any('/edit-admin-termspage/{id?}', 'termspageController@editTermspage')->name('edit-admin-termspage');
    Route::any('/edit-admin-termspage-action', 'termspageController@editTermspageAction')->name('edit-admin-termspage-action');
    Route::any('/delete-admin-termspage-action/{criteria?}', 'termspageController@deleteTermspageAction')->name('delete-admin-termspage-action');


//  talks
    Route::any('/admin-talks', 'talksController@adminTalks')->name('admin-talks');
    Route::any('/add-talks', 'talksController@addTalks')->name('add-talks');
    Route::any('/show-talks', 'talksController@showTalks')->name('show-talks');
    Route::any('/edit-admin-talks/{id?}', 'talksController@editTalks')->name('edit-admin-talks');
    Route::any('/edit-admin-talks-action', 'talksController@editTalksAction')->name('edit-admin-talks-action');
    Route::any('/delete-admin-talks/{criteria?}', 'talksController@deleteTalksAction')->name('delete-admin-talks');


//  logout
    Route::any('admin-logout', 'AdminUserController@logout')->name('admin-logout');

});
