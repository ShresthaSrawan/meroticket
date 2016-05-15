<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@get_index' ));

/* For User Registration and Login */

Route::get('register', array('as'=>'register', 'uses'=>'UserController@get_registration'));
Route::get('login', array('as'=>'login', 'uses'=>'LoginController@doLogin'));
Route::get('/logout', array('as'=>'logout', 'uses'=>'LoginController@logout' ));

Route::post('register', array('as'=>'postRegister', 'uses'=>'UserController@post_create'));
Route::post('login', array('as'=>'postLogin', 'uses'=>'LoginController@post_login'));

/*Owner Registration*/
Route::get('owner/register', ['as'=>'getOwnerRegistration', 'uses'=>'OwnerController@get_owner_registration']);
Route::post('owner/register', array('as'=>'postOwnerRegistration', 'uses'=>'OwnerController@post_owner_registration'));

// Route::get('search', array('as'=>'search', 'uses'=>'BookController@getSearchResult'));
Route::post('search',['as'=>'postsearch', 'uses'=>'BookController@search'] );
Route::post('bus/search', array('as'=>'searchResult', 'uses'=>'BookController@getSearchResult'));
Route::get('bus/{bookingid}', array('as'=>'viewBookingDetails', 'uses'=>'BookController@viewBookingDetails'));

// For Terms and Condition
Route::get('terms-and-condition', ['as'=>'getTerms_And_Condition', 'uses'=>'UserController@getTermsAndCondition']);
Route::get('privacy-policy', ['as'=>'get_Privacy_Policy', 'uses'=>'UserController@getPrivacyPolicy']);

/* For User group */
Route::group(array('before'=>'users'), function(){

	Route::get('user/profile', array('as'=>'account', 'uses'=>'UserController@get_profile'));
	Route::get('bus/seat/{bookingid}/', array('as'=>'seatselection','uses'=>'BookController@getSeat'));
	Route::post('bus/seat/selection', ['as'=>'postSelectSeat', 'uses'=>'BookController@postSelectSeat']);
	Route::post('bus/seat/book', array('as'=>'postBookingTicket', 'uses'=>'BookController@getBookingTicket'));
	Route::get('seat',['as'=>'seatcheck','uses'=>'BookController@getReservedSeat']);

	Route::get('user/profile/edit/get', ['as'=>'getEditUserProfile', 'uses'=>'UserController@getEditUserProfile']);
	Route::post('user/profile/edit/post', ['as'=>'postEditUserProfile', 'uses'=>'UserController@editUserProfile']);

	Route::get('user/view/all/Booking', ['as'=>'viewUserBookingHistory', 'uses'=>'UserController@viewUserBookingHistory']);

});

