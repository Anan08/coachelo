<!-- resources/views/become_coach.blade.php -->
<x-layout>
    <div class="bg-gray-100 font-sans leading-normal tracking-normal">
        <!-- Main Content -->
        <div class="flex justify-center items-center min-h-screen">
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Become a Coach</h2>
                <p class="text-center text-gray-600 mt-2">Fill out the form to apply and become a coach on Coachelo.</p>
                
                <!-- Form Start -->
                <form action="/store_cv" method="POST" enctype="multipart/form-data" class="mt-8">
                    @csrf
                    <div class="space-y-4">
                        <!-- Game Selection -->
                        <div class="flex flex-col">
                            <label for="game" class="text-gray-700">Specialized Game</label>
                            <select name="tags" id="game" class="w-full p-3 border border-gray-300 rounded-xl">
                                <option value="" disabled selected>Select a game you specialize in</option>
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->game_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- CV Upload -->
                        <div class="flex flex-col">
                            <label for="cv" class="text-gray-700">CV</label>
                            <input type="file" id="cv" name="cv" required accept=".pdf, .doc, .docx" 
                                class="block w-full border focus:border-blue-400 rounded-2xl p-2">
                            <small class="text-gray-500">Accepted formats: PDF, DOC, DOCX. Max size: 2MB</small>
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
</x-layout>
