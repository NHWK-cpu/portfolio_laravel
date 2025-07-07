<section
  class="h-screen w-screen snap-start relative flex items-center justify-center bg-amber-800" id='tools'>
  <div class="w-[80dvw] h-[60dvh] text-gray-100">
    <h1 class="text-5xl max-lg:text-3xl font-bold mb-20 transition-all delay-300 duration-1000 box-right opacity-0 translate-y-8">Tools i've use</h1>
    <div class="flex flex-wrap gap-4 p-1 max-h-[40dvh] overflow-y-scroll transition-all delay-300 duration-500 box-up opacity-0 translate-y-8">
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
