<x-layout>  
    <div class="flex space-x-10">
        <div class="flex bg-gray-100 p-6 h-[500px] overflow-hidden w-[300px]">
            <ul class="space-y-4">
                @foreach ($users as $user)
                    <li class="border-b h-12">
                        <a class="flex" href="/chats/johndoe">
                            <div class="flex items-center space-x-3">
                                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User Avatar">
                                <div>
                                    <h2 class="font-semibold text-md">{{$user->name}}</h2>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    
        <div class="flex">
            <div class="flex flex-col bg-white shadow-md rounded-lg overflow-hidden h-[500px] w-[900px]">
                <!-- Header -->
                <div class="flex items-center justify-between bg-gray-100 p-4 border-b">
                    <div class="flex items-center space-x-3">
                        <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User Avatar">
                        <div>
                            <h2 class="font-semibold text-lg">John Doe</h2>
                            <p class="text-sm text-gray-500">Online</p>
                        </div>
                    </div>
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12h10.5M6.75 16h6.5M6.75 8h10.5"></path>
                        </svg>
                    </button>
                </div>
            
                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    <div class="flex items-end space-x-2">
                        <img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/32" alt="User Avatar">
                        <div class="bg-gray-200 p-3 rounded-lg max-w-xs text-gray-800">
                            <p>This will be changed by message : from receiver_id</p>
                        </div>
                    </div>
            
                    <div class="flex items-end justify-end space-x-2">
                        <div class="bg-indigo-600 text-white p-3 rounded-lg max-w-xs">
                            <p>This will be changed by message : from sender_id</p>
                        </div>
                        <img class="w-8 h-8 rounded-full" src="https://via.placeholder.com/32" alt="User Avatar">
                    </div>
                </div>
            
                <!-- Input -->
                <form class="border-t p-4" method="POST" action=" ">
                    @csrf
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Type a message" class="flex-1 bg-gray-100 border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        <button class="bg-indigo-600 text-white p-2 rounded-lg hover:bg-indigo-500" type="submit">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>               
        </div>
    </div>
            
        
</x-layout>
