<div
  class="h-screen w-screen snap-start relative flex flex-col items-center justify-center bg-gray-200" id="project">
  <h1 class="text-5xl max-lg:text-4xl font-bold mb-10 transition-all delay-300 duration-1000 box-down opacity-0 -translate-y-8">My Project</h1>

  {{-- CONTAINER --}}
  <div
    class="h-[80dvh] w-[60dvw] max-lg:w-screen shadow-[inset_8px_8px_20px_#bebebe,_inset_-8px_-8px_20px_#fff] max-lg:shadow-none rounded-xl p-10 flex flex-wrap gap-x-4 gap-y-10 overflow-y-scroll justify-center">

    {{-- ITEM --}}
    @foreach (App\Models\Project::all() as $project)
      <div
        class="flex flex-col justify-center items-center shadow-[8px_8px_20px_#bebebe,_-8px_-8px_20px_#fff] bg-gray-100 w-md h-fit rounded-lg overflow-hidden transition-all delay-300 duration-500 box-up opacity-0 translate-y-8">
        <img src="{{ asset('storage/' . $project['image']) }}" alt=""
          class="aspect-video w-md rounded-b-2xl">
        <div class="p-4 w-full">
        <h3 class="w-full py-1 text-lg uppercase font-bold">{{ $project['name'] }}
        </h3>
        <p class="w-full pb-2 text-sm">{{ $project['desc'] }}</p>
        <div class="flex flex-row gap-2 mt-2 w-full rounded-lg overflow-hidden">
          @if ($project['github'] != null)
            <a href="{{ $project['github'] }}" target="_blank"
              class="bg-amber-800 text-gray-100 py-2 px-5 w-full text-center">GITHUB</a>
          @endif

          @if ($project['release'] != null)
            <a href="{{ $project['release'] }}" target="_blank"
              class="bg-amber-800 text-gray-100 py-2 px-5 w-full text-center">RELEASE</a>
          @endif
        </div>
        </div>
      </div>
    @endforeach

  </div>
</div>
