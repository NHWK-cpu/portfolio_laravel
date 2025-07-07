<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portfolio</title>
  @vite(['resources/css/app.css'])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=manage_accounts" />
  <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
  <section
    class="min-w-full h-screen overflow-y-scroll scroll-smooth snap-mandatory snap-y font-display">
    
    {{-- ABOUT --}}
    <x-about class="snap-center snap-always" id="about">
      <a href="{{ url('/#tools') }}"
          class="px-5 py-1 outline-2 outline-amber-800 text-amber-800 hover:shadow-[3px_3px_5px_#a8a8a8,_-3px_-3px_5px_#fff] active:shadow-[inset_1px_1px_3px_#a8a8a8,_inset_-2px_-2px_3px_#fff] transition-all max-lg:transition-none">TOOLS</a>
        <a href="{{ url('/#project') }}"
          class="px-5 py-1 outline-2 outline-amber-800 bg-amber-800 text-gray-100 hover:shadow-[5px_5px_5px_#a8a8a8,_-3px_-3px_5px_#fff] active:shadow transition-all max-lg:transition-none">PROJECT</a>
    </x-about>
    
    {{-- TOOLS --}}
    <x-tools class="snap-center snap-always"></x-tools>

    {{-- PROJECT --}}
    <x-project class="snap-center snap-always"></x-project>
    
    {{-- FOOTER --}}
    <x-footer class="snap-start snap-always"></x-footer>
  </section>

  @if (session('verif') != null)
    <x-bubble-admin></x-bubble-admin>
  @endif

  </body>

</html>
