<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portfolio</title>
  @vite(['resources/css/app.css'])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <section
    class="min-w-full h-screen overflow-y-scroll scroll-smooth snap-mandatory snap-y">
    <x-about class="snap-center snap-always"></x-about>
    <x-tools class="snap-center snap-always">
      @foreach (App\Models\Tool::all() as $item)
        <div class="outline-2 outline-gray-100 rounded-lg px-5 py-2 text-2xl flex gap-3 items-center">
          <img src="{{ asset('storage/'. $item['image']) }}" class="w-10 filter">
          <p class="capitalize">{{ Str::limit($item['name'], 29) }}</p>
        </div>
      @endforeach
    </x-tools>
    <x-project class="snap-center snap-always"></x-project>
    <x-footer class="snap-start snap-always"></x-footer>
  </section>
</body>

</html>
