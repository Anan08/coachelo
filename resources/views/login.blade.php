<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coachelo</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 dark:bg-slate-800 rounded-md">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <a href="/" class="mx-auto h-10 items-center flex justify-center text-2xl font-bold leading-9 text-gray-900 dark:text-white">Coachelo</a>
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">Sign in to your account</h2>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="/login" method="POST">
        @csrf
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" autocomplete="username" required class="p-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-200">
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Password</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-orange-400">Forgot password?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="p-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-200">
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-orange-400">Sign in</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500 dark:text-gray-100">
        Not a member?
        <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 dark:text-orange-400">Register</a>
      </p>
    </div>
  </div>

  @if (session('error'))
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
</body>