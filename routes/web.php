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


Route::get('under-maintainance', 'Front\FrontController@underMaintainance');
Route::get('jobsemail', 'QueueController@jobsEmail');

Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');

Route::get('coemail', function(){
    return view('emails.jobs');
});

/* please note that offer_id refers to offer_status_id */

Route::group(['middleware' => ['web', 'maintainance']], function(){
    Route::get('code/{code}', 'HomeController@checkCode');
    Route::post('code/{code}', 'HomeController@checkCode');

    Route::get('/', 'Front\FrontController@index');
    Route::get('myprofile', 'Front\FrontController@profile');
    Route::patch('myprofile', 'Front\FrontController@updateprofile');
    Route::get('reviews/{user_id}', 'Front\FrontController@reviews');
    Route::get('freelancers', 'Front\FrontController@freelancers');
    Route::get('about-us', 'Front\FrontController@aboutUs');
    Route::get('contact-us', 'Front\FrontController@contactUs');
    Route::post('contact-us', 'Front\FrontController@sendContact');

    Route::get('search/projects', 'Front\ProjectController@search');

    Route::get('offer/project/{project_id}', 'Front\OfferStatusController@create');


    

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();

Route::group(['middleware' => ['web', 'maintainance', 'auth']], function(){
    
 /* ProjectController */   
 Route::resource('projects', 'Front\ProjectController');
 Route::get('projects/{id}/delete', 'Front\ProjectController@destroy');
 Route::get('confirmdone/project/{project_id}', 'Front\ProjectController@confirmdone');
    
 Route::get('notification/projects', 'Front\ProjectController@projectNotification');
 Route::get('notification/user-invoice', 'Front\ProjectController@userInvoiceNotification');
    
 Route::post('last-seen-project', 'Front\ProjectController@lastSeenProject');
 Route::post('last-seen-offer', 'Front\ProjectController@lastSeenOffer');
 Route::get('project/statistics/{project_id}', 'Front\ProjectController@projectStatistics');
    
 /* OfferStatusController */
 Route::post('offer/project/{project_id}', 'Front\OfferStatusController@store');
 Route::patch('offer/project/{offer_id}', 'Front\OfferStatusController@update');
 Route::get('offer/project/{offer_id}/award', 'Front\OfferStatusController@awardProject');
 Route::get('notification/offers', 'Front\OfferStatusController@offerNotification');
 Route::get('myoffers', 'Front\OfferStatusController@myOffers');
 Route::post('offer/seen', 'Front\OfferStatusController@offerSeen');
    
    
 /* MessageController */    
 Route::get('messages/{offer_id}', 'Front\MessageController@index');
 Route::post('messages/{offer_id}', 'Front\MessageController@store'); 
 Route::get('message/othersend/{offer_id}', 'Front\MessageController@checkMsgOtherSend');
 Route::get('notification/messages', 'Front\MessageController@notification');
 Route::get('allmessages', 'Front\MessageController@allmessages');
    
    
 /* MilestoneController */
 Route::get('milestone/release/{milestone_id}', 'Front\MilestoneController@release');
 Route::get('milestone/dispute/{milestone_id}', 'Front\MilestoneController@createdispute');
 Route::post('milestone/dispute/{milestone_id}', 'Front\MilestoneController@storedispute');
 Route::get('milestone/dispute/show/{milestone_id}', 'Front\MilestoneController@showdispute');
    
    
 /* InvoiceController */   
 Route::get('invoices', 'Front\InvoiceController@index');
 Route::resource('invoice', 'Front\InvoiceController');
 Route::get('receipt/{invoice_id}', 'Front\InvoiceController@showReceipt');
 Route::get('receipt/edit/{invoice_id}', 'Front\InvoiceController@editReceipt');
 Route::post('storereceipt/{invoice_id}', 'Front\InvoiceController@storeReceipt');
 Route::patch('updatereceipt/{invoice_id}', 'Front\InvoiceController@updateReceipt');
 Route::post('overdate-invoice/seen', 'Front\InvoiceController@overdateInvoiceSeen');
    
 /* EvaluationController */   
 Route::post('project/evaluate/{project_id}', 'Front\EvaluationController@evaluate');
    

});