//Admin group route
Route::group(array('before' => 'admin'), function(){

	Route::get('admin/dashboard', ['as'=>'adminDashboard', 'uses'=>'AdminController@getAdminIndex']);
	Route::get('confirm/owner/registration', ['as'=>'getConfirmationView', 'uses'=>'AdminController@getConfirmationView']);
	Route::post('owner/registration/confirm', ['as'=>'postConfirmationView', 'uses'=>'AdminController@postConfirmationView']);
	Route::post('owner/registration/delete', ['as'=>'postDeleteConfirmation', 'uses'=>'AdminController@postDeleteConfirmation']);
	Route::get('list/owner', ['as'=>'viewAllOwner', 'uses'=>'AdminController@viewAllOwner']);	
	
	Route::get('add/cities', ['as'=>'getAddCities', 'uses'=>'AdminController@getAddCities']);
	Route::post('post/cities', ['as'=>'postAddCities', 'uses'=>'AdminController@postAddCities']);
	Route::get('view/cities', ['as'=>'getViewAddCities', 'uses'=>'AdminController@getViewAddCities']);
	Route::post('post/edit/city', ['as'=>'postEditAddCity', 'uses'=>'AdminController@postEditAddCity']);
	Route::post('post/delete/city', ['as'=>'postDeleteAddCity', 'uses'=>'AdminController@postDeleteAddCity']);

	Route::get('get/bus/trash', ['as'=>'getBusTrash', 'uses'=>'AdminController@getTrashBus']);
	Route::post('post/delete/bus/trash', ['as'=>'postDeleteTrashBus', 'uses'=>'AdminController@postDeleteTrashBus']);
	Route::post('post/undo/bus/trash', ['as'=>'postUndoTrashBus', 'uses'=>'AdminController@postUndoTrashBus']);

	Route::get('get/route/trash', ['as'=>'getRouteTrash', 'uses'=>'AdminController@getTrashRoute']);
	Route::post('post/delete/route/trash', ['as'=>'postDeleteTrashRoute', 'uses'=>'AdminController@postDeleteTrashRoute']);
	Route::post('post/undo/route/trash', ['as'=>'postUndoTrashRoute', 'uses'=>'AdminController@postUndoTrashRoute']);

	Route::get('get/Bus-Type/trash', ['as'=>'getBusTypeTrash', 'uses'=>'AdminController@getBusTypeTrash']);
	Route::post('post/delete/bus-type/trash', ['as'=>'postDeleteTrashBusType', 'uses'=>'AdminController@postDeleteTrashBusType']);
	Route::post('post/undo/bus-type/trash', ['as'=>'postUndoTrashBusType', 'uses'=>'AdminController@postUndoTrashBusType']);

	Route::get('get/city/trash', ['as'=>'getCityTrash', 'uses'=>'AdminController@getCityTrash']);
	Route::post('post/delete/city/trash', ['as'=>'postDeleteTrashCity', 'uses'=>'AdminController@postDeleteTrashCity']);
	Route::post('post/undo/city/trash', ['as'=>'postUndoTrashCity', 'uses'=>'AdminController@postUndoTrashCity']);

	Route::get('get/terms-condition/trash', ['as'=>'getTrashTermsAndCondition', 'uses'=>'AdminController@getTrashTermsAndCondition']);
	Route::post('get/delete/terms-condition/trash', ['as'=>'postDeleteTrashTermsAndCondition', 'uses'=>'AdminController@postDeleteTrashTermsAndCondition']);
	Route::post('post/undo/terms-condition/trash', ['as'=>'postUndoTrashTermsAndCondition', 'uses'=>'AdminController@postUndoTrashTermsAndCondition']);

	Route::get('add/terms-condition/get', ['as'=>'getTermsAndCondition', 'uses'=>'AdminController@getAddTermsAndCondition']);
	Route::post('add/terms-condition/post', ['as'=>'postAddTermsAndCondition', 'uses'=>'AdminController@postAddTermsAndCondition']);
	Route::get('view/terms-condition/get', ['as'=>'getViewTermsAndCondition', 'uses'=>'AdminController@getViewTermsAndCondition']);
	Route::post('edit/terms-condition/post', ['as'=>'postEditTermsAndCondition', 'uses'=>'AdminController@postEditTermsAndCondition']);
	Route::post('delete/terms-condition/post', ['as'=>'postDeleteTermsAndCondition', 'uses'=>'AdminController@postDeleteTermsAndCondition']);

	Route::get('add/privacy-policy/get', ['as'=>'getAddPrivacyPolicy', 'uses'=>'AdminController@getAddPrivacyPolicy']);
	Route::post('add/privacy-policy/post', ['as'=>'postAddPrivacyPolicy', 'uses'=>'AdminController@postAddPrivacyPolicy']);
	Route::get('view/privacy-policy/get', ['as'=>'getViewPrivacyPolicy', 'uses'=>'AdminController@getViewPrivacyPolicy']);
	Route::post('edit/privacy-policy/post', ['as'=>'postEditPrivacyPolicy', 'uses'=>'AdminController@postEditPrivacyPolicy']);
	Route::post('delete/privacy-policy/post', ['as'=>'postDeletePrivacyPolicy', 'uses'=>'AdminController@postDeletePrivacyPolicy']);


});

