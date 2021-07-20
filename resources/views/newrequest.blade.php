<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-9 bg-white border-b border-gray-200">

                    <!-- list all users -->
                    <div class="w-full ">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-center">NIC</th>
                                        <th class="py-3 px-6 text-center">Address</th>
                                        <th class="py-3 px-6 text-center">GS Division</th>
                                        <th class="py-3 px-6 text-center">Type</th>
                                        <th class="py-3 px-6 text-center">Email</th>
                                        <th class="py-3 px-6 text-center">Phone</th>
                                        <!-- <th class="py-3 px-6 text-center">Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach($users as $user)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 ">
                                            <div class="items-center">
                                                {{$user['fname']}}  {{$user['lname']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['nic']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['address']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['gs_division']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['type']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['email']}}
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 ">
                                            <div class="flex items-center">
                                                {{$user['phone']}}
                                            </div>
                                        </td>
                                        
                                       
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
</x-app-layout>