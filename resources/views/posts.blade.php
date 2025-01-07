<x-layout>
    <div class="flex items-center justify-center mt-10">
    </div>
   
    <x-browse>

    </x-browse>
    <div class="grid grid-cols-1 mx-auto container space-x-2">
        @foreach ($playbooks as $playbook)
        <a href="/post/{{$playbook['slug']}}" class="h-[150px] w-[1000px] bg-contain rounded-xl my-10 bg-blur z-0 border shadow-md flex justify-between overflow-hidden">
            {{-- <div class="w-64 h-72 backdrop-blur-sm z-10 absolute">
            </div> --}}
            <div class="">
                <div class="">
                    <h1 class="px-5 py-3 font-bold text-xl">{{$playbook['title']}}</h1>
                    <h1 class="px-5 font-light text-sm text-gray-600">{{Str::limit($playbook['description'], 100)}}</h1>
                </div>
    
                <div class="flex my-8">
                    <h1 class="px-5 font-light text-sm text-blue-400">{{$playbook['created_at']}}</h1>
                    <img src="{{$playbook['img']}}" class="rounded-full size-6 ml-4" alt="">
                    <h1 class="px-3 font-light text-sm text-gray-600">{{$playbook['author']}}</h1>
                </div>
            </div>
            <img src="{{$playbook['img_blog']}}" alt="" class="rounded-e-lg size-[200px]">
            {{-- <img src="{{$playbook['img_blog']}}" alt="" class="items-center size-28"> --}}
        </a>
            
        @endforeach
    </div>
    
</x-layout>