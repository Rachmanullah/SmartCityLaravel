<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="icon" href="http://127.0.0.1:8000/assets/storange/image/Kontraktor.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <title>Login SPJR</title>
</head>

<body>
    <div class="h-screen flex items-center justify-center">
        <div class="p-8 rounded-lg shadow-lg max-w-sm w-100 bg-gray-700">
            <h1 class="text-center text-2xl font-TitilliumWeb-Regular mb-5 text-white">Login SPJR</h1>
            <form method="post" action="{{ route('admin.login') }}">
                @csrf
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-white">Your
                    Email</label>
                <div class="relative mb-6">
                    <input type="email" id="input-group-1"
                        class=" @error('email') is-invalid @enderror rounded-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full  text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your Email" autocomplete="off" name="email" autofocus>
                    @error('email')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <div>
                            <span class="font-TitilliumWeb-Bold">{{ $message }}!</span>
                        </div>
                    </div>
                    @enderror
                </div>
                <label for="input-group-1" class="block mb-2 text-sm font-medium text-white">Password</label>
                <div class="relative mb-6">
                    <input type="password" id="input-group-1"
                        class="@error('password') is-invalid @enderror rounded-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full  text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="*******" name="password" autocomplete="off">
                    @error('password')
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <div>
                            <span class="font-TitilliumWeb-Bold">{{ $message }}!</span>
                        </div>
                    </div>
                    @enderror
                </div>
                <button
                    class="bg-blue-600 transition ease-in-out delay-15 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white font-TitilliumWeb-Bold py-2 px-4 rounded w-full">
                    Sign In
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>
