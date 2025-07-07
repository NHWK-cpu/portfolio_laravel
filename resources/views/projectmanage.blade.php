<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project Management</title>
  @vite(['resources/css/app.css'])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
  </style>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body
  class="flex flex-col items-center gap-10 w-screen h-screen bg-gray-200 p-15 font-display">

  <h1 class="font-bold text-5xl max-lg:text-4xl uppercase">Edit Project</h1>


  <div
    class="flex flex-row max-lg:flex-col gap-10 w-fit items-center justify-center">
    <a href="{{ url('/') }}"
      class="w-fit h-fit px-3 py-1 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Back</a>
    @error('image')
      <p class="bg-red-300 p-2 rounded-lg">Gambar terlalu besar! masukkan yang
        ukurannya dibawah 2MB</p>
    @enderror
    @if (session('success'))
      <p class="bg-green-300 p-2 rounded-lg">{{ session('success') }}</p>
    @endif
  </div>

  <form action="{{ url('/project') }}" method="POST"
    enctype="multipart/form-data"
    class="flex flex-row max-lg:flex-col gap-3 w-[90dvw] h-10 max-lg:h-fit justify-around">
    @csrf
    <label for="image"
      class="w-full h-full flex py-2 justify-center items-center rounded-lg text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Screenshoot</label>
    <input type="file" name="image" id="image" hidden required>

    <input type="text" name="name" placeholder="project name"
      class="w-full h-full py-2 text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg"
      required>

    <input type="text" name="desc" placeholder="description"
      class="w-full h-full py-2 text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg"
      required>

    <input type="text" name="github" placeholder="github url"
      class="w-full h-full py-2 text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg">

    <input type="text" name="release" placeholder="release url"
      class="w-full h-full py-2 text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg">

    <button type="submit"
      class="w-full rounded-lg py-2 font-semibold text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Upload</button>
  </form>


  <div
    class="w-full border-t-2 border-gray-300 min-h-[60dvh] max-h-[60dvh] overflow-y-scroll">
    <h2 class="text-2xl font-semibold m-6 text-gray-800">Project Terupload</h2>
    <div class="w-full flex flex-wrap justify-center gap-10">
      @foreach (App\Models\Project::all() as $item)
        <div
          class="flex flex-col w-50 text-center shadow-[8px_8px_10px_#bebebe,_-8px_-8px_10px_#fff] border-4 border-gray-100 bg-gray-100 rounded-2xl overflow-hidden p-2 max-lg:p-0">
          <img src="{{ asset('storage/' . $item->image) }}"
            class="m-auto max-h-50">
          <p class="mt-2 font-bold">{{ $item->name }}</p>
          <p class="mt-1 text-sm">{{ $item->desc }}</p>
          <div class="flex flex-row gap-1 rounded-lg overflow-hidden mt-2">
            <a href="{{ url('/edit-project/' . $item->id) }}"
              class="fa fa-pencil text-white w-full bg-blue-600 py-2"></a>
            <a href="{{ url('/del-project/' . $item->id) }}"
              class="fa fa-trash text-white w-full bg-red-600 py-2"></a>
          </div>
        </div>
      @endforeach
    </div>
    {{-- <table class="w-full bg-gray-100">
      <tr class="border">
        <th>
          <p>Screenshoot</p>
        </th>
        <th class="border-s border-e">
          <p class="text-center">Name</p>
        </th>
        <th class="border-e">
          <p class="text-center">Description</p>
        </th>
        <th>
          <p class="text-center">Action</p>
        </th>
      </tr>
      @foreach (App\Models\Project::all() as $item)
        <tr class="border">
          <th><img src="{{ asset('storage/' . $item->image) }}" width="100"
              class="m-auto py-2">
          </th>
          <th class="border-s border-e px-3">
            <p class="text-center">{{ $item->name }}</p>
          </th>
          <th class="px-3 border-e">
            <p class="text-start">{{ $item->desc }}</p>
          </th>
          <th class="px-3 text-xl space-x-3"><a
              href="{{ url('/edit-project/' . $item->id) }}"
              class="fa fa-pencil text-blue-600"></a><a
              href="{{ url('/del-project/' . $item->id) }}"
              class="fa fa-trash text-red-600"></a></th>
        </tr>
      @endforeach
    </table> --}}
  </div>
</body>

</html>
