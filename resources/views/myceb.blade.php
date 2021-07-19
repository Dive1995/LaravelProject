<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            

<!-- myceb -->
<div class="container">
<div class="myceb">

       <!-- displaay user details -->
       <div class="usercontainer">
        <div class="userdetails">
            <div class="grid">
                <h5>Name</h5>
                <p>{{$user['fname']}} {{$user['lname']}}</p>
            </div>
            <div class="grid">
                <h5>CEB id</h5>
                <p>{{$user['ceb']}}</p>
            </div>
            <div class="grid">
                <h5>NIC</h5>
                <p>{{$user['nic']}}</p>
            </div>
            <div class="grid">
                <h5>Phone no.</h5>
                <p>{{$user['phone']}}</p>
            </div>
            <div class="grid">
                <h5>Last Billing Date</h5>
                <p>{{$user['updated_at']->todatestring()}}</p>
            </div>
            <div class="grid">
                <h5>Next Billing Date</h5>
                <p>{{date("Y-m-d", strtotime("+1 month", strtotime($user['updated_at'])))}}</p>
            </div>
        </div>
    </div>
   
    <!-- display last reading, payment -->
    <div class="card-item flex">
        <div class="item lastreading">
            <p>Last Reading</p>
            <h4>{{$user['reading']}}</h4>
        </div>
        <div class="item payment">
            <p>You have to pay</p>
            <h4>Rs. {{$user['balance']}}</h4>
        </div>
    </div>

    <h3><span style="color:red; font-weight:bold">NOTE :</span> Always put the currect reading of the meter, 
        don't try to put less amount of the original reading 
        it will cause you higher payments when we come in person to check and find out the readings after this pandamic is over.</h3>
        <!-- <p>You may have to pay more money per units according your usage, keep that in mind.</p> -->

        <div class="text-center my-9">
        <!-- <p class="text-red-700">* Please attach a photo of your meter reading </p> -->
        <p class="text-red-700">* This form is submittable only for the first week of each month.</p>   
        <p class="text-red-700">* Please double check your reading before submitting, you can submit only one time for a month</p>
        </div>


        <!-- form -->
    <div class="myceb-form bg-blue-100 rounded-lg">
        <form action="/myceb" method="post" enctype="multipart/form-data">
        @csrf
           
            <!-- <p class="">{{session('error')}}</p> -->
            <!-- @if($errors->any())
                <h5 class="alert alert-danger text-red-600">{{$errors->first()}}</h5>
            @endif -->

            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>   

            <div class="grid userinput">
                    <label for="current_reading">Enter this month reading</label>
                    <input id="current_reading" type="number" name="reading">
            </div>
            <div class="grid userinput">
                    <label for="image">Upload your meter image here</label>
                    <input id="image" type="file" name="image">
            </div>
            <!-- other needed hidden data -->
            <input type="number" value="{{$user['reading']}}" name="last_reading" hidden>
            <input type="text" value="{{$user['type']}}" name="type" hidden>
            <input type="number" value="{{$user['ceb']}}" name="ceb" hidden>
            <input type="number" value="{{$user['balance']}}" name="balance" hidden>
            <input type="number" value="{{$user['updated_at']}}" name="date" hidden>

            <button name="submit" type="submit" class="btn-primary">Submit</button>
            
        </form>
       
        <!-- {{Session::get('days') ?? 'none' }} -->

    </div>

    <div class="pt-9 bg-green-100 myceb-form my-9 rounded-lg" style="display: {{session('display') ?? 'none'}}">
            <form action="">
                <div class="grid userinput">
                            <label for="current_readin">This month reading</label>
                            <input id="current_readin" type="number" name="reading" disabled placeholder="{{session('reading') ?? 'null'}}">
                    </div>
                <div class="grid">
                            <label for="last_reading">Last reading</label>
                            <input id="last_reading" type="number" disabled placeholder="{{session('last_reading') ?? 'null'}}">
                    </div>
                    <div class="grid">
                            <label for="units">Untits used</label>
                            <input id="units" type="number" disabled placeholder="{{session('units') ?? 'null'}}">
                    </div>
                    <div class="grid">
                            <label for="month_payment">Payment for this month</label>
                            <input id="month_payment" type="number" disabled placeholder="{{session('balance') ?? 'null'}}">
                    </div>
                    <div class="grid">
                            <label for="total_payment">Total Payment</label>
                            <input id="total_payment" type="number" disabled placeholder="{{session('total') ?? 'null'}}">
                    </div>
            </form>
        </div>
    
    
    <!-- if payment exceeds 4000 give warning -->
    <p class="pt-4 pb-8">Please settle down your payments as soon as possible or <a href="contact.php">contact us</a> if you have any difficulties to avoid your electricity disconnection</p>
   
    
</div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>


