<x-dashboard>
     <div class="container mx-auto p-4">
         <h1 class="text-2xl font-bold mb-4">Users</h1>
 
         <!-- Orders List -->
         <div class="grid grid-cols-1 gap-4">
             @foreach ($users as $user)
             <!-- Order Item -->
             <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between" id="{{$user->id}}">
                 <div class="flex items-center">
                     <!-- Coach Profile Picture -->
                     <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-200">
                         <img src="{{Storage::url($user->profile_pic)}}" alt="Coach Profile" class="w-full h-full object-cover">
                     </div>
                     <!-- Coach Info -->
                     <div class="ml-4">
                         <h2 class="text-lg font-bold">{{$user->username}}</h2>
                         <h1 class="text-gray-600 hover:text-blue-700 text-sm" target="_blank">{{$user->name}}</h1>
                     </div>
                 </div>
             </div>
     
             @endforeach
         </div>
     </div>
 </x-dashboard>
 