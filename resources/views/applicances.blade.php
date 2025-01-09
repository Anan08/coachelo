<x-dashboard>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Applicances</h1>

        <!-- Orders List -->
        <div class="grid grid-cols-1 gap-4">
            @foreach ($applicances as $applicance)
            <!-- Order Item -->
            <div class="bg-white shadow rounded-lg p-4 flex items-center justify-between" id="{{$applicance->id}}">
                <div class="flex items-center">
                    <!-- Coach Profile Picture -->
                    <div class="w-12 h-12 rounded-full overflow-hidden border border-gray-200">
                        <img src="{{Storage::url($applicance->user->profile_pic)}}" alt="Coach Profile" class="w-full h-full object-cover">
                    </div>
                    <!-- Coach Info -->
                    <div class="ml-4">
                        <h2 class="text-lg font-bold">{{$applicance->user->name}}</h2>
                        <a class="text-blue-500 hover:text-blue-700" href="{{Storage::url($applicance->cv)}}" target="_blank">View CV</a>
                    </div>
                </div>

                <!-- Order Status with Alpine.js -->
                <div x-data="{ status: `{{$applicance->status}}`, open: false }" class="relative">
                    <!-- Current Status -->
                    <button 
                        @click="open = !open" 
                        class="bg-yellow-100 text-yellow-700 text-sm font-medium px-3 py-1 rounded-full flex items-center space-x-2">
                        <span x-text="status"></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div 
                        x-show="open" 
                        @click.outside="open = false"
                        class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-lg shadow-lg">
                        <ul>
                            <li>
                                <button 
                                    x-on:click="update_status({{ $applicance->id }}, 'verified'); open = false;" 
                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-green-100">
                                    Verified
                                </button>
                            </li>
                            <li>
                                <button 
                                    x-on:click="update_status({{ $applicance->id }}, 'unverified'); open = false;" 
                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-red-100">
                                    Unverified
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    
            @endforeach
        </div>
    </div>

    <script>
        function update_status(applicanceId, newStatus) {
            fetch(`/api/coaches/${applicanceId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body : JSON.stringify({status : newStatus})
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to update status')
                }
                return response.json();
            })
            .then(data => {
                document.querySelector(`[id ="${applicanceId}"] span`).textContent = data.status;
                alert(data.message);
            })
            .catch(error => {
                console.error('Error : ', error);
                alert('Failed to Update Status');
            })
        }
    </script>
</x-dashboard>
