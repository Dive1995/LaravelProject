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
                @if (session('msg'))
                <div class="text-green-600 bg-green-100 p-3 rounded-md">
                    <h5>{{session('msg')}}</h5>
                    <!-- <form action="/" method="POST">
                        <input type="button" name="close" value="X">
                    </form> -->
                </div>
            @endif
                    <!-- list all users -->
                    <div class="w-full ">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">CEB Id</th>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <!-- <th class="py-3 px-6 text-center">NIC</th> -->
                                        <th class="py-3 px-6 text-center">Address</th>
                                        <!-- <th class="py-3 px-6 text-center">Phone</th> -->
                                        <th class="py-3 px-6 text-center">Type</th>
                                        <th class="py-3 px-6 text-center">Balance</th>
                                        <th class="py-3 px-6 text-center">Reading</th>
                                        <!-- <th class="py-3 px-6 text-center">Account</th> -->
                                        <!-- <th class="py-3 px-6 text-center">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach($users as $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex items-center">
                                                {{$user['ceb']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="items-center">
                                                {{$user['fname']}}  {{$user['lname']}}
                                            </div>
                                        </td>
                                        <!-- <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['nic']}}
                                            </div>
                                        </td> -->
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['address']}}
                                            </div>
                                        </td>
                                        <!-- <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['phone']}}
                                            </div>
                                        </td> -->
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['type']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['balance']}}
                                            </div>
                                        </td>

                                        <!-- form -->
                                        
                                        
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                            <form action="/dashboard/updatereading" method="post" >
                                            @csrf
                                                <input required id="input" name="reading" class="text-center" type="number" placeholder="{{$user['reading']}}" >
                                                <button class="w-4 mr-2 transform text-purple-500 hover:scale-110" type="submit" name="submit">
                                                    Update
                                                </button>

                                                <ul>
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
                                        </td>
                                        <!-- <td class="py-3 px-6 text-center">
                                            @if($user['hasAccount'] == 'yes')
                                                <span class="bg-green-200 text-gray-900 py-1 px-3 rounded-full text-xs">
                                                    Yes
                                                </span>
                                            @else
                                                <span class="bg-red-200 text-gray-900 py-1 px-3 rounded-full text-xs">
                                                    No
                                                </span>
                                            
                                            @endif
                                            
                                        </td> -->
                                        <!-- <td class="py-3 px-6 text-center">
                                            <div class="flex item-center justify-center">
                                                <!-- <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div> -->
                                                <!-- <div class="w-4 mr-2 transform text-green-500 hover:scale-110">
                                                  
                                                    <a  onclick="setEdit()" class="text-green-500">Edit</a>
                                                </div> -->
                                                <!-- <div class="w-4 mr-2 transform text-purple-500 hover:scale-110">
                                                    <button  type="submit" name="submit">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </td> --> -->
                     
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmation(){
        if(confirm('are you sure?')){
            document.getElementById('submit-form').submit();
        }else{
            return false;
        }   
}

        // function setEdit() {
        // var input = document.getElementById("input");
        // if (input.disabled = true) {
        //     input.disabled = false;
        // } else {
        //     input.disabled = true;
        // }
        // }
    </script>
</x-app-layout>