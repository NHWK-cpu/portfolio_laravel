<section
  class="h-screen w-screen snap-center snap-always relative flex items-center justify-center bg-amber-800" id='tools'>
  <div class="w-[80dvw] h-[60dvh] text-gray-100">
    <h1 class="text-5xl max-lg:text-3xl font-bold mb-20">Tools i've use</h1>
    <div class="flex flex-wrap gap-4 p-1 max-h-[40dvh] overflow-y-scroll">
      {{-- grid grid-cols-3 max-lg:grid-cols-2 --}}
      @foreach (App\Models\Tool::all() as $item)
        <div
          class="outline-2 outline-gray-100 rounded-lg px-5 py-2 text-2xl flex gap-3 min-w-fit items-center">
          <img src="{{ asset('storage/' . $item['image']) }}" class="w-10">
          <p class="capitalize max-lg:text-sm">{{ Str::limit($item['name'], 29) }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
