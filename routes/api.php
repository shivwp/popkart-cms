<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\Listcontroller;
use App\Http\Controllers\Api\CommonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//login api
Route::post('login', [App\Http\Controllers\Api\UserApiController::class, 'login']);
Route::get('data', [ApiController::class, 'gtdata']);

//User registeration - User Api registraion otp send
Route::post('signup_otp', [App\Http\Controllers\Api\UserApiController::class, 'signup_otp_send']);
Route::post('signup', [App\Http\Controllers\Api\UserApiController::class, 'signup']);
// Route::post('createUserProfile', [App\Http\Controllers\Api\Listcontroller::class, 'createUserProfile']);

//  forget password
Route::post('forget_password_otp', [App\Http\Controllers\Api\UserApiController::class, 'forget_password_otp']);
Route::post('reset_password', [App\Http\Controllers\Api\UserApiController::class, 'reset_password']);
Route::post('edit_item', [App\Http\Controllers\Api\Listcontroller::class, 'edit_item']);

// privacy_policy & terms_conditions
Route::get('privacy_policy', [App\Http\Controllers\Api\CommonController::class, 'privacy_policy']);
Route::get('terms_conditions', [App\Http\Controllers\Api\CommonController::class, 'terms_conditions']);

Route::post('send', [App\Http\Controllers\Api\UserApiController::class, 'sendNotification']);

Route::post('products', [App\Http\Controllers\Api\ProductApiController::class, 'index']);
Route::post('product',  [App\Http\Controllers\Api\ProductApiController::class, 'singleproduct']);
Route::post('new-product',  [App\Http\Controllers\Api\ProductApiController::class, 'newproduct']);
Route::post('best-seller-product',  [App\Http\Controllers\Api\ProductApiController::class, 'bestseller']);

Route::post('filters', [App\Http\Controllers\Api\ProductApiController::class, 'allFilters']);
Route::post('home', [App\Http\Controllers\Api\HomepageApiController::class, 'index']);
Route::post('testimonials', [App\Http\Controllers\Api\TestimonialsApiController::class, 'index']);
Route::post('product-attributes', [App\Http\Controllers\Api\ProductApiController::class, 'productAttributes'])->name('product-attributes');

