<x-layout>
  <div class="mx-14">
    <div class="my-20">
        <p class="text-3xl font-bold">Browse Games</p>
        <div class="my-10 flex items-center" id="input">
            <input type="text" id="search" placeholder="Search for Coaches" class="w-[600px] p-3 border border-l rounded-xl"/>
            <div id="selection" class="flex items-center mx-6">
                <select name="Tags" id="" class="w-[400px] p-3 border border-1 rounded-xl">
                    <option value="">Select Tag</option>
                    <option value="">Valorant</option>
                    <option value="">League of Legends</option>
                    <option value="">Mobile Legend</option>
                    <option value="">Rocket League</option>
                    <option value="">Counter Strike 2</option>
                    <option value="">DOTA 2</option>
                    <option value="">Other</option>
                </select>
            </div>
            <button class="mx-4 p-3"><img src="https://www.svgrepo.com/show/7109/search.svg" alt="" class="size-6"></button>
        </div>
        <div class="flex flex-row flex-wrap space-x-3 items-center justify-center">
          @foreach ($games as $game)
            <a class="hover:bg-contain flex flex-col rounded-lg overflow-hidden h-72 w-64 my-4 hover:shadow-xl"  href="/games/{{$game->id}}">
              <div class="overflow-hidden hover:scale-125 z-0">
                <img src="{{Storage::url($game->game_image)}}" alt="" class="object-cover h-56 scale-[130%]">
              </div>
              <div class="flex flex-col p-3">
                <div class="flex items-start space-x-16">
                  {{-- <p class="text-xl font-bold">Curry</p> --}}
                  <p class="text-lg font-medium text-white-500 ">{{$game->game_name}}</p>
                </div>
                {{-- <p class="text-gray-500">Rp.200,000.00 <span>/</span> session</p>   --}}
              </div>
            </a>
          @endforeach

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
