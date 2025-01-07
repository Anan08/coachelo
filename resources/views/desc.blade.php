<x-layout>
    <div class="container mx-auto p-4" x-data="{ openModal: false }">
        <!-- Profile Section -->
        <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
            <!-- Profile Picture -->
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border border-gray-200">
                <img src="{{Storage::url($coach->user->profile_pic)}}" alt="Profile Picture" class="w-full h-full object-cover">
            </div>

            <!-- Profile Info -->
            <div class="flex flex-col text-center md:text-left">
                <h1 class="text-2xl font-bold">{{$coach->user->name}}</h1>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="text-blue-500 font-medium">♂️ 27</span>
                    <span class="bg-green-100 text-green-700 text-sm font-medium px-2 py-1 rounded">Online</span>
                </div>
                <p class="text-gray-500 mt-1">ID: <span class="font-medium">{{$coach->id}}</span></p>
                <p class="text-gray-500 mt-1">: <span class="font-medium">{{$coach->desc}}</span></p>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-4 md:mt-0">
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium px-4 py-2 rounded">
                    <i class="fas fa-share"></i> Share
                </button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded">
                    <i class="fas fa-heart"></i> Follow
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-6">
            <div class="flex space-x-6 border-b border-gray-200">
                <button class="pb-2 text-purple-500 border-b-2 border-purple-500 font-bold">Skills</button>
                <button class="pb-2 text-gray-500 hover:text-gray-800">Moment</button>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <!-- Skill Cards -->
            <div class="bg-purple-100 shadow rounded-lg p-4">
                <div class="flex items-center">
                    <img src="{{Storage::url($game->game_image)}}" alt="Skill Icon" class="w-12 h-12 rounded-lg object-cover">
                    <div class="ml-4">
                        <h3 class="text-lg font-bold">{{$game->game_name}}</h3>
                        <p class="text-sm text-gray-500">{{$coach->price}} / Session</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Selected Skill Section -->
        <div class="mt-6 bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-bold">{{$game->game_name}}</h2>
            <p class="text-gray-500 mt-1">⭐ 5.00 | Order 87</p>
            <p class="text-purple-500 text-lg font-bold mt-2">{{$coach->price}} / session</p>
            <button @click="openModal = true" class="bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 mt-4 rounded-full">
                Order
            </button>
        </div>

        <!-- Modal -->
        <div x-show="openModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" x-cloak>
            <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-2/3 lg:w-1/3">
                <div class="p-6">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Order Details</h2>
                        <button @click="openModal = false" class="text-gray-500 hover:text-gray-700">&times;</button>
                    </div>
                    <!-- Modal Content -->
                    <form method="POST" action="/session_transaction">
                        @csrf
                        <div class="flex items-center mb-4">
                            <img src="{{Storage::url($coach->user->profile_pic)}}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover">
                            <div class="ml-4">
                                <h3 class="text-lg font-bold">{{$coach->user->name}}</h3>
                                <p class="text-sm text-gray-500">Layanan Orderan: <span class="font-medium">{{$game->game_name}}</span></p>
                            </div>
                        </div>

                        <input type="hidden" name="coach_id" id="coach_id" value="{{$coach->id}}"> 
                        <input type="hidden" name="game_id" id="game_id" value="{{$game->id}}"> 
                        <input type="hidden" name="amount" id="amount" value="{{$coach->price}}"> 

                        <div class="mb-4">
                            <label for="date" class="block text-gray-600 font-medium mb-2">Select Date:</label>
                            <input type="date" id="date" name="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>

                        <div class="mb-4">
                            <label for="sessions" class="block text-gray-600 font-medium mb-2">Select Session:</label>
                            <select id="sessions" name="sessions" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                @foreach ($sessions as $session)
                                    <option value="{{$session->id}}">{{$session->session_name}} ({{$session->start_time}} - {{$session->end_time}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <p class="text-lg font-bold text-purple-500">Harga Final: <span>{{$coach->price}}</span></p>
                            <button @click="openModal = false" class="bg-purple-500 hover:bg-purple-600 text-white font-medium py-2 px-4 rounded-full">
                                Order Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            @keydown.escape.window="show = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        >
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Success</h3>
                    <button @click="show = false" class="text-gray-500 hover:text-gray-700">
                        &times;
                    </button>
                </div>
                <div class="mt-4">
                    <p>{{ session('success') }}</p>
                </div>
                <div class="mt-6 text-right">
                    <button 
                        @click="show = false" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    >
                        OK
                    </button>
                </div>
            </div>
        </div>  
      @endif
    </div>
</x-layout>
