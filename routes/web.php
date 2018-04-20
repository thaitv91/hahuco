<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('logout','HomeController@getLogout');
Route::group(['middleware' => 'admin'], function() {
    Route::get('test', 'HomeController@test');
});
Route::get('get-data', 'HomeController@getData');
Route::get('re-order', 'HomeController@reOrder');

Route::get('admin', 'Admin\DashboardController@index')->name('admin');
Route::get('load-data-dashboard', 'Admin\DashboardController@ajaxLoadData')->name('admin.dashboard.loadData');

Route::get('ajax-dashboard', 'Admin\DashboardController@ajaxLoadData')->name('admin.dashboard.loadData');

Route::group(['prefix' => 'admin'], function () {

	Route::group(['prefix' => 'menu'], function () {
		//Route::get('/', 'Admin\MenusController@index')->name('admin.menu.index');
		Route::get('{id}', 'Admin\MenusController@index')->name('admin.menu.index');
		Route::post('/create-item', 'Admin\MenusController@createMenuItem')->name('admin.menu.createItem');
	});

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'Admin\UserController@index')->name('admin.user');
        Route::get('edit/{id?}', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::post('edit/{id}', 'Admin\UserController@update');
        Route::get('delete/{id}', 'Admin\UserController@destroy')->name('admin.user.delete');
        Route::get('get-url-delete', 'Admin\UserController@getUrlDelete')->name('admin.user.getUrlDelete');
    });

    Route::group(['prefix'=>'product'], function() {
        Route::group(['prefix'=>''], function() {
            Route::get('', 'Admin\ProductController@index')->name('admin.product');
            Route::get('create', 'Admin\ProductController@create')->name('admin.product.create');
            Route::post('create', 'Admin\ProductController@store');
            Route::get('edit/{slug}', 'Admin\ProductController@edit')->name('admin.product.edit');
            Route::post('edit/{slug}', 'Admin\ProductController@update');
            Route::get('remove/{slug}', 'Admin\ProductController@destroy')->name('admin.product.remove');
        });

    	Route::group(['prefix'=>'category'], function() {
    		Route::get('', 'Admin\ProductCategoryController@index')->name('admin.product.category');
    		Route::get('create', 'Admin\ProductCategoryController@create')->name('admin.product.category.create');
    		Route::post('create', 'Admin\ProductCategoryController@store');
    		Route::get('edit/{slug}', 'Admin\ProductCategoryController@edit')->name('admin.product.category.edit');
    		Route::post('edit/{slug}', 'Admin\ProductCategoryController@update');
    		Route::get('remove/{slug}', 'Admin\ProductCategoryController@destroy')->name('admin.product.category.remove');
            Route::get('list-product/{category_slug}', 'Admin\ProductCategoryController@listProduct')->name('admin.product.category.listProduct');
    	});

    	Route::group(['prefix'=>'term'], function() {
    		Route::get('', 'Admin\ProductTermController@index')->name('admin.product.term');
    		Route::get('create', 'Admin\ProductTermController@create')->name('admin.product.term.create');
    		Route::post('create', 'Admin\ProductTermController@store');
    		Route::get('edit/{slug}', 'Admin\ProductTermController@edit')->name('admin.product.term.edit');
    		Route::post('edit/{slug}', 'Admin\ProductTermController@update');
    		Route::get('remove/{slug}', 'Admin\ProductTermController@destroy')->name('admin.product.term.remove');
             Route::get('list-product/{term_slug}', 'Admin\ProductTermController@listProduct')->name('admin.product.term.listProduct');
    	});

        //Contact
        Route::group(['prefix'=>'contact'], function() {
            Route::get('', 'Admin\ProductContactController@index')->name('admin.product.contact');
            Route::get('show/{id}', 'Admin\ProductContactController@show')->name('admin.product.contact.show');
            Route::post('remove/{id}', 'Admin\ProductContactController@destroy')->name('admin.product.contact.remove');
        });
    });

    Route::group(['prefix'=>'news'], function() {
        Route::group(['prefix'=>''], function() {
            Route::get('', 'Admin\NewsController@index')->name('admin.news');
            Route::get('create', 'Admin\NewsController@create')->name('admin.news.create');
            Route::post('create', 'Admin\NewsController@store');
            Route::get('edit/{slug}', 'Admin\NewsController@edit')->name('admin.news.edit');
            Route::post('edit/{slug}', 'Admin\NewsController@update');
            Route::get('remove/{slug}', 'Admin\NewsController@destroy')->name('admin.news.remove');
        });

        Route::group(['prefix'=>'category'], function() {
            Route::get('', 'Admin\NewsCategoryController@index')->name('admin.news.category');
            Route::get('create', 'Admin\NewsCategoryController@create')->name('admin.news.category.create');
            Route::post('create', 'Admin\NewsCategoryController@store');
            Route::get('edit/{slug}', 'Admin\NewsCategoryController@edit')->name('admin.news.category.edit');
            Route::post('edit/{slug}', 'Admin\NewsCategoryController@update');
            Route::get('remove/{slug}', 'Admin\NewsCategoryController@destroy')->name('admin.news.category.remove');
        });
    });

    //Partner
    Route::group(['prefix'=>'partner'], function() {
        Route::get('', 'Admin\PartnerController@index')->name('admin.partner');
        Route::get('create', 'Admin\PartnerController@create')->name('admin.partner.create');
        Route::post('create', 'Admin\PartnerController@store');
        Route::get('edit/{id}', 'Admin\PartnerController@edit')->name('admin.partner.edit');
        Route::post('edit/{id}', 'Admin\PartnerController@update');
        Route::get('remove/{id}', 'Admin\PartnerController@destroy')->name('admin.partner.remove');
        Route::get('re-order', 'Admin\PartnerController@reorder')->name('admin.partner.reorder');
        Route::post('update-order', 'Admin\PartnerController@updateOrder')->name('admin.partner.updateOrder');
    });

	//Dich vu
	Route::group(['prefix'=>'dich-vu'], function() {
		Route::get('', 'Admin\DichvuController@index')->name('admin.dichvu');
		Route::get('create', 'Admin\DichvuController@create')->name('admin.dichvu.create');
		Route::post('create', 'Admin\DichvuController@store');
		Route::get('edit/{id}', 'Admin\DichvuController@edit')->name('admin.dichvu.edit');
		Route::post('edit/{id}', 'Admin\DichvuController@update');
		Route::get('remove/{id}', 'Admin\DichvuController@destroy')->name('admin.dichvu.remove');
		Route::get('re-order', 'Admin\DichvuController@reorder')->name('admin.dichvu.reorder');
		Route::post('update-order', 'Admin\DichvuController@updateOrder')->name('admin.dichvu.updateOrder');
	});

    //Testimonial
    Route::group(['prefix'=>'testimonial'], function() {
        Route::get('', 'Admin\TestimonialController@index')->name('admin.testimonial');
        Route::get('create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
        Route::post('create', 'Admin\TestimonialController@store');
        Route::get('edit/{id}', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
        Route::post('edit/{id}', 'Admin\TestimonialController@update');
        Route::get('remove/{id}', 'Admin\TestimonialController@destroy')->name('admin.testimonial.remove');
    });

    Route::group(['prefix' => 'configure'], function () {
        Route::get('/', 'Admin\ConfigureController@index')->name('admin.configure.index');
        Route::get('create', 'Admin\ConfigureController@create')->name('admin.configure.create');
        Route::post('create', 'Admin\ConfigureController@store')->name('admin.configure.store');
        Route::get('edit/{id?}', 'Admin\ConfigureController@edit')->name('admin.configure.edit');
        Route::put('edit/{id}', 'Admin\ConfigureController@update')->name('admin.configure.update');
        Route::get('delete/{id}', 'Admin\ConfigureController@destroy')->name('admin.configure.delete');
        Route::get('get-url-delete', 'Admin\ConfigureController@getUrlDelete')->name('admin.configure.getUrlDelete');
    });

    Route::group(['prefix' => 'region'], function () {
        Route::get('/', 'Admin\RegionController@index')->name('admin.region.index');
        Route::get('create', 'Admin\RegionController@create')->name('admin.region.create');
        Route::post('create', 'Admin\RegionController@store')->name('admin.region.store');
        Route::get('edit/{id?}', 'Admin\RegionController@edit')->name('admin.region.edit');
        Route::put('edit/{id}', 'Admin\RegionController@update')->name('admin.region.update');
        Route::get('delete/{id}', 'Admin\RegionController@destroy')->name('admin.region.delete');
        Route::get('get-url-delete', 'Admin\RegionController@getUrlDelete')->name('admin.region.getUrlDelete');
        Route::get('list-city/{id?}', 'Admin\RegionController@listCity')->name('admin.region.listCity');
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('/', 'Admin\CityController@index')->name('admin.city.index');
        Route::get('create', 'Admin\CityController@create')->name('admin.city.create');
        Route::post('create', 'Admin\CityController@store')->name('admin.city.store');
        Route::get('edit/{id?}', 'Admin\CityController@edit')->name('admin.city.edit');
        Route::put('edit/{id}', 'Admin\CityController@update')->name('admin.city.update');
        Route::get('delete/{id}', 'Admin\CityController@destroy')->name('admin.city.delete');
        Route::get('get-url-delete', 'Admin\CityController@getUrlDelete')->name('admin.city.getUrlDelete');
        Route::get('list-district/{id?}', 'Admin\CityController@listDistrict')->name('admin.city.listDistrict');
    });

    Route::group(['prefix' => 'district'], function () {
        Route::get('/', 'Admin\DistrictController@index')->name('admin.district.index');
        Route::get('create', 'Admin\DistrictController@create')->name('admin.district.create');
        Route::post('create', 'Admin\DistrictController@store')->name('admin.district.store');
        Route::get('edit/{id?}', 'Admin\DistrictController@edit')->name('admin.district.edit');
        Route::put('edit/{id}', 'Admin\DistrictController@update')->name('admin.district.update');
        Route::get('delete/{id}', 'Admin\DistrictController@destroy')->name('admin.district.delete');
        Route::get('get-url-delete', 'Admin\DistrictController@getUrlDelete')->name('admin.district.getUrlDelete');
        Route::get('list-network/{id?}', 'Admin\DistrictController@listNetwork')->name('admin.district.listNetwork');
    });

    Route::group(['prefix' => 'network'], function () {
        Route::get('/', 'Admin\NetworkController@index')->name('admin.network.index');
        Route::get('create', 'Admin\NetworkController@create')->name('admin.network.create');
        Route::post('create', 'Admin\NetworkController@store')->name('admin.network.store');
        Route::get('edit/{id?}', 'Admin\NetworkController@edit')->name('admin.network.edit');
        Route::put('edit/{id}', 'Admin\NetworkController@update')->name('admin.network.update');
        Route::get('delete/{id}', 'Admin\NetworkController@destroy')->name('admin.network.delete');
        Route::get('get-url-delete', 'Admin\NetworkController@getUrlDelete')->name('admin.network.getUrlDelete');
        Route::get('/changeSelect/filter-filed', 'Admin\NetworkController@changeRegion')->name('admin.network.changeRegion');
        Route::get('/changeSelectCity/filter-filed-city', 'Admin\NetworkController@changeCity')->name('admin.network.changeCity');
    });

    Route::group(['prefix' => 'award'], function () {
        Route::get('/', 'Admin\AwardController@index')->name('admin.award');
        Route::get('create', 'Admin\AwardController@create')->name('admin.award.create');
        Route::post('create', 'Admin\AwardController@store')->name('admin.award.store');
        Route::get('edit/{slug?}', 'Admin\AwardController@edit')->name('admin.award.edit');
        Route::post('edit/{slug}', 'Admin\AwardController@update')->name('admin.award.update');
        Route::get('delete/{slug}', 'Admin\AwardController@destroy')->name('admin.award.remove');

        //Ajax
        Route::post('update-order', 'Admin\AwardController@updateOrder')->name('admin.award.updateOrder');
    });

    Route::group(['prefix' => 'slider'], function() {
        Route::get('', 'Admin\SliderController@index')->name('admin.slider');
        Route::get('create', 'Admin\SliderController@create')->name('admin.slider.create');
        Route::post('create', 'Admin\SliderController@store');
        Route::get('edit/{slug}', 'Admin\SliderController@edit')->name('admin.slider.edit');
        Route::post('edit/{slug}', 'Admin\SliderController@update');
        Route::get('delete/{slug}', 'Admin\SliderController@destroy')->name('admin.slider.delete');
        //Dropzone
        Route::get('get-image', 'Admin\SliderController@getImage')->name('admin.slider.getImage');
        Route::post('image-upload', 'Admin\SliderController@uploadImage')->name('admin.slider.uploadImage');
        Route::post('image-remove', 'Admin\SliderController@removeImage')->name('admin.slider.removeImage');
        //Ajax
        Route::get('get-slider', 'Admin\SliderController@getSliders')->name('ajax.getSliders');
    });

    //Contact
    Route::group(['prefix'=>'contact'], function() {
        Route::get('', 'Admin\ContactController@index')->name('admin.contact');
        Route::get('show/{id}', 'Admin\ContactController@show')->name('admin.contact.show');
        Route::post('remove/{id}', 'Admin\ContactController@destroy')->name('admin.contact.remove');
    });

    //Email registration
    Route::group(['prefix'=>'email-registration'], function() {
        Route::get('', 'Admin\EmailRegistrationController@index')->name('admin.email_registration');
        Route::post('remove/{id}', 'Admin\EmailRegistrationController@destroy')->name('admin.email_registration.remove');
    });

    Route::group(['prefix' => 'recruitment', 'as' => 'admin.recruitment.', 'namespace' => 'Admin'], function() {
        Route::get('', 'RecruitmentController@index')->name('index');
        Route::get('create', 'RecruitmentController@createRecruitment')->name('create');
        Route::post('create', 'RecruitmentController@storeRecruitment');
        Route::get('edit/{id}', 'RecruitmentController@editRecruitment')->name('edit');
        Route::post('edit/{id}', 'RecruitmentController@updateRecruitment');
        Route::get('remove/{id}', 'RecruitmentController@removeRecruitment')->name('remove');

        Route::group(['prefix' => 'job', 'as' => 'job.'], function () {
            Route::get('', 'RecruitmentController@indexJob')->name('index');
            Route::get('create', 'RecruitmentController@createJob')->name('create');
            Route::post('create', 'RecruitmentController@storeJob');
            Route::get('edit/{id}', 'RecruitmentController@editJob')->name('edit');
            Route::post('edit/{id}', 'RecruitmentController@updateJob');
            Route::get('remove/{id}', 'RecruitmentController@removeJob')->name('remove');
        });

        Route::group(['prefix' => 'place', 'as' => 'place.'], function () {
            Route::get('', 'RecruitmentController@indexPlace')->name('index');
            Route::get('create', 'RecruitmentController@createPlace')->name('create');
            Route::post('create', 'RecruitmentController@storePlace');
            Route::get('edit/{id}', 'RecruitmentController@editPlace')->name('edit');
            Route::post('edit/{id}', 'RecruitmentController@updatePlace');
            Route::get('remove/{id}', 'RecruitmentController@removePlace')->name('remove');
        });

        Route::group(['prefix' => 'resume', 'as' => 'resume.'], function () {
            Route::get('', 'RecruitmentController@indexResume')->name('index');
            Route::get('create', 'RecruitmentController@createResume')->name('create');
            Route::post('create', 'RecruitmentController@storeResume');
            Route::get('edit/{id}', 'RecruitmentController@editResume')->name('edit');
            Route::post('edit/{id}', 'RecruitmentController@updateResume');
            Route::get('remove/{id}', 'RecruitmentController@removeResume')->name('remove');
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('', 'RecruitmentController@indexProfile')->name('index');
            Route::get('show/{id}', 'RecruitmentController@showProfile')->name('show');
            Route::get('remove/{id}', 'RecruitmentController@removeProfile')->name('remove');
        });
    });
});
//=========================================HOMEPAGE===============================================
Route::group(['prefix'=>'san-pham'], function() {
//    Route::get('', 'Frontend\ProductController@index')->name('homepage.product');
	Route::get('tag/{slug}', 'Frontend\ProductController@tags')->name('homepage.product.tags');
    Route::get('xem-them/{term_id}', 'Frontend\ProductController@showMoreProducts')->name('homepage.product.showMore');
	Route::get('{product_slug}', 'Frontend\ProductController@show')->name('homepage.product.show');
	Route::get('/danh-muc/{term_slug}', 'Frontend\ProductController@term')->name('homepage.product.term');
    Route::post('{term_slug}/{product_slug}', 'Frontend\ProductController@storeContact')->name('homepage.product.storeContact');
});

