<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-lg m-auto  rounded-md p-8">
                        <!-- {{$user['fname']}} -->
                        <!-- <div class="userdetails">
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
                            
                        </div> -->
                        <!-- <p class="text-lg">{{$user['fname']}} {{$user['lname']}}</p> -->

                        <form action="/dashboard/updatereading/{{$user['id']}}" method="POST">
                        @csrf
                            <label class="text-gray-500 " for="">User Name</label>
                            <p class="text-lg mb-3 bg-gray-100 p-2 rounded-md">{{$user['fname']}} {{$user['lname']}}</p>

                            <label class="text-gray-500" for="">CEB Id</label>
                            <p class="text-lg mb-3 bg-gray-100 p-2 rounded-md">{{$user['ceb']}} </p>

                            <label class="text-gray-500" for="">NIC</label>
                            <p class="text-lg mb-3 bg-gray-100 p-2 rounded-md">{{$user['nic']}}</p>

                            <label class="text-gray-500" for="">Reading</label><br>
                            <input required name="reading" autofocus class="text-lg mb-3 border-2 p-2 rounded-md w-full" placeholder="{{$user['reading']}}">

                            <button name="update" type="submit" class="bg-green-200 px-5 py-3 rounded-md font-bold">Update</button>
                            <a href="/dashboard/updatereading" class="bg-red-100 px-5 py-3 rounded-md font-bold">Cancel</a>

                            <!-- show errors -->
                            <ul class="mt-8">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>   

                            <!-- other needed hidden data -->
                            <input type="number" value="{{$user['reading']}}" name="last_reading" hidden>
                            <input type="text" value="{{$user['type']}}" name="type" hidden>
                            <input type="number" value="{{$user['ceb']}}" name="ceb" hidden>
                            <input type="number" value="{{$user['balance']}}" name="balance" hidden>
                            <input type="number" value="{{$user['updated_at']}}" name="date" hidden>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>