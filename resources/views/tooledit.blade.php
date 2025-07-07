<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload Gambar Laravel</title>
  @vite(['resources/css/app.css'])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
  </style>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body
  class="flex flex-col items-center gap-10 w-screen h-screen bg-gray-200 p-15 font-display">

  <h1 class="font-bold text-5xl uppercase">Edit Tool</h1>
  <a href="{{ url('/project') }}"
    class="w-fit h-fit px-3 py-1 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Back</a>

  <div class="flex flex-row max-lg:flex-col gap-5 w-full h-[80dvh]">

    <div class="w-full h-full flex flex-col items-center overflow-y-scroll">
      <h2 class="text-2xl font-semibold m-6 underline text-gray-800">Tools
        Terupload</h2>

      <img src="{{ asset('storage/' . $image) }}"
        class="w-[60%] aspect-video py-2">
      <p class="text-2xl font-bold border-b-2 mt-5 mb-10">{{ $name }}
      </p>
    </div>

    <form action="{{ url('/edit-tool') }}" method="POST"
      enctype="multipart/form-data"
      class="flex flex-col gap-10 max-lg:gap-3 w-[90dvw] max-lg:w-full h-[90%] max-lg:max-h-[40dvh] max-lg:mb-5 justify-around">
      @csrf
      <label for="image"
        class="w-full h-full flex justify-center items-center rounded-lg text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Logo</label>
      <input type="file" name="image" id="image" hidden>

      <input type="text" name="id" value="{{ $id }}" hidden>

      <input type="text" name="name" placeholder="project name"
        class="w-full h-full text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg">

      <button type="submit"
        class="w-full h-full rounded-lg font-semibold text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Upload</button>
    </form>

  </div>
</body>

</html>
