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

Route::get('/', 'WelcomeController@index')->name('main.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');

    Route::resource('meters', 'MeterController');
    Route::get('change/owner/ship', 'MeterController@changeOwnerShip')->name('change.owner.ship');
    Route::get('select/current/owner/info/{id}', 'MeterController@selectCurrentOwnerInfo');
    Route::get('select/replacing/owner/info/{id}', 'MeterController@selectReplacingOwnerInfo');
    Route::post('save/change/owner/ship', 'MeterController@saveChangeOwnerShip')->name('save.change.owner.ship');

    Route::get('set/rates', 'SetRatesController@index')->name('set.rates');
    Route::post('save/code/type', 'SetRatesController@saveCodeType')->name('save.code.type');
    Route::post('delete/code/type', 'SetRatesController@deleteCodeType')->name('delete.code.type');
    Route::post('save/rate', 'SetRatesController@saveRate')->name('save.rate');
    Route::post('add/fuel/sur/charge', 'SetRatesController@addFuelSurCharge')->name('add.fuel.sur.charge');
    Route::get('/select/ltr/unit/{id}', 'SetRatesController@selectLtrUnit');
    Route::get('/select/code/range/rate/{id}', 'SetRatesController@selectCodeRangeRate');

    Route::get('/manage/bill', 'BillingController@index')->name('manage.bill');
    Route::get('/create/bill', 'BillingController@createBill')->name('create.bill');
    Route::get('/select/create/bill/info/{id}', 'BillingController@selectCreateBillInfo');
    Route::get('due/bill', 'BillingController@dueBill')->name('due.bill');
    Route::post('/bill/print/and/delete', 'BillingController@billPrintAndDelete')->name('bill.print.and.delete');

    Route::get('/payment/receipt', 'PaymentController@index')->name('payment.receipt');
    Route::post('/payment/receipt/print', 'PaymentController@paymentReceiptPrint')->name('payment.receipt.print');
    Route::get('/collect/payment', 'PaymentController@collectPayment')->name('collect.payment');
    Route::get('/select/customer/info/{id}', 'PaymentController@selectCustomerInfo');

    Route::get('/payment/gateway', 'PaymentGatewayController@index')->name('payment.gateway');

    Route::get('/reports', 'ReportController@index')->name('reports');
    Route::post('/reports/print', 'ReportController@reportsPrint')->name('reports.print');

    Route::get('/sms/reminder', 'ReminderController@smsReminder')->name('sms.reminder');
    Route::post('/send/sms/reminder', 'ReminderController@sendSmsReminder')->name('send.sms.reminder');
    Route::get('/custom/sms', 'ReminderController@customSms')->name('custom.sms');
    Route::post('/send/custom/sms', 'ReminderController@sendCustomSms')->name('send.custom.sms');
});