Route::middleware('auth:api')->group(function () {
    Route::get('notificationstatus', [App\Http\Controllers\Api\Listcontroller::class, 'notificationstatus']);
    Route::post('notificationOnoff', [App\Http\Controllers\Api\Listcontroller::class, 'notificationOnoff']);

    Route::post('get_search_product', [App\Http\Controllers\Api\Listcontroller::class, 'get_search_product']);
    Route::post('get_singlelist_meta', [App\Http\Controllers\Api\Listcontroller::class, 'get_singlelist_meta']);
    Route::post('my_lists', [App\Http\Controllers\Api\Listcontroller::class, 'my_lists']);

    Route::post('create_list', [App\Http\Controllers\Api\Listcontroller::class, 'create_list']);
    Route::post('add_favourite_Product', [App\Http\Controllers\Api\Listcontroller::class, 'add_favourite_Product']);
    Route::get('get_favourite_Productlist', [App\Http\Controllers\Api\Listcontroller::class, 'get_favourite_Productlist']);

    // Create List + Add Items 
    Route::post('create-list-add-item', [App\Http\Controllers\Api\Listcontroller::class, 'createListAddItem']);

    // Edit List
    Route::post('edit-list', [App\Http\Controllers\Api\Listcontroller::class, 'editList']);

    // Edit List Count 
    Route::post('edit-list-count', [App\Http\Controllers\Api\Listcontroller::class, 'editListCount']);

    // Delete List API
    Route::post('delete-list', [App\Http\Controllers\Api\Listcontroller::class, 'deleteList']);


    Route::get('get_coupon_list', [App\Http\Controllers\Api\CommonController::class, 'get_coupon_list']);
    Route::get('get_reward_list', [App\Http\Controllers\Api\CommonController::class, 'get_reward_list']);
    Route::get('get_shared_userlist', [App\Http\Controllers\Api\Listcontroller::class, 'shareduserlist']);
    Route::get('editUserProfile', [App\Http\Controllers\Api\Listcontroller::class, 'editUserProfile']);
    Route::post('updateUserProfile', [App\Http\Controllers\Api\Listcontroller::class, 'updateUserProfile']);
    Route::get('get_shared_member', [App\Http\Controllers\Api\Listcontroller::class, 'sharedmember']);
    Route::post('get_category_list', [App\Http\Controllers\Api\Listcontroller::class, 'get_category_list']);
    Route::get('get_favorite_category_list', [App\Http\Controllers\Api\Listcontroller::class, 'get_favorite_category_list']);
    Route::post('get_favorite_category_list_meta', [App\Http\Controllers\Api\Listcontroller::class, 'get_favorite_category_list_meta']);

    Route::post('product_comment', [App\Http\Controllers\Api\Listcontroller::class, 'productComment']);
    Route::post('product_delete', [App\Http\Controllers\Api\Listcontroller::class, 'product_delete']);
    Route::post('like_product', [App\Http\Controllers\Api\Listcontroller::class, 'like_product']);
    Route::get('single_product', [App\Http\Controllers\Api\Listcontroller::class, 'single_product']);
    Route::post('invite_user', [App\Http\Controllers\Api\Listcontroller::class, 'inviteuser']);
    // Add Friend
    Route::post('add-user-in-list', [App\Http\Controllers\Api\Listcontroller::class, 'addUserInList']);
    Route::post('remove-user-from-list', [App\Http\Controllers\Api\Listcontroller::class, 'removeUserFromList']);
    

    Route::post('comment_delete', [App\Http\Controllers\Api\Listcontroller::class, 'commentDelete']);
    Route::post('favrouite_product_delete', [App\Http\Controllers\Api\Listcontroller::class, 'favrouriteProductdelete']);
    Route::post('change_password', [App\Http\Controllers\Api\Listcontroller::class, 'changepassword']);
    Route::get('get_subscription_list', [App\Http\Controllers\Api\Listcontroller::class, 'subscriptionList']);

    Route::post('createlist', [App\Http\Controllers\Api\UserApiController::class, 'createlist']);
    Route::post('addfavouriteProduct', [App\Http\Controllers\Api\UserApiController::class, 'addfavouriteProduct']);
    Route::get('favouriteProductlist', [App\Http\Controllers\Api\UserApiController::class, 'favouriteProductlist']);
    Route::post('additem', [App\Http\Controllers\Api\Listcontroller::class, 'additem']);

    Route::post('my_requested_list', [App\Http\Controllers\Api\Listcontroller::class, 'my_requested_list']);
    Route::post('accept_list', [App\Http\Controllers\Api\Listcontroller::class, 'accept_list']);
    Route::post('reject_list', [App\Http\Controllers\Api\Listcontroller::class, 'reject_list']);
    Route::post('search_user', [App\Http\Controllers\Api\Listcontroller::class, 'searchuser']);
    Route::post('add_friend', [App\Http\Controllers\Api\Listcontroller::class, 'addfriend']);
    Route::get('my_friend_request', [App\Http\Controllers\Api\Listcontroller::class, 'myfriendrequest']);
    Route::post('accept_Friend_Request', [App\Http\Controllers\Api\Listcontroller::class, 'acceptFriendRequest']);
    Route::post('reject_Friend_Request', [App\Http\Controllers\Api\Listcontroller::class, 'rejectFriendRequest']);
    Route::get('get_my_Friend', [App\Http\Controllers\Api\Listcontroller::class, 'get_my_Friend']);
    Route::get('get_other_sharedlist', [App\Http\Controllers\Api\Listcontroller::class, 'otherSharedlist']);

    //my
    Route::post('save-permission', [App\Http\Controllers\Api\Listcontroller::class, 'savepermission']);

    Route::post('update_list_item_permission_request', [App\Http\Controllers\Api\Listcontroller::class, 'update_list_item_permission_request']);
    Route::get('show_reject_item_request', [App\Http\Controllers\Api\Listcontroller::class, 'show_reject_item_request']);
    Route::post('accept_update_list_request', [App\Http\Controllers\Api\Listcontroller::class, 'accept_update_list_request']);
    Route::post('reject_update_list_request', [App\Http\Controllers\Api\Listcontroller::class, 'reject_update_list_request']);
    Route::get('get_notifications', [App\Http\Controllers\Api\Listcontroller::class, 'get_notifications']);
    Route::post('delete_notifications', [App\Http\Controllers\Api\Listcontroller::class, 'delete_notifications']);
    Route::post('purchase_subscription', [App\Http\Controllers\Api\Listcontroller::class, 'purchase_subscription']);
    Route::get('show_pending_item_request', [App\Http\Controllers\Api\Listcontroller::class, 'show_pending_item_request']);

    // 24-03-2022 Govind
    Route::post('get_product_comment', [App\Http\Controllers\Api\Listcontroller::class, 'get_product_comment']);
    Route::post('coupon_image_upload', [App\Http\Controllers\Api\Listcontroller::class, 'coupon_image_upload']);
    Route::post('reward_image_upload', [App\Http\Controllers\Api\Listcontroller::class, 'reward_image_upload']);

    Route::get('show_pending_item_request', [App\Http\Controllers\Api\Listcontroller::class, 'show_pending_item_request']);
    Route::get('get_healthtips', [App\Http\Controllers\Api\CommonController::class, 'get_healthtips']);

    Route::apiResource('users', 'UsersApiController');
    Route::post('filter-product', [App\Http\Controllers\Api\ProductApiController::class, 'filterProduct']);
    Route::post('product-filter', [App\Http\Controllers\Api\ProductApiController::class, 'filter']);
    Route::post('category', [App\Http\Controllers\Api\CategoryApiController::class, 'index']);

    Route::post('order-history', [App\Http\Controllers\Api\OrderApiController::class, 'orderHistoryDetail']);
    Route::post('gift-cards', [App\Http\Controllers\Api\GiftCardApiController::class, 'index']);
    Route::post('gift-card-user', [App\Http\Controllers\Api\GiftCardApiController::class, 'store']);
    Route::post('add-order', [App\Http\Controllers\Api\OrderApiController::class, 'store']);

    Route::post('cart-list', [App\Http\Controllers\Api\CartApiController::class, 'index']);
    Route::post('add-cart', [App\Http\Controllers\Api\CartApiController::class, 'store']);
    Route::post('delete-cart', [App\Http\Controllers\Api\CartApiController::class, 'destroy']);
});

Route::get('/clear-cache', function () {
    // 
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
