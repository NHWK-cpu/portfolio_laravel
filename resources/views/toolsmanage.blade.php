<!DOCTYPE html>
<html>

<head>
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

  <h1 class="font-bold text-5xl uppercase">Edit Tools</h1>

  
  <div class="flex flex-row gap-10 w-fit items-center justify-center">
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

  <form action="{{ url('/tools') }}" method="POST" enctype="multipart/form-data"
    class="flex flex-row gap-3 w-[90dvw] h-10 justify-around">
    @csrf
    <label for="image"
      class="w-full h-full flex justify-center items-center rounded-lg text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Logo</label>
    <input type="file" name="image" id="image" hidden required>

    <input type="text" name="name" placeholder="tool name"
      class="w-full h-full text-center focus:outline-2 focus:outline-amber-800 shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-lg"
      required>

    <button type="submit"
      class="w-full rounded-lg font-semibold text-gray-700 shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] hover:cursor-pointer hover:shadow-[1px_1px_3px_#a8a8a8,_-2px_-2px_3px_#fff] active:shadow-[inset_3px_3px_5px_#a8a8a8,_inset_-3px_-3px_5px_#fff]">Upload</button>
  </form>


  <div
    class="w-full h-full border-t-2 border-gray-300 max-h-[60dvh] overflow-y-scroll">
    <h2 class="text-2xl font-semibold m-6 text-gray-800">Tools Terupload</h2>
    <table class="w-full bg-gray-100">
      <tr class="border">
        <th>
          <p>Logo</p>
        </th>
        <th class="border-s border-e">
          <p class="text-center">Name</p>
        </th>
        <th>
          <p class="text-center">Action</p>
        </th>
      </tr>
      @foreach (App\Models\Tool::all() as $item)
        <tr class="border">
          <th><img src="{{ asset('storage/' . $item->image) }}" width="100"
              class="m-auto py-2">
          </th>
          <th class="border-s border-e px-3">
            <p class="text-center">{{ $item->name }}</p>
          </th>
          <th class="px-3 text-xl space-x-3"><a
              href="{{ url('/edit-tool/' . $item->id) }}"
              class="fa fa-pencil text-blue-600"></a><a
              href="{{ url('/del-tool/' . $item->id) }}"
              class="fa fa-trash text-red-600"></a></th>
        </tr>
      @endforeach
    </table>
  </div>
</body>

</html>
