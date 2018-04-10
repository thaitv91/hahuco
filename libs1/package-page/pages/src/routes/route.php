<?php

	// Route::get('timezones/{timezone}',  'Vietnt1995\Pages\Http\PagesController@index');
	// Route::get('demo',  'PackagePage\Pages\Http\PageCategoryController@index');

	Route::group(['prefix' => 'admin','middleware' => ['web'] ], function () {	
		Route::group(['prefix' => 'page-category'], function () {
	        Route::get('/', 'PackagePage\Pages\Http\PageCategoryController@index')->name('admin.pageCategory.index');
	        Route::get('create', 'PackagePage\Pages\Http\PageCategoryController@create')->name('admin.pageCategory.create');
	        Route::post('create', 'PackagePage\Pages\Http\PageCategoryController@store')->name('admin.pageCategory.store');
	        Route::get('edit/{id?}', 'PackagePage\Pages\Http\PageCategoryController@edit')->name('admin.pageCategory.edit');
	        Route::put('edit/{id}', 'PackagePage\Pages\Http\PageCategoryController@update')->name('admin.pageCategory.update');
	        Route::get('delete/{id}', 'PackagePage\Pages\Http\PageCategoryController@destroy')->name('admin.pageCategory.delete');
	        Route::get('get-url-delete', 'PackagePage\Pages\Http\PageCategoryController@getUrlDelete')->name('admin.pageCategory.getUrlDelete');
	        Route::get('list-page/{id?}', 'PackagePage\Pages\Http\PageCategoryController@listPage')->name('admin.pageCategory.listPage');
   		 });

		Route::group(['prefix' => 'pages'], function () {
	        Route::get('/', 'PackagePage\Pages\Http\PageController@index')->name('admin.pages.index');
	        Route::get('create', 'PackagePage\Pages\Http\PageController@create')->name('admin.pages.create');
	        Route::post('create', 'PackagePage\Pages\Http\PageController@store')->name('admin.pages.store');
	        Route::get('edit/{id?}', 'PackagePage\Pages\Http\PageController@edit')->name('admin.pages.edit');
	        Route::put('edit/{id}', 'PackagePage\Pages\Http\PageController@update')->name('admin.pages.update');
	        Route::get('edit-page/{id?}', 'PackagePage\Pages\Http\PageController@editPage')->name('admin.pages.editPage');
	        Route::put('edit-page/{id}', 'PackagePage\Pages\Http\PageController@updatePage')->name('admin.pages.updatePage');
	        Route::get('delete/{id}', 'PackagePage\Pages\Http\PageController@destroy')->name('admin.pages.delete');
	        Route::get('get-url-delete', 'PackagePage\Pages\Http\PageController@getUrlDelete')->name('admin.pages.getUrlDelete');
	        Route::get('/changeSelect/filter-filed', 'PackagePage\Pages\Http\PageController@changeTemplate')->name('admin.pages.changeTemplate');
    	});

    	Route::group(['prefix' => 'template-field'], function () {
	        Route::get('/', 'PackagePage\Pages\Http\TemplateFieldController@index')->name('admin.templateField.index');
	        Route::get('create', 'PackagePage\Pages\Http\TemplateFieldController@create')->name('admin.templateField.create');
	        Route::post('create', 'PackagePage\Pages\Http\TemplateFieldController@store')->name('admin.templateField.store');
	        Route::get('edit/{id?}', 'PackagePage\Pages\Http\TemplateFieldController@edit')->name('admin.templateField.edit');
	        Route::put('edit/{id}', 'PackagePage\Pages\Http\TemplateFieldController@update')->name('admin.templateField.update');
	        Route::get('delete/{id}', 'PackagePage\Pages\Http\TemplateFieldController@destroy')->name('admin.templateField.delete');
	        Route::get('get-url-delete', 'PackagePage\Pages\Http\TemplateFieldController@getUrlDelete')->name('admin.templateField.getUrlDelete');

	        //Ajax
	        Route::get('get-models', 'PackagePage\Pages\Http\TemplateFieldController@getModels')->name('admin.templateField.getModels');
	        Route::get('get-columns', 'PackagePage\Pages\Http\TemplateFieldController@getColumns')->name('admin.templateField.getColumns');
	        Route::get('get-widget', 'PackagePage\Pages\Http\TemplateFieldController@getWidgets')->name('admin.templateField.getWidgets');
	    });

	    Route::group(['prefix' => 'template'], function () {
	    	Route::get('/', 'PackagePage\Pages\Http\TemplateController@index')->name('admin.template.index');
			Route::get('edit/{template?}', 'PackagePage\Pages\Http\TemplateController@edit')->name('admin.template.edit');
	        Route::put('edit/{template}', 'PackagePage\Pages\Http\TemplateController@update')->name('admin.template.update');	
	        Route::get('list-page/{template}', 'PackagePage\Pages\Http\TemplateController@listPage')->name('admin.template.listPage');	
	        Route::get('list-field/{template}', 'PackagePage\Pages\Http\TemplateController@listField')->name('admin.template.listField');	
	        Route::post('update-order', 'PackagePage\Pages\Http\TemplateController@updateOrder')->name('admin.template.updateOrder');
    	});
	});
	Route::group(['middleware' => 'web'], function() {
		Route::get('{slug?}', 'PackagePage\Pages\Http\UserPageController@index')->name('user.pages.index');
	});
	Route::get('field/{slug}', 'PackagePage\Pages\Http\UserPageController@field');

	