Route::group(['prefix'=>'tin-tuc'], function() {
	//Route::get( '/cate/{category_slug}', 'Frontend\NewsController@listNewsOfCategory' )->name( 'homepage.news.category' );
	Route::get( '{id}', 'Frontend\NewsController@show' )->name( 'homepage.news.show' );
	Route::get(' tag/{slug}', 'Frontend\NewsController@tags' )->name( 'homepage.news.tags' );
});

Route::group(['prefix'=>'partner'], function() {
	Route::get( '{id}', 'Frontend\PartnerController@show' )->name( 'homepage.partner.show' );
});

Route::group(['prefix'=>'dich-vu'], function() {
	Route::get( '{id}', 'Frontend\DichvuController@show' )->name( 'homepage.dichvu.show' );
	Route::get( 'tag/{slug}', 'Frontend\DichvuController@tags' )->name( 'homepage.dichvu.tags' );
});

Route::group(['prefix'=>'testimonial'], function() {
    Route::get('{id}', 'Frontend\TestimonialController@show')->name('homepage.testimonial.show');
});

Route::post( 'lien-he', 'Frontend\ContactController@storeContact')->name('contact.store');
Route::group(['prefix'=>'email-registration'], function() {
    // Route::post('register', 'Frontend\EmailRegistrationController@storeEmail')->name('email.store');
    Route::post('register', 'Frontend\EmailRegistrationController@storeEmailAjax')->name('email_registration.store');
});
Route::get('/changeSelect/filter-filed', 'User\NetWorkController@changeRegion')->name('user.network.changeRegion');
Route::get('/changeSelectCity/filter-filed-city', 'User\NetWorkController@changeCity')->name('user.network.changeCity');
Route::get('/changeSelectDistrict/filter-filed-district', 'User\NetWorkController@changeDistrict')->name('user.network.changeDistrict');
Route::get('/changeButton/filter-button', 'User\NetWorkController@filterData')->name('user.network.changeButton');

