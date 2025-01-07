<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coachelo | Login</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>
<body class="dark:text-white dark:bg-slate-900" x-data="{darkMode : false}" :class ="{'dark' : darkMode}">
  <div class="container mx-auto dark:bg-slate-900">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 dark:bg-slate-800 rounded-md">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <a href="/" class="mx-auto h-10 items-center flex justify-center text-2xl font-bold leading-9 text-gray-900 dark:text-white">Coachelo</a>
              <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900 dark:text-white">Register Account</h2>
            </div>
          
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <form class="space-y-6" action="/register" method="POST">
                @csrf
                <div>
                  <label for="username" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Username</label>
                  <div class="mt-2">
                    <input id="username" name="username" type="text" required class="p-1  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-200">
                  </div>
                </div>
                <div>
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Name</label>
                  <div class="mt-2">
                    <input id="name" name="name" type="text" required class="p-1  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-200">
                  </div>
                </div>
                <div>
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">Email address</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required class="p-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-200">
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
                Have an account?
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500 dark:text-orange-400">Login</a>
              </p>
            </div>
          </div>
  </div>
</body>
</html>