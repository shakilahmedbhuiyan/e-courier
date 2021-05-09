<?php

use App\Http\Controllers\SslCommerzPaymentController;
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

    /*
     * Public Routes
     */

Route::get('/', 'HomeController@index')->name('home');
/*
  *  User login/register Routes Lists
  */
Route::get('/login', 'User\Auth\LoginController@index')->name('user.login');
Route::post('/login', 'User\Auth\LoginController@login')->name('user.auth');
Route::get('/register', 'User\Auth\RegisterController@index')->name('user.register');
Route::post('/register', 'User\Auth\RegisterController@login')->name('user.create');
Route::post('/courier/track', 'HomeController@tracking')->name('courier.tracking');

/*
 * Courier Booking Routes
 */

Route::post('/courier/add/','HomeController@addCourier')->name('home.addCourier');
Route::get('/courier/add/','User\CourierController@create')->name('courier.book');
Route::get('/courier/add/ajax-getDeliveryCategory','User\CourierController@getDeliveryCategory')->name('getDeliveryCategory');
Route::post('/courier/confirm','User\CourierController@store')->name('courier.store');

Route::get('/courier/track/{code}','User\CourierController@track')->name('courier.track');

// SSLCOMMERZ Start
Route::post('/courier/confirm/pay', [SslCommerzPaymentController::class, 'index'])->name('payment');
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


/*
 *    User Routes Lists
 */

Route::middleware('guest')->group(function () {
    /*
     * Admin login Route
     */
    Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');
    /*
     * Manager login Route
     */
    Route::get('/manager/login', 'Manager\Auth\LoginController@showLoginForm')->name('manager.login');
    Route::post('/manager/login', 'Manager\Auth\LoginController@login')->name('manager.login');

});


Route::middleware('auth:admin')->group(function () {
    /*
     * --------------------------------------------------------------------------
     * Admin dashboard Route
     * --------------------------------------------------------------------------
     */
    Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin');
    Route::get('/admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
    Route::get('/admin/admins', 'Admin\AdminController@showAdminList')->name('admins.all');

    /*
     * Branch Routes
     */
    Route::get('/admin/branches', 'Admin\BranchController@index')->name('branches.index');
    Route::get('/admin/branches/create', 'Admin\BranchController@create')->name('branch.create');
    Route::post('/admin/branches/store', 'Admin\BranchController@store')->name('branch.store');
    Route::view('/admin/branch/{data?}', 'admin.branchAdded')->name('branch.added');
    Route::post('/admin/branches/store/manager', 'Admin\BranchController@addManager')->name('branch.addManager');
    Route::get('admin/branches/info/{id}','Admin\BranchController@branch')->name('branch.info');

    /*
     *
     * Manager Routes
     */
    Route::get('/admin/managers', 'Admin\ManagerController@index')->name('managers.index');
    Route::get('/admin/managers/add/{id}', 'Admin\ManagerController@create')->name('manager.create');
    Route::post('/admin/managers/store', 'Admin\ManagerController@store')->name('manager.store');
    Route::delete('/admin/managers/{id}/delete', 'Admin\ManagerController@delete')->name('manager.delete');

    /*
     * Employee Routes
     */
    Route::get('/admin/employees', 'Admin\EmployeeController@index')->name('employees.index');
    Route::get('/admin/employees/add', 'Admin\EmployeeController@create')->name('employees.create');
    Route::post('/admin/employees/add', 'Admin\EmployeeController@store')->name('employee.store');

});

/*
 * --------------------------------------------------------------------------
 * Manager Dashboard Route Lists
 * --------------------------------------------------------------------------
 */

Route::middleware('auth:manager')->group(function () {

    Route::get('/manager', 'Manager\ManagerController@index')->name('manager');
    Route::get('/manager/dashboard', 'Manager\ManagerController@index')->name('manager');
    Route::get('/manager/logout', 'Manager\ManagerController@logout')->name('manager.logout');
    Route::get('/manager/branches', 'Manager\ManagerController@branches')->name('manager.branches');
    Route::get('/manager/employees', 'Manager\ManagerController@employees')->name('manager.employees');
    Route::get('/manager/courier/all','Manager\CourierController@index')->name('manager.couriers.index');

    Route::post('/manager/courier/ready/{id}','Manager\CourierController@readyForDelivery')->name('manager.couriers.ready');

    Route::get('/manager/courier/delivery','Manager\CourierController@delivery')->name('manager.couriers.delivery');
    Route::post('/manager/courier/delivery/{id}','Manager\CourierController@delivered')->name('manager.couriers.delivered');

    Route::get('/manager/courier/processing','Manager\CourierController@processing')->name('manager.couriers.processing');
    Route::post('/manager/courier/picked/{id}','Manager\CourierController@AddTopicked')->name('manager.couriers.pick');
    Route::get('/manager/courier/picked','Manager\CourierController@picked')->name('manager.couriers.picked');

    Route::post('/manager/courier/transit/{id}','Manager\CourierController@AddToTransit')->name('manager.couriers.transit');
    /*
     * Profile Routes
     */
    Route::get('/manager/profile','Manager\ProfileController@profile')->name('manager.profile');

    /*
     * Export pdf
     */
    Route::get('manager/courier/{status}/pdf','Manager\CourierController@couriersPdf')->name('manager.couriers.pdf');

});


Route::middleware('auth:user')->group(function () {

    /*
     *  User Routes Lists
     */
    Route::get('/profile', 'User\UserController@index')->name('user.profile');
    Route::get('/logout', 'User\UserController@logout')->name('user.logout');
});