Route::get('/changeButton/detail-local', 'User\NetWorkController@detailLocal')->name('user.network.detailLocal');

//Tim kiem
Route::get('search', 'Frontend\HomeController@search')->name('search');
Route::get('search-news/{keyword}', 'Frontend\HomeController@searchNews')->name('searchNews');
Route::get('search-products/{keyword}', 'Frontend\HomeController@searchProducts')->name('searchProducts');
Route::get('location', function () {
	return view('example');
});

Route::group(['prefix' => 'tuyen-dung', 'as' => 'recruitment.', 'namespace' => 'Frontend'], function() {
    Route::get('search', 'RecruitmentController@search')->name('search');
    Route::post('store-profile', 'RecruitmentController@storeProfile')->name('storeProfile');
    Route::get('{id}', 'RecruitmentController@show')->name('show');
    Route::get('list', 'RecruitmentController@index')->name('index');
});
Route::get('refresh_captcha', 'Frontend\RecruitmentController@refreshCaptcha')->name('refresh_captcha');
Route::post('upload', 'Admin\ImageFileController@store');

Route::group(['prefix' => 'tra-cuu', 'namespace' => 'Frontend'], function() {
    Route::get('boi-thuong', 'TraCuuController@getTraCuuBoiThuong');
});
Route::get('get-quan-huyen', 'Frontend\CompensationController@getQuanHuyen');

Route::post('editor-uploads', 'Admin\ImageFileController@UploadEditor');

