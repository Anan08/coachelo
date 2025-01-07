<div class="">
  <nav class="flex justify-between p-6 font-sans">
    <a href="/"><strong class="text-2xl">Coachelo</strong></a>

    <ul class="flex space-x-5 justify-center items-center" x-data="{open:false}">
      <ul class="flex justify-between items-center space-x-5 font-sans font-semibold text-blue-700">
        <li><a href="/">Home</a></li>
        {{-- <li><a href="/posts">Posts</a></li>
        <li><a href="/chats">Chat</a></li> --}}
        <li><a href="/dashboard">Dashboard</a></li>
      </ul>
      <button x-on:click="open = !open"><img src="{{ Storage::url(session()->get('profile_pic'))}}" alt="" class=" bg-gray-200 rounded-3xl size-10 hover:cursor-pointer object-cover"></button>
      <div class="absolute top-20 right-20 text-gray-600 text-sm" x-show="open" x-on:click.away = "open = false" x-transition>
        <li class="border-b my-2"><a href=""></a></li>
        <li class="border-b my-2"><a href="/profile">Profile</a></li>
        <li class="border-b my-2"><a href="/logout">Sign out</a></li>
      </div>
    </ul>
  </nav>

</div>