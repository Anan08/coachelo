<x-dashboard>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">My Order</h1>

        <!-- Orders List -->
        <div class="grid grid-cols-1 gap-4">
            @foreach ($transactions as $transaction)
                
            <!-- Order Item -->
            <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <!-- Coach Profile Picture -->
                    <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-200">
                        <img src="{{Storage::url($transaction->coach->user->profile_pic)}}" alt="Coach Profile" class="w-full h-full object-cover">
                    </div>
                    <!-- Coach Info -->
                    <div class="ml-4">
                        <h2 class="text-lg font-bold">{{$transaction->coach->user->username}}</h2>
                        <p class="text-gray-500">{{$transaction->game->game_name}}</p>
                    </div>
                </div>

                <!-- Order Status with Alpine.js -->
                <div x-data="{ status: '{{$transaction->status}}', open : false, transaction : {} }" class="relative">
                    <!-- Current Status -->
                    <button 
                        x-on:click="transaction = {
                            status: '{{$transaction->status}}',
                            coach_picture : '{{Storage::url($transaction->coach->user->profile_pic)}}',
                            coach_name : '{{$transaction->coach->user->name}}',
                            amount : '{{$transaction->amount}}',
                            game_name : '{{$transaction->game->game_name}}',
                            order_id : '{{$transaction->id}}',
                            session_date : '{{$transaction->session_date}}',
                            session_name : '{{$transaction->session->session_name}}',
                            isPaid : '{{$transaction->isPaid}}',
                        }; open = true;"
                        class="bg-yellow-100 text-yellow-700 text-sm font-medium px-3 py-1 rounded-full flex items-center space-x-2">
                        <span x-text="status"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    
                    <!-- Modal -->
                    <div 
                    x-show="open" 
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300"
                    @keydown.escape.window="open = false"
                    x-transition.opacity
                    >
                        <!-- Modal Content -->
                        <div 
                            class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md transform transition-transform duration-300 scale-95"
                            x-transition.scale
                        >
                            <!-- Modal Header -->
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-2xl font-bold text-gray-800">Transaction Details</h2>
                                <button @click="open = false" class="text-gray-400 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Coach Picture -->
                            <div class="flex justify-center mb-6">
                                <img :src="transaction.coach_picture" alt="Coach Profile" class="w-20 h-20 rounded-full border-4 border-indigo-500 shadow-md object-cover">
                            </div>

                            <!-- Transaction Details -->
                            <div class="space-y-4">
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Coach:</strong> 
                                    <span x-text="transaction.coach_name"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Game:</strong> 
                                    <span x-text="transaction.game_name"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Session:</strong> 
                                    <span x-text="transaction.session_name"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Session Date:</strong> 
                                    <span x-text="transaction.session_date"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Amount:</strong> 
                                    $<span x-text="transaction.amount"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Status:</strong> 
                                    <span x-text="transaction.status"></span>
                                </p>
                                <p class="text-gray-700 text-sm">
                                    <strong class="font-medium">Payment Status:</strong> 
                                    <span x-text="transaction.isPaid == 0 ? 'Unpaid' : 'Paid'"></span>
                                </p>
                            </div>

                            <!-- Modal Footer -->
                            <div class="mt-6 flex justify-end">
                                <button 
                                    @click="open = false" 
                                    class="px-4 py-2 bg-red-500 text-white font-medium rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400"
                                >
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>

    </script>
</x-dashboard>
