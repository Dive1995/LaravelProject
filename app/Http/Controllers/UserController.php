<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\Models\Allusers;
use App\Models\Billings;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    // add users manually
    public function addusers(){
        $allusers = new Allusers();

        $allusers->fname = request('fname');
        $allusers->lname = request('lname');
        $allusers->nic = request('nic');
        $allusers->phone = request('phone');
        $allusers->address = request('address');
        $allusers->type = request('type');
        $allusers->reading = request('reading');
        $allusers->balance = request('balance');
        $allusers->ceb = request('ceb');
        $allusers->hasAccount = 'no';
        $allusers->save();


        $users = Allusers::all();
        return redirect('/dashboard')->with('users',$users);
    }

    public function billing(Request $request){
        
        $billing = new Billings();

        // $request->validate([
        //     'reading' => 'required',
        // ]);

        // // calculating billings

        // $amount = 60;
        // $account_balance = request('balance');

        // $units = request('reading') - request('last_reading');
        // error_log($units);
        
        // if($units > 120){
        //     error_log('above 120');
        //     $amount += $units*10;
        //     $total = $account_balance + $amount;
        // }
        // else if($units >= 90 && $units <= 120){
        //     error_log('90 and above  && less than 120');
        //     $amount += $units*8;
        //     $total = $account_balance + $amount;
        // }
        // else if($units > 60){
        //     error_log('60 and above 60');
        //     $amount += $units*6;
        //     $total = $account_balance + $amount;
        // }
        // else if($units <= 60){
        //     error_log('less than 60');
        //     $amount += $units*4;
        //     $total = $account_balance + $amount;
        // }
        // 

        // error_log($amount);
        // error_log($total);


        // checking num of days from today and last submitted day
        // $fdate = $request->Fdate;
        $last_date = request('date');
        // $name = $request->input('name');
        $datetime1 = new DateTime();//'2021-08-19'
        $datetime2 = new DateTime($last_date);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
            // $days=29;
        error_log($days);
        error_log($last_date);

        if($days >= 28 && $days < 37){

            $request->validate([
                'reading' => 'required',
            ]);
    
            // calculating billings
    
            $amount = 60;
            $account_balance = request('balance');
    
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

            if(request('last_reading') > request('reading')){
                return Redirect::back()->withErrors([ 'Invalid Reading']);
            }


            // check if image exist and upload it
            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
                ]);
                // image upload
                // dd($request->file());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/image/',$imageName);

                
                // save to billing table
                $billing->last_reading = request('last_reading');
                $billing->reading = request('reading');
                $billing->userID = request('ceb');
                $billing->connection_type = request('type');
                $billing->account_balance = $total;
                $billing->image = $imageName;
                $billing->save();
                error_log($billing);

                // update allusers table reading, balance column
                Allusers::where('ceb',Auth::user()->ceb)->update(['reading'=> request('reading')]);
                Allusers::where('ceb',Auth::user()->ceb)->update(['balance'=> $total]);

                // create sessions
                session()->flash('reading',request('reading'));
                session()->flash('last_reading',request('last_reading'));
                session()->flash('units',$units);
                session()->flash('balance',$amount);
                session()->flash('total',$total);
                session()->flash('display','block');
                

                return redirect('/dashboard');
            }else{
                return Redirect::back()->withErrors([ 'You have to attach the meter reading image!!!']);
            }

        }else{
            return Redirect::back()->withErrors([ 'You have already submitted the reading for this month!!']);
        }
        

         

        


        
    }
}
