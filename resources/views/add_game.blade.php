<x-dashboard>
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
        <!-- Main Content -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Add Another Game</h2>
                <p class="text-center text-gray-600 mt-2">Fill out the form to Add another game on Coachelo.</p>
                
                <!-- Form Start -->
                <form action="/add-game" method="POST" enctype="multipart/form-data" class="mt-8">
                    @csrf
                    <div class="space-y-4">
                        <label for="game_name" class="text-gray-700">Game Name</label>
                        <input type="text" id="game_name" name="game_name" required 
                        class="block w-full border focus:border-blue-400 rounded-2xl p-2">
                        <!-- CV Upload -->
                        <div class="flex flex-col">
                            <label for="game_img" class="text-gray-700">CV</label>
                            <input type="file" id="game_img" name="game_img" required accept=".jpg, .png, .jpeg" 
                                class="block w-full border focus:border-blue-400 rounded-2xl p-2">
                            <small class="text-gray-500">Accepted formats: jpg, jpeg, png</small>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-5 flex justify-between space-x-1">
                        <button type="submit" class="p-3 bg-black text-white rounded-3xl hover:bg-indigo-400 w-full">
                            Submit
                        </button>
                    </div>
                </form>
                <!-- Form End -->
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

    @elseif (session('error'))
            <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            @keydown.escape.window="show = false"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        >
            <div class="bg-white rounded-lg shadow-lg w-96 p-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Error</h3>
                    <button @click="show = false" class="text-gray-500 hover:text-gray-700">
                        &times;
                    </button>
                </div>
                <div class="mt-4">
                    <p>{{ session('error') }}</p>
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
      
</x-dashboard>
