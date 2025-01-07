<x-layout>
  <div class="mx-14">
    <div class="my-20">
        
    <div class="flex-col">
        <div class="flex justify-between">
          <p class="text-3xl font-bold">Best Coaches for you!</p>
        </div>
        
        <div class="flex flex-row flex-wrap space-x-3 items-center justify-center">
          @foreach ($coaches as $coach)   
          <a href="/coaches/{{$coach->id}}" class="hover:bg-contain flex flex-col rounded-lg overflow-hidden h-72 w-64 my-4 hover:shadow-xl">
            <div class="overflow-hidden hover:scale-125 z-0">
              <img src="{{Storage::url($coach->user->profile_pic)}}" alt="" class="object-cover h-56 scale-[130%]">
            </div>
            <div class="flex flex-col p-3 z-10 bg-white">
              <div class="flex items-start space-x-16">
                <p class="text-xl font-bold">{{$coach->user->name}}</p>
                {{-- <p class="text-lg font-medium text-indigo-500 ">{{$coach->game}}</p> --}}
              </div>
              <p class="text-gray-500">{{$coach->price}}<span> /</span> session</p>  
            </div>
          </a>
          @endforeach

        </div>
    </div>
    

    
</div>
</x-layout>
