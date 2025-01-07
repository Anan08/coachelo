<x-layout>
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="bg-white shadow-lg w-64 p-6 space-y-4">
                <div class="flex items-center space-x-3">
                    <span class="text-indigo-600 font-bold text-2xl"></span>
                    <span class="font-semibold text-lg">Coachelo</span>
                </div>
                <nav>

                    @if (session()->get('role') == 'admin')
                        <a href="/users" class="{{request()->is('users') ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center  p-2 rounded-lg space-x-3">
                            <span class="material-icons"><img src="https://www.svgrepo.com/show/497576/task-square.svg" alt="" class="size-6"></span>
                            <span>Users</span>
                        </a>                       
                    @else
                        <a href="/trolley" class="{{request()->is('trolley') ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center p-2 rounded-lg space-x-3">
                            <span class="material-icons"><img src="https://www.svgrepo.com/show/497576/task-square.svg" alt="" class="size-6"></span>
                            <span>Trolley</span>
                        </a>
                    @endif
                   
                    @if (session()->get('role') == 'coach')
                        <a href="/orders" class="{{request()->is('orders') ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center p-2 rounded-lg space-x-3">
                            <span class="material-icons"><img src="https://www.svgrepo.com/show/497576/task-square.svg" alt="" class="size-6"></span>
                            <span>Orders</span>
                        </a>                       
                    @endif

                    @if (session()->get('role') == 'admin')
                        <a href="/applicances" class="{{request()->is('applicances') ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center p-2 rounded-lg space-x-3">
                            <span class="material-icons"><img src="https://www.svgrepo.com/show/497576/task-square.svg" alt="" class="size-6"></span>
                            <span>Applicances</span>
                        </a>                       
                    @endif
                    

                    <a href="/profile/{{session()->get('id')}}" class="{{request()->is('profile/'.session()->get('id')) ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center p-2 rounded-lg space-x-3">
                        <span class="material-icons"><img src="https://www.svgrepo.com/show/216095/user-profile.svg" alt="" class="size-6"></span>
                        <span>Profile</span>
                    </a>

                    <a href="/payment" class="{{request()->is('payment') ?  'bg-indigo-600 text-white': 'text-gray-600 hover:text-indigo-600' }} flex items-center p-2 rounded-lg space-x-3">
                        <span class="material-icons"><img src="https://www.svgrepo.com/show/33476/dollar.svg" alt="" class="size-6"></span>
                        <span>Payment</span>
                    </a>


                </nav>
                <div class="">

                    @if (session()->get('role') != 'coach' && session()->get('role') != 'admin')
                    {{-- for testing --}}
                        <a href="/become-coach" class="hover:cursor-pointer flex items-center justify-center text-white bg-black p-3  mt-[280px] hover:bg-indigo-400 rounded-full space-x-3 text-md">
                            {{-- <span class="material-icons"><img src="https://www.svgrepo.com/show/497576/task-square.svg" alt="" class="size-6"></span> --}}
                            <span>Become a Coach</span>
                        </a>                       
                    @endif
                    
                </div>
                
            </div>
                        <!-- Main Content -->
            <div class="flex-1 bg-gray-50 p-10">
                {{$slot}}
            </div>
            
        </div>
    </div>
</x-layout>