//Owner group route
Route::group(array('before' => 'owner'), function(){
	
	Route::get('owner/dashboard', array('as'=>'ownerDashboard', 'uses'=>'OwnerController@getOwnerIndex'));
	Route::get('add/bus_type/get', ['as'=>'getAddBusType', 'uses'=>'OwnerController@getAddBusType']);
	Route::post('add/bus_type/post', ['as'=>'postAddBusType', 'uses'=>'OwnerController@postAddBusType']);
	Route::get('view/bus_type', ['as'=>'viewBusType', 'uses'=>'OwnerController@viewBusType']);
	Route::post('view/bus_type/edit', ['as'=>'postEditBustype', 'uses'=>'OwnerController@editBusType']);
	Route::post('view/bus_type/delete', ['as'=>'postDeleteBustype', 'uses'=>'OwnerController@deleteBusType']);

	//These are the route responsible for Adding, Updating and Deleting bus
	Route::get('add/bus/get', ['as'=>'getAddBus', 'uses'=>'OwnerController@getAddBus']);
	Route::post('owner/add/bus/post', ['as'=>'postAddBus', 'uses'=>'OwnerController@postAddBus']);	
	Route::get('view/bus/all', ['as'=>'viewBus', 'uses'=>'OwnerController@ViewBus']);
	Route::post('view/bus/edit', ['as'=>'postEditBus', 'uses'=>'OwnerController@postEditBus']);
	Route::post('view/bus/delete', ['as'=>'postDeleteBus', 'uses'=>'OwnerController@postDeleteBus']);
	
	//To set feature to bus
	Route::get('add/feature/get', ['as'=>'getAddFeature','uses'=>'OwnerController@getAddFeature']);	
	Route::post('add/feature/post', ['as'=>'postFeature','uses'=>'OwnerController@postFeature']);
	Route::post('edit/feature/get', ['as'=>'postEditFeature','uses'=>'OwnerController@postEditFeature']);
	Route::post('delete/feature/post', ['as'=>'postDeleteFeature', 'uses'=>'OwnerController@postDeleteFeature']);

	//for bus feature
	Route::get('add/bus/feature/get', ['as'=>'getAddBusFeature','uses'=>'OwnerController@getAddBusFeature']);
	Route::post('add/bus/feature/post', ['as'=>'postAddBusFeature','uses'=>'OwnerController@postAddBusFeature']);
	Route::get('view/bus/feature/get', ['as'=>'viewBusFeature', 'uses'=>'OwnerController@getViewBusFeature']);

	//For Bus Route
	Route::get('add/route/get', ['as'=>'getAddRoute', 'uses'=>'OwnerController@getAddRoute']);	
	Route::post('add/route/post', ['as'=>'postAddRoute', 'uses'=>'OwnerController@addRoute']);
	Route::get('view/route/get', ['as'=>'getViewRoute', 'uses'=>'OwnerController@getViewRoute']);
	Route::post('view/route/edit', ['as'=>'postEditRoute','uses'=>'OwnerController@postEditRoute']);
	Route::post('view/route/delete', ['as'=>'postDeleteRoute', 'uses'=>'OwnerController@postDeleteRoute']);

	Route::get('set/bus/booking/date/get', ['as'=>'getAddBookingDate', 'uses'=>'OwnerController@getSetBookingDate']);	
	Route::post('set/bus/booking/date/post', ['as'=>'postSetBookingDate', 'uses'=>'OwnerController@postSetBookingDate']);
	Route::get('view/set/booking/date/get', ['as'=>'viewBookingDate', 'uses'=>'OwnerController@viewBookingDate']);
	Route::post('edit/view/booking/date', ['as'=>'postEditBookingDate', 'uses'=>'OwnerController@postEditBookingDate']);
	Route::post('delete/view/booking/date', ['as'=>'postDeleteBookingDate', 'uses'=>'OwnerController@postDeleteBookingDate']);

	Route::get('view/bus/booking/date', ['as'=> 'viewBookingDate', 'uses'=>'OwnerController@viewBookingDate']);
	Route::post('view/bus/booking/date/edit', ['as'=>'postEditBookingDate', 'uses'=>'OwnerController@postEditBookingDate']);
	Route::post('view/bus/booking/date/delete', ['as'=>'postDeleteBookingDate', 'uses'=>'OwnerController@postDeleteBookingDate']);

	Route::get('view/ticket/booking/confirmation', ['as'=>'viewBookingConfirmation', 'uses'=>'OwnerController@getBookingConfirmation']);
	Route::post('view/ticket/booking/confirm', ['as'=>'postConfirmBooking', 'uses'=>'OwnerController@postConfirmBooking']);
	Route::post('view/ticket/booking/cancel', ['as'=>'postCancelBooking', 'uses'=>'OwnerController@postCancelBooking']);

	// Route::get('admin/owner/view/booking/get', ['as'=>'getBooking','uses'=>'OwnerController@getBooking']);
});