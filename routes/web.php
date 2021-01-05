<?php
use App\InstitutionType;
use App\LoanType;
use App\Duration;
use App\Product;
use Illuminate\Support\Facades\Input;
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

Route::get('/', function () {

    return view('welcome');
    });

// ROUTE FOR CALCULATEBANKCHARGES CONTROLLER
Route::resource('/calculate/bank/charges','CalculateBankChargesController');
Route::get('/calculate/bank/charges', ['as'=>'calculate/bank/charges','uses'=>'CalculateBankChargesController@calculateBankCharges']);
Route::post('/calculate/bank/charges', ['as'=>'calculate/bank/charges','uses'=>'CalculateBankChargesController@calculateBankCharges']);
Route::post('/calculate/bank/charges', ['as'=>'calculate/bank/charges','uses'=>'CalculateBankChargesController@store']);
Route::get('/all/account/types/list','CalculateBankChargesController@getAllAccountTypeList');
Route::get('/all/currencies/list/','CalculateBankChargesController@getAllCurrencyList');

// Authentication Routes...
Route::get('login', [
	'as' => 'login',
	'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
	'as' => '',
	'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
  ]);

  // Password Reset Routes...
  Route::post('password/email', [
	'as' => 'password.email',
	'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
	'as' => 'password.request',
	'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
	'as' => 'password.update',
	'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
	'as' => 'password.reset',
	'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

// Route for New view/blade user change password
Route::get('/change_password', function () {
    return view('auth.passwords.new_user_change_pwd');
});

// ChangePassword Route Controller
Route::post('/change_password', 'ChangePasswordController@updateNewuser');


Route::resource('/change-password', 'ChangePasswordController');
Route::post('/change-password', 'ChangePasswordController@update');

// Route for CheckUserStatus Middleware
Route::group(['middleware' => 'CheckUserStatus'], function () {

    // Route for ValidateButtonHistory Middleware
    Route::group(['middleware' => 'ValidateButtonHistory'], function () {

        // Route for Auth Middleware
        Route::group(['middleware' => 'auth'], function () {

            // Home Route Controller
            Route::get('/home', 'HomeController@index')->name('home');

            // ViewUser Route Controller allSystemsUsers
            Route::resource('/view-users', 'ViewUsersController');
            Route::post('/view-users', 'ViewUsersController@store');
            Route::get('/reset/{id}', 'ViewUsersController@resetpwd');
            Route::get('/view-users/profile', 'ViewUsersController@show');

            Route::get('/view/all/users', 'ViewUsersController@allSystemsUsers');

            // ROUTE FOR MANAGEBANKS CONTROLLER
            Route::resource('/admin/manage/banks', 'ManageBanksController');
            Route::post('/admin/manage/banks', 'ManageBanksController@store');

            // ROUTE FOR ACCOUNTTYPECONTROLLER
            Route::resource('/admin/manage/account/types', 'AccountTypesController');
            Route::post('/admin/manage/account/types', 'AccountTypesController@store');

            // ROUTE FOR CURRENCIESCONTROLLER 
            Route::resource('/admin/manage/currency', 'CurrenciesController');
            Route::post('/admin/manage/currency', 'CurrenciesController@store');

            //ROUTES FOR PERMISSIONS
            //Call entrust users view
            Route::get('/settings/manage_users/permissions/entrust_user', 'PermissionsController@entrust_user');
            //Get all permissions for specific user
            Route::get('/settings/manage_users/permissions/entrust', 'PermissionsController@entrust');
            //Entrust user route
            Route::post('/settings/manage_users/permissions/entrust_usr', 'PermissionsController@entrust_user_permissions');
            //Get permission for role
            Route::get('/settings/manage_users/permissions/entrustRole', 'PermissionsController@entrust_roles');
            //Route to entrust permissions to the role
            Route::post('/settings/manage_users/permissions/entrust_role_permissions', 'PermissionsController@entrust_role_permissions');
            //Call roles view
            Route::get('/settings/manage_users/permissions/entrust_role', 'PermissionsController@entrust_role');
            Route::resource('/settings/manage_users/permissions/', 'PermissionsController');

            //ROUTES FOR ROLES
            Route::get('/settings/manage_users/roles/entrust', 'RolesController@get_roles');
            Route::post('/settings/manage_users/roles/entrust', 'RolesController@post_roles');
            Route::get('/settings/manage_users/roles/add', 'RolesController@add');
            Route::resource('/settings/manage_users/roles', 'RolesController');
        });
    });
});

