<?php



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



header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE, PATCH');

header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');



Route::get('/', function () {
    return view('welcome');
});


Route::post('/check-user-exist', [App\Http\Controllers\UserController::class, 'checkUserExist'])->name('check-user-exist');
Route::post('/get-otp', [App\Http\Controllers\UserController::class, 'sendOtp'])->name('get-otp');
Route::post('/verify-otp', [App\Http\Controllers\UserController::class, 'verifyOtp'])->name('verify-otp');
Route::post('/get-user', [App\Http\Controllers\UserController::class, 'getUserByMobile'])->name('get-user');
Route::post('/register-user', [App\Http\Controllers\UserController::class, 'registerUserByMobile'])->name('register-user');
Route::get('/user', [App\Http\Controllers\AuthController::class, 'getAuthUser'])->name('getAuthUser');
Route::post('/signup', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::post('/save-profile', [App\Http\Controllers\UserController::class, 'saveProfile'])->name('save-profile');
Route::post('/save-bank-account', [App\Http\Controllers\UserController::class, 'saveBankAccount'])->name('save-bank-account');
Route::post('/save-upi', [App\Http\Controllers\UserController::class, 'saveUpi'])->name('save-upi');
Route::post('/save-mobile-transfar', [App\Http\Controllers\UserController::class, 'saveMobileTransfar'])->name('save-mobile-transfar');
Route::post('/addresses', [App\Http\Controllers\UserController::class, 'getAddresses'])->name('api-addresses');
Route::post('/payments', [App\Http\Controllers\UserController::class, 'getPayment'])->name('api-payments');
Route::get('/view-address/{id}', [App\Http\Controllers\UserController::class, 'viewAddress'])->name('api-view-address');
Route::post('/save-address', [App\Http\Controllers\UserController::class, 'saveAddress'])->name('api-save-address');
Route::post('/delete-address', [App\Http\Controllers\UserController::class, 'deleteAddress'])->name('api-delete-address');
//Route::post('/signup', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');


// Api Route
Route::get('/slug', [App\Http\Controllers\CommonController::class, 'updateSlug'])->name('update-slug');
Route::get('/version-update', [App\Http\Controllers\CommonController::class, 'versionUpdate'])->name('version-update');
Route::get('/top-brands', [App\Http\Controllers\CommonController::class, 'topBrands'])->name('top-brands');
Route::get('/categories', [App\Http\Controllers\CommonController::class, 'categories'])->name('api-categories-index');
Route::get('/brands/{id}', [App\Http\Controllers\CommonController::class, 'brands'])->name('api-brands-index');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'listProduct'])->name('api-products');
Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class, 'viewProduct'])->name('product-view');

// Search Module
Route::post('/search-product', [App\Http\Controllers\SearchController::class, 'searchProduct'])->name('get-search-result');
Route::post('/search-city', [App\Http\Controllers\SearchController::class, 'searchCity'])->name('api-search-city');



Route::get('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'index'])->name('api-questions');
Route::get('/accessories/{id}', [App\Http\Controllers\QuestionController::class, 'givenAccessories'])->name('api-accessories');
Route::get('/age/{id}', [App\Http\Controllers\QuestionController::class, 'deviceAge'])->name('api-age');
Route::get('/condition/{id}', [App\Http\Controllers\QuestionController::class, 'deviceCondition'])->name('api-condition');
Route::post('/calculate-price', [App\Http\Controllers\QuestionController::class, 'calculatePrice'])->name('api-calculate-price');

//Order

Route::post('/place-order', [App\Http\Controllers\ProductsController::class, 'placeOrder'])->name('api-place-order');
Route::post('/confirm-booking', [App\Http\Controllers\VehicleController::class, 'confirmBooking'])->name('api-confirm-booking');
Route::post('/pickups', [App\Http\Controllers\UserController::class, 'pickups'])->name('api-pickups');
Route::get('/view-order/{id}', [App\Http\Controllers\UserController::class, 'viewOrder'])->name('api-view-order');
Route::post('/cancel-order', [App\Http\Controllers\UserController::class, 'cancelOrder'])->name('api-cancel-order');
Route::post('/save-order', [App\Http\Controllers\UserController::class, 'saveOrder'])->name('api-save-order');

//Device Configuration
Route::get('/get-device-configuration/{brand_id}', [App\Http\Controllers\ProductsController::class, 'getDeviceConfiguration'])->name('api-get-device-configuration');
Route::post('/set-device-price', [App\Http\Controllers\ProductsController::class, 'setDevicePrice'])->name('api-set-device-price');
Route::get('/get-vehicle-configuration', [App\Http\Controllers\VehicleController::class, 'getVahicleVariation'])->name('api-get-vehicle-configuration');
Route::post('/save-contact', [App\Http\Controllers\ContactController::class, 'saveContact'])->name('save-contact');
Route::get('/get-blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('api-get-blogs');
