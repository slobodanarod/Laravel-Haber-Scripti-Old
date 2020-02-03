<?php


Auth::routes();
Route::get('/facebook-redirect', 'SocialAuthController@facebookRedirect');
Route::get('/facebook-callback', 'SocialAuthController@facebookCallback');
Route::get('/logout', 'Auth\LoginController@logout');

//TAGS

// ************************* FRONT END  *************************** //

Route::namespace("Frontend")->group(function() {

    Route::resource('/tag', 'TagsController');
    Route::get("/", 'DefaultController@index')->name("default.index");
    Route::get("/login1", 'DefaultController@login')->name("default.login");
    Route::get("/contact", 'DefaultController@contact')->name("default.contact");
    Route::post("/contact", 'DefaultController@sendmail')->name("default.contact.post");
    Route::post("/search/", 'DefaultController@search')->name("default.search.post");
    Route::get("/search/", 'DefaultController@searchShow')->name("default.search.show");


    //WRITERS
    Route::get("/writer/{slug}", 'DefaultController@writerProfile')->name("default.writer");
    Route::get("/writers/", 'DefaultController@writers')->name("default.writers");

    //BLOG
    Route::get("/h/{slug}", 'BlogController@index')->name("frontend.blog.index");

    //CATEGORIES
    Route::get("/kategori/{slug}", 'CategoriesController@index')->name("frontend.category.index");

    //COMMENTS
    Route::post("/comment/send", 'CommentController@send')->name("frontend.comment.send");
    Route::get("/comment/delete/{id}", 'CommentController@delete')->name("frontend.comment.delete");

    //WRITERS
    Route::get("/news", 'UserController@news')->name("frontend.writer.news");
    Route::get("/news/create", 'UserController@newsCreate')->name("frontend.writer.news.create");
    Route::post("/news/create", 'UserController@newsStore')->name("frontend.writer.news.create.post");
    Route::get("/news/edit/{id}", 'UserController@newsEdit')->name("frontend.writer.news.edit");
    Route::post("/news/update/{id}", 'UserController@newsUpdate')->name("frontend.writer.news.update");

    //PROFILE
    Route::get("/profile/settings", 'UserController@settings')->name("frontend.profile.settings");
    Route::post("/profile/settings", 'UserController@settingsUpdate')->name("frontend.profile.settings.update");
    Route::get("/profile/restart", 'UserController@passwordRestart')->name("frontend.profile.password.restart");
    Route::post("/profile/restart", 'UserController@passwordRestartUpdate')->name("frontend.profile.password.restart.update");

    //PAGE
    Route::get("/page/{slug}", 'DefaultController@page')->name("frontend.page");

});


// ************************* BACK END  *************************** //


Route::namespace("Backend")->group(function() {
    Route::middleware(['Admin'])->group(function() {
        Route::prefix("nedmin/settings")->group(function() {


            Route::get("/", 'SettingsController@index')->name("settings.Index")->middleware('Admin');
            Route::post("/sortable", 'SettingsController@sortable')->name("settings.Sortable");
            Route::get("/delete/'{id}", 'SettingsController@destroy')->name("settings.Destroy");
            Route::get("/edit/{id}", 'SettingsController@edit')->name("settings.Edit");
            Route::post("/update/{id}", 'SettingsController@update')->name("settings.Update");


        });
    });
});


Route::namespace("Backend")->group(function() {

    Route::prefix("nedmin")->group(function() {
        Route::get("/dashboard", 'DefaultController@index')->name("nedmin.index")->middleware("Admin");
        Route::get("/", 'DefaultController@login')->name("nedmin.login")->middleware("CheckLogin");
        Route::post("/", 'DefaultController@authenticate')->name("nedmin.authenticate");
        Route::get("/logout", 'DefaultController@logout')->name("nedmin.logout");

    });


});


Route::namespace("Backend")->group(function() {
    Route::middleware(['Admin'])->group(function() {
        Route::prefix("nedmin")->group(function() {


            //BLOG
            Route::resource('blog', 'BlogController');
            Route::post("/blog/sortable", 'BlogController@sortable')->name("blogs.Sortable");
            Route::post("/blog/upload", 'BlogController@upload')->name("blogs.upload");


            //PAGES
            Route::resource('page', 'PageController');
            Route::post("/page/sortable", 'PageController@sortable')->name("pages.Sortable");

            //SLIDERS
            Route::resource('slider', 'SliderController');
            Route::post("/slider/sortable", 'SliderController@sortable')->name("sliders.Sortable");

            //SLIDERS
            Route::resource('user', 'UserController');
            Route::post("/user/sortable", 'UserController@sortable')->name("users.Sortable");

            //CATEGORIES
            Route::resource('category', 'CategoriesController');
            Route::post("/category/sortable", 'CategoriesController@sortable')->name("category.Sortable");

            //BANNERS
            Route::resource('banners', 'BannerController');
            Route::post("/banners/sortable", 'BannerController@sortable')->name("banners.Sortable");

            //ADS
            Route::resource('ads', 'AdsController');


        });
    });


});
