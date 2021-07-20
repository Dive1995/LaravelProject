<?php

namespace Illuminate\Foundation\Validation;


use Illuminate\Support\Facades\Route;
use App\Models\Feedback;
use App\Models\Billings;
use App\Models\Newuser;
use Illuminate\Http\Request;
use App\Models\Allusers;
use Illuminate\Support\Facades\Redirect;


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


// home screen
Route::get('/', function () {
    return view('welcome');
});

// contact page
Route::get('/contact', function () {
    return view('contact');
});

// plans page
Route::get('/plans', function () {
    return view('plans');
});


// new user

Route::get('/newCustomer',function(){
    return view('newCustomer');
});

Route::post('/newCustomer', function(){
    $newuser = new Newuser();

    $newuser->fname = request('fname');
    $newuser->lname = request('lname');
    $newuser->nic = request('nic');
    $newuser->phone = request('phone');
    $newuser->address = request('address');
    $newuser->gs_division = request('gs_division');
    $newuser->email = request('email');
    $newuser->type = request('type');

    $mobileregex = "/^[0-9]{10}$/" ;  
    $nicregex = "/^[0-9]{9}[vV]$/" ;  

    if(preg_match($mobileregex, request('phone')) === 1){
        if(preg_match($nicregex, request('nic')) === 1){
            $newuser->save();
        }else{
            return Redirect::back()->withErrors([ 'Invalid NIC number']);
        }
    }else{
        return Redirect::back()->withErrors([ 'Invalid Phone number']);
    }

    
    
    
    return redirect('/')->with('msg','Your request has been sent succefully');
});

// 


// feedback
Route::get('/feedback', function(){
    return view('feedback');
});


Route::post('/feedback', function(Request $request){
    $feedback = new Feedback();

    $request->validate([
        'title' => 'required',
        'subject' => 'required'
    ]);

    $feedback->title = request('title');
    $feedback->subject = request('subject');
    // $feedback->userID = '2';
    // $feedback->userID = Auth::user()->id;

    $feedback->save();

    return redirect('/')->with('msg','Thank you for your feedback.');
});
// 


// route user and admin to their dashboards when they login / register

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});


// users (myceb)
Route::group(['middleware' => ['auth','role:user']], function(){
    Route::get('/myceb', function(){
        // return view('myceb');
        $user = Allusers::where('ceb',Auth::user()->ceb)->first();
        return view('/myceb',['user'=>$user]);
    });
        
    // if(Auth::hasRole('user'))
    
    Route::post('/myceb','App\Http\Controllers\UserController@billing');
});



// admin roles

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    // New Request
    Route::get('/dashboard/newrequest','App\Http\Controllers\DashboardController@newrequest')->name('dashboard.newrequest');

    // User Feedback
    Route::get('/dashboard/userfeedback','App\Http\Controllers\DashboardController@feedback')->name('dashboard.userfeedback');

    // Show Update Reading
    Route::get('/dashboard/updatereading','App\Http\Controllers\DashboardController@updatereading')->name('dashboard.updatereading');

    // Show single user
    Route::get('/dashboard/updatereading/{id}','App\Http\Controllers\DashboardController@showuser')->name('dashboard.updatereading');

    // Update reading as admin
    Route::post('/dashboard/updatereading/{id?}','App\Http\Controllers\DashboardController@setreading')->name('dashboard.updatereading');

    // Dashboard Home
    Route::post('/dashboard','App\Http\Controllers\UserController@addusers');
});




require __DIR__.'/auth.php';



// auth route for user and admin

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::group(['middleware' => ['auth','role:user']], function(){
//     Route::get('/myceb','App\Http\Controllers\DashboardController@myceb')->name('myceb');
// });