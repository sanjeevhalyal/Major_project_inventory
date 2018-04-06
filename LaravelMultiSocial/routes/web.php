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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

Route::get('/', 'UserHomePageController@index');

// Route::get('/',function(){return  view('User Homepage/index1'); });

Auth::routes();

// Products URL
Route::resource('products','ProductsController');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','HomeController@userRegistration')->name('home.post');

// Login using microsoft login
Route::middleware(['guest'])->group(function () {
    Route::get('auth/microsoft', 'AuthController@redirectToProvider')->name('auth.microsoft');
});

// microsoft routes
Route::get('auth/microsoft/callback', 'AuthController@handleProviderCallback');


//localadmin routes
//GET: localadmin login form
Route::get('localadmin/login', 'AdminLoginController@showLoginForm');
//POST: localadmin login form
Route::post('localadmin/login', 'AdminLoginController@login')->name('admin.login.submit');
//localadmin routes to get all users.
Route::get('localadmin/user', 'AdminController@findUser')->name('admin.findUser');
//localadmin dashboard after login.
Route::get('localadmin/dashboard', 'AdminController@index')->name('admin.dashboard');

//admin & Staff routes
//Display available categories
Route::get('admin/categories', 'StaffAdminController@showCategories')->name('adminstaff.categories');

//add categories
Route::post('admin/categories', 'StaffAdminController@addNewCategories')->name('adminstaff.newcategories');

//remove category
Route::delete('admin/categories/delete/{id}', 'StaffAdminController@destroyCategories')->name('adminstaff.deletecategories');

//Display available categories
Route::get('admin/products', 'StaffAdminController@showProducts')->name('adminstaff.products');
//Display activity logs
Route::get('admin/logs', 'StaffAdminController@showLogs')->name('adminstaff.logs');
//Export activity logs to excel
Route::get('admin/download', 'StaffAdminController@export');
//Display users list
Route::get('admin/userlist', 'StaffAdminController@showuserlist')->name('adminstaff.userlist');
//collect table update transactions
Route::post('/insert', 'StaffAdminController@collect');
//return table update transactions
Route::post('/collecting', 'StaffAdminController@return');



// sanjeev




Route::get('/getCat','GetCatController');

Route::get('/getProd','GetProductController');

Route::get('/getava','GetAvailabilityController');

Route::post('/addtocart','AddToCartController');

Route::get('/YourCart','CartController');

Route::post('/deletefromcart',function (Request $request) {

    DB::table('cart')->where('Cart_Id', '=', $request->input("CartID"))->delete();
});

Route::post('/checkout',function(Request $request){

  $user = User::find(Auth::id());
    $userstaff = \DB::select("SELECT * FROM users WHERE role_id!='3'");


    $admin='m.panda1@nuigalway.ie';

    $staffanduser= array();
    foreach($userstaff as $key => $staffarr)
    {
        if($staffarr->role_id!=1)
        {
            array_push($staffanduser,$staffarr->email);
        }
        else
        {
            $admin =$staffarr->email;
        }
        array_push($staffanduser,$staffarr->email);
    }

    array_push($staffanduser,$user->email);

    $data = array('name'=>$user->name);
    // Path or name to the blade template to be rendered
    $template_path = 'Mail.mail';


    Mail::send($template_path, $data, function($message) use($admin,$staffanduser) {
        // Set the receiver and subject of the mail.
        $message->to($admin, "Admin")->subject('New Request in System');
        // Set the sender
        $message->from('s.halyal1@nuigalway.ie','NUIGsocs Inventory Mail');
        $message->cc($staffanduser);
    });



   
   $Cart = \DB::select('select * from cart WHERE User_Id=?', [$user->id]);

   foreach ($Cart as $c) {

       DB::table('transactions')->insert([
           ['USER_ID' => $c->User_Id, 'Product_ID' => $c->Product_Id, 'START_DATE' => $c->Start_Date, 'END_DATE' => $c->End_Date, 'BOOKING_STATUS' => 'pending', 'BOOKING_REASON' => $request->input('Reason')]
       ]);

       DB::table('cart')->where('Cart_Id', '=', $c->Cart_Id)->delete();
       DB::commit();

   }
   echo 1;
});


// sanjeev end
