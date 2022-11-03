<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ThumbController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\User\AboutController as UserAboutController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ClearSessionController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\User\DropListController;
use App\Http\Controllers\User\FeedbackController as UserFeedbackController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\NavbarController;
use App\Http\Controllers\User\OrderAccountController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\RegisterController as UserRegisterController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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
#login pages

Route::controller(LoginController::class)->group(function () {
    Route::get('/admin', 'login')->name('login');
    Route::post('/auth/login', 'store');
    Route::get('/auth/logout', 'logout');
    Route::get('/auth/registration', 'registration')->name('registration');
});
# 1. Trang chủ
Route::controller(dashboardController::class)->group(function () {
    Route::get('/Admin/index', 'index')->name('index')->middleware('auth');
});
# 2. Trang Category
Route::controller(CategoryController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/Admin/pages/Category_list', 'CategoryList')->name('categorylist');
        Route::get('/Admin/pages/Category_create', 'CategoryCreate')->name('category');
        Route::post('/Admin/pages/Category_create', 'CategoryCreateProcess')->name('form.store');
        Route::get('/Admin/pages/Category_update/{menu}', 'CategoryUpdate');
        Route::post('/Admin/pages/Category_update/{menu}', 'CategoryUpdateProcess');
        Route::get('/Admin/pages/delete/{id}', 'CategoryDelete');
        // Route::post('Admin/pages/save','store')->name('form.store');
        // Route::get('category/view/{menu}', 'view')->name('view');
    });
});

# 3. Trang Product
Route::controller(ProductController::class)->group(function () {
    Route::middleware(['auth'])->group(function () {
        #1. Hiển thị danh sách tất cả sản phẩm
        Route::get('/product/list', 'list')->name('list');
        #2. Hiển thị form tạo sản phẩm
        Route::get('/product/create', 'create');
        #3. Thực hiện lữu dữ liệu
        Route::post('/product/create', 'store');
        #4. Hiển thị thông tin sản phẩm theo ID
        Route::get('/product/show/{data}', 'show')->name('show');
        #5. Thực hiện chỉnh sữa dữ liệu
        Route::post('/product/show/{data}', 'edit');
        #6. Thực hiện xóa dữ liệu
        Route::get('/product/destroy/{id}', 'destroy')->name('destroy');
        #7 Search
        Route::get('/search', 'search')->name('search');
        #8 view
        // Route::get('product/view/{data}', 'view');
    });
});

Route::post('upload-images', [UploadController::class, 'store'])->name('store-images');

#4. Product_image

Route::controller(ProductImageController::class)->group(function () {

    #1. Hiển thị danh sách tất cả sản phẩm
    Route::get('/image/list', 'list')->name('listimage');
    #2. Hiển thị form tạo sản phẩm
    Route::get('/image/create', 'create');
    #3. Thực hiện lữu dữ liệu
    Route::post('/image/create', 'store');
    #4. Hiển thị thông tin sản phẩm theo ID
    Route::get('/image/show/{data}', 'show')->name('show');
    #5. Thực hiện chỉnh sữa dữ liệu
    Route::post('/image/show/{data}', 'edit');
    #6. Thực hiện xóa dữ liệu
    Route::get('/image/destroy/{data}', 'destroy')->name('destroy');
    #7 Search
    Route::get('/search', 'search');
    #8 view
    // Route::get('image/view/{data}', 'view');
});


#5 customer (MR Minh)
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/list', 'list');
});

# 7. Trang Slider
Route::controller(SliderController::class)->group(function () {
    Route::get('Admin/pages/Slider_list', 'SliderList')->name('listslide');
    Route::get('Admin/pages/Slider_create', 'SliderCreate');
    Route::post('Admin/pages/Slider_create_process', 'SliderCreateProcess');
    Route::get('Admin/pages/Slider_delete/{id}', 'SliderDeleteProcess');
    Route::get('Admin/pages/Slider_update/{id}', 'SliderUpdate');
    Route::put('Admin/pages/Slider_update_process/{id}', 'SliderUpdateProcess');
});
# 8. Trang Order
Route::controller(OrderController::class)->group(function () {

    Route::get('Admin/pages/Order_list', 'OrderList');
});
# 9. Trang Feedback
Route::controller(FeedbackController::class)->group(function () {

    Route::get('Admin/pages/Feedback_list', 'FeedbackList');
});

# II User---------------------------------------
## Droplist

Route::controller(NavbarController::class)->group(function () {
    // Route::get('link/{data}', 'link');
    Route::get('LogoutUser','logout');
});
#1 Home
Route::controller(HomeController::class)->group(function () {

    route::get('/', 'index')->name('userIndex');
});

# 2 Feedback
Route::controller(UserFeedbackController::class)->group(function () {

    route::get('/feedback', 'feedback');
});

# 3 About us
Route::controller(UserAboutController::class)->group(function () {

    route::get('/about', 'about');
});

# 4 Contact us
Route::controller(UserContactController::class)->group(function () {

    route::get('/contact', 'contact');
});
# 5 Login
Route::controller(UserLoginController::class)->group(function () {
    route::get('/login', 'login');
    route::post('signin','signin')->name('signin');
});
# 6 Register
Route::controller(UserRegisterController::class)->group(function () {

    route::get('/register', 'register');
});
# 7 Cart
Route::controller(CartController::class)->group(function () {

    route::get('/cart', 'cart');
    // route::get('/order', 'order');
    route::get('/orderdetail/{data}', 'orderdetail');
});
# 8 Account
Route::controller(AccountController::class)->group(function () {

    // route::get('/account', 'account');
    route::get('/account/{data}','account');
    route::get('/getpassword/{data}','getpassword');
    route::post('/getpassword/{data}','changepassword')->name('account.changepassword');
   
});
# 9 Product
Route::controller(UserProductController::class)->group(function () {
    Route::get('/searchProduct/{data}', 'searchProduct');
    route::get('/product', 'product')->name('product');
    // route::get('/productRedirect', 'productRedirect');
});
#10 Order Guest Account

Route::controller(OrderAccountController::class)->group(function(){
   route::get('/order', 'order')->name('account.order');
});
