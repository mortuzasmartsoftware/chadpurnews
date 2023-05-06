<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\{ArchiveController,CategoryNewsController,AllMediaShowController,SubSubMenuController,SliderController,PagePhotoController,PageController,PerformerScheduleController,AllMediaController,EventsController,SocialLinksController,NewsController,BlogCategoryController,MediaCategoryController,BlogController,SubMenuController,MenuController,SubCategoryController,CategoryController,AdsPositionController,AdsSerialController,FrontendController,AdsManagementController,AboutCompanyController, AdsPlacementController, HomeController};

Auth::routes();

//user
Route::get('/user',[UserController::class, "User"])->name("user");
Route::get('/createUserForm',[UserController::class, "CreateUserForm"])->name("createUserForm");
Route::post('/createUser',[UserController::class, "CreateUser"])->name("createUser");
Route::get('/editUserForm/{id}',[UserController::class, "EditUserForm"])->name("editUserFrom");
Route::post('/updateUser',[UserController::class, "UserUpdate"])->name("userUpdate");
Route::get('/userDelete/{id}',[UserController::class, "UserDelete"])->name("deleteUser");

/*
 |--------------------------------------------------------------------------
 | FrontendController Routes
 |--------------------------------------------------------------------------
*/
Route::get('/', [FrontendController::class, 'index'])->name('frontend');

/*
 |--------------------------------------------------------------------------
 | HomeController Routes
 |--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/admin/update', [HomeController::class, 'admin_update'])->name('admin_update');
Route::get('/home/admin/info', [HomeController::class, 'user_index'])->name('user_index');




/*
 |--------------------------------------------------------------------------
 | AboutCompanyController Routes
 |--------------------------------------------------------------------------
*/
Route::get('/company/info/index', [AboutCompanyController::class, 'index'])->name('company_index');
Route::post('/company/info/update', [AboutCompanyController::class, 'update'])->name('company_update');





/*
|--------------------------------------------------------------------------
| CategoryController Routes
|--------------------------------------------------------------------------
*/
Route::resource('category', CategoryController::class);
Route::get('/category/status/change/{id}', [CategoryController::class, 'change_status'])->name('cat_status');




/*
|--------------------------------------------------------------------------
| SubCategoryController Routes
|--------------------------------------------------------------------------
*/
Route::resource('class-sub-category', SubCategoryController::class);
Route::get('/sub/category/status/change/{id}', [SubCategoryController::class, 'change_status'])->name('subCat_status');




/*
|--------------------------------------------------------------------------
| BlogController Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-blog', BlogController::class);
Route::get('/blog/cat/status/change/{id}', [BlogController::class, 'change_status'])->name('blog_status');





/*
|--------------------------------------------------------------------------
| BlogCategoryController Routes
|--------------------------------------------------------------------------
*/
Route::resource('blog-category', BlogCategoryController::class);
Route::get('/blog/status/change/{id}', [BlogCategoryController::class, 'change_status'])->name('blogCat_status');



/*
|--------------------------------------------------------------------------
| AdsManagementController Routes
|--------------------------------------------------------------------------
*/
Route::resource('ads-management', AdsManagementController::class);
Route::get('/Ads/Management/status/change/{id}', [AdsManagementController::class, 'change_status'])->name('adsManagement_status');
Route::get('/script_image_status/{id}', [AdsManagementController::class, 'change_statusOfscriptORimage'])->name('scriptORimage_status');
Route::get('/get-serial-num', [AdsManagementController::class, 'get_Serial_num']);
Route::get('/get-serial-id', [AdsManagementController::class, 'get_SerialId']);




/*
|--------------------------------------------------------------------------
| AdsPlacementController Routes
|--------------------------------------------------------------------------
*/
Route::resource('ads-placement', AdsPlacementController::class);
Route::get('/Ads/Placement/status/change/{id}', [AdsPlacementController::class, 'change_status'])->name('adsPlacement_status');
// Route::get('/script_image_status/{id}', [AdsPlacementController::class, 'change_statusOfscriptORimage'])->name('scriptORimage_status');
// Route::get('/get-serial-num', [AdsPlacementController::class, 'get_Serial_num']);
/*
|--------------------------------------------------------------------------
| AdsPositionController Routes
|--------------------------------------------------------------------------
*/
Route::resource('ad-position', AdsPositionController::class);
Route::get('/Ads/Position/status/change/{id}', [AdsPositionController::class, 'change_status'])->name('adsPosition_status');

/*
|--------------------------------------------------------------------------
| AdsSerialController Routes
|--------------------------------------------------------------------------
*/
Route::resource('ad-serial', AdsSerialController::class);
Route::get('/Ads/Serial/status/change/{id}', [AdsSerialController::class, 'change_status'])->name('adsSerial_status');





