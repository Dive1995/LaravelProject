<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Allusers;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Billings;
use DateTime;

class DashboardController extends Controller
{
    public function index(){
        $users = Allusers::all();

        if(Auth::user()->hasRole('user')){
            $user = Allusers::where('ceb',Auth::user()->ceb)->first();

            return view('myceb',['user'=>$user]);
        }elseif(Auth::user()->hasRole('admin')){
            return view('/dashboard',['users' => $users]);
        }
    }

    // user apply for new request
    public function newrequest(){
        return view('newrequest');
    }


    // feeedback
    public function feedback(){

        // $feedback = DB::table('feedback')
        //     ->join('users', 'users.id', '=', 'feedback.userID')
        //     ->select('feedback.*', 'users.name')
        //     ->get();

        // $feedback = Feedback::join('allusers', 'feedback.userID', '=', 'allusers.id')
        //        ->get(['feedback.*', 'allusers.lname']);


        $feedback = Feedback::all();
        return view('userfeedback',['feedback'=>$feedback]);
    }
    // 


    // show users those don't have online account and update their reading
    public function updatereading(){
        // use ::whereMonth()
        $users = Allusers::where('hasAccount','no')->get();
        // $users = Allusers::all();
        return view('updatereading',['users' => $users]);
    }
    // 


    // set reading to non-account users
    public function setreading(Request $request){
        error_log('submitted');

        // checking num of days from today and last submitted day

        $last_date = $request->updated_at;
        $datetime1 = new DateTime('2021-08-19');//'2021-08-19'
        $datetime2 = new DateTime($last_date);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        
        error_log($days);
        if($days >= 28 && $days < 37){

            $request->validate([
                'reading' => 'required',
            ]);

            //check if user input less than last reading
            if(request('last_reading') > request('reading')){
                return Redirect::back()->withErrors([ 'Invalid Reading']);
            }

    
            // calculating billings
    
            $amount = 60;
            $account_balance = request('balance');
            $ceb = request('ceb');
            $units = request('reading') - request('last_reading');
            error_log($units);
            
            if($units > 120){
                error_log('above 120');
                $amount += $units*10;
                $total = $account_balance + $amount;
            }
            else if($units >= 90 && $units <= 120){
                error_log('90 and above  && less than 120');
                $amount += $units*8;
                $total = $account_balance + $amount;
            }
            else if($units > 60){
                error_log('60 and above 60');
                $amount += $units*6;
                $total = $account_balance + $amount;
            }
            else if($units <= 60){
                error_log('less than 60');
                $amount += $units*4;
                $total = $account_balance + $amount;
            }

            
            error_log($ceb);
            // update allusers table reading, balance column
            Allusers::where('ceb',$ceb)->update(['reading'=> request('reading')]);
            Allusers::where('ceb',$ceb)->update(['balance'=> $total]);


            return redirect('/dashboard');

        }else{
            return Redirect::back()->withErrors([ 'You have already submitted the reading for this month!!']);
        }

    }
}