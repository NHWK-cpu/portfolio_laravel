<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Admin</title>
  @vite(['resources/css/app.css'])
</head>

<body class="h-screen w-screen flex items-center justify-center bg-gray-200">
  <div
    class="w-[30dvw] max-xl:w-fit h-fit bg-gray-200 shadow-[8px_8px_20px_#bebebe,_-8px_-8px_20px_#fff] flex flex-col items-center justify-center rounded-2xl px-10 py-20">
    <h1 class="text-3xl font-bold uppercase text-gray-800">Welcome Hafizh</h1>
    <h2 class="text-xl font-normal italic uppercase text-gray-600 mb-10">Please
      verify yourself</h2>

    <form action="{{ url('/login') }}" method="POST"
      class="flex flex-col w-full h-full items-center">
      @csrf
      <input type="password" name="password" id="pass"
        placeholder="Password"
        class="p-2 w-[55%] rounded-sm focus:outline-0 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] text-center text-gray-500"
        required>
      
      @if (session('error'))
        <p class="text-red-400 mt-2">{{ session('error') }}</p>
      @endif

      <button type="submit"
        class="mt-10 px-8 py-2 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff] text-gray-700 rounded-2xl font-semibold transition-all">CONFIRM</button>
    </form>
  </div>
</body>

</html>