/*
|--------------------------------------------------------------------------
| MenuController Routes
|--------------------------------------------------------------------------
*/
Route::resource('menu', MenuController::class);
Route::get('/menu/status/change/{id}', [MenuController::class, 'change_status'])->name('menu_status');






/*
|--------------------------------------------------------------------------
| PageController Routes
|--------------------------------------------------------------------------
*/
Route::resource('pages-problem', PageController::class);
Route::get('/page/status/change/{id}', [PageController::class, 'change_status'])->name('page_status');
Route::get('page/{link}', [PageController::class, 'page']);






/*
|--------------------------------------------------------------------------
| PagePhotoController Routes
|--------------------------------------------------------------------------
*/
Route::resource('pages-photo', PagePhotoController::class);
Route::get('/page/photo/status/change/{id}', [PagePhotoController::class, 'change_status'])->name('pagePhoto_status');








/*
|--------------------------------------------------------------------------
| PerformerScheduleController Routes
|--------------------------------------------------------------------------
*/
Route::resource('schedule', PerformerScheduleController::class);
Route::get('/schedule/status/change/{id}', [PerformerScheduleController::class, 'change_status'])->name('schedule_status');






/*
|--------------------------------------------------------------------------
| SliderController Routes
|--------------------------------------------------------------------------
*/
Route::resource('sliders', SliderController::class);
Route::get('/slider/status/change/{id}', [SliderController::class, 'change_status'])->name('slider_status');







/*
|--------------------------------------------------------------------------
| SubSubMenuController Routes
|--------------------------------------------------------------------------
*/
Route::resource('subsub-menu', SubSubMenuController::class);
Route::get('/subsubmenu/status/change/{id}', [SubSubMenuController::class, 'change_status'])->name('subSubMenu_status');





/*
|--------------------------------------------------------------------------
| SubMenuController Routes
|--------------------------------------------------------------------------
*/
Route::resource('sub-menu', SubMenuController::class);
Route::get('/submenu/status/change/{id}', [SubMenuController::class, 'change_status'])->name('subMenu_status');





/*
|--------------------------------------------------------------------------
| MediaCategoryController Routes
|--------------------------------------------------------------------------
*/
Route::resource('media-category', MediaCategoryController::class);
Route::get('/media/cat/status/change/{id}', [MediaCategoryController::class, 'change_status'])->name('mediaCat_status');






/*
|--------------------------------------------------------------------------
| NewsController Routes
|--------------------------------------------------------------------------
*/
Route::resource('manage-news', NewsController::class);
Route::get('/news/status/change/{id}', [NewsController::class, 'change_status'])->name('news_status');
Route::post('/get/subcat/data', [NewsController::class, 'getsubcat_method'])->name('getsubcat');
Route::get('article/{id}/{link}', [NewsController::class, 'news_details'])->name('newsDetails');
// Route::post('/get/sub/subcat/data/edit', [NewsController::class, 'getsubcatedit_method'])->name('getsubcatedit');





/*
|--------------------------------------------------------------------------
| SocialLinksController Routes
|--------------------------------------------------------------------------
*/
Route::resource('social-links', SocialLinksController::class);
Route::get('/social/status/change/{id}', [SocialLinksController::class, 'change_status'])->name('social_status');






/*
|--------------------------------------------------------------------------
| EventsController Routes
|--------------------------------------------------------------------------
*/
Route::resource('events', EventsController::class);
Route::get('/events/status/change/{id}', [EventsController::class, 'change_status'])->name('event_status');






/*
|--------------------------------------------------------------------------
| AllMediaController Routes
|--------------------------------------------------------------------------
*/
Route::resource('all-media', AllMediaController::class);
Route::get('/media/status/change/{id}', [AllMediaController::class, 'change_status'])->name('allMedia_status');
Route::get('/media-list', [AllMediaShowController::class, 'index']);
Route::get('/media-list/{id}', [AllMediaShowController::class, 'category']);
Route::get('/media', [AllMediaShowController::class, 'show']);


/*
|--------------------------------------------------------------------------
| CategoryNewsController Routes
|--------------------------------------------------------------------------
*/
Route::get('{link}', [CategoryNewsController::class, 'index']);
Route::get('/{cat_link}/{sub_link}', [CategoryNewsController::class, 'sub_category_news']);
Route::get('/search', [CategoryNewsController::class, 'search']);





/*
|--------------------------------------------------------------------------
| ArchiveController Routes
|--------------------------------------------------------------------------
*/
Route::get('archive/{date}', [ArchiveController::class, 'index']);







