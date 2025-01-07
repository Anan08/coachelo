<x-dashboard>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>

        <form action="{{session()->get('role') != 'coach' ? '/user-update' : "/coach-update"}}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
            @csrf
            {{-- @method('PUT') --}}

            <!-- Profile Picture -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2" for="profile_picture">Profile Picture</label>
                <div class="flex items-center space-x-4">
                    <img src="{{ Storage::url($user->profile_pic)}}" 
                    alt="Profile Picture" 
                    class="w-24 h-24 rounded-full object-cover border">               
                    <input type="file" name="profile_pic" id="profile_pic" accept=".jpg, .png, .jpeg "
                           class="block text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:rounded-lg file:bg-blue-100 file:text-blue-700 file:cursor-pointer">
                </div>
            </div>

            <input type="hidden" name="id" id="id" value="{{$user->id}}"> 

            @if (session()->get('role') == 'coach')
                 <!-- Coaching Service Price -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="price">Coaching Price (per hour)</label>
                    <input type="number" name="price" id="price" value="{{$user->coachDetails->price ?? ''}}" 
                        class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Enter price">
                </div>

                <!-- Coaching Service Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="description">Coaching Description</label>
                    <textarea name="description" id="description" rows="5" 
                            class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Describe your service">{{$user->coachDetails->desc ?? ''}}</textarea>
                </div>

            @endif
           
            <!-- Submit Button -->
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                Save Changes
            </button>
        </form>
    </div>
</x-dashboard>
