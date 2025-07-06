<main class="h-screen w-screen snap-center snap-always">
  <div
    class="bg-gray-200 h-screen w-screen flex flex-row max-lg:flex-col items-center justify-center relative overflow-hidden">
    <div
      class="max-w-3xl max-lg:shadow-[8px_8px_20px_#bebebe,_-8px_-8px_20px_#fff] max-xl:max-w-xl max-lg:max-w-sm px-10 py-15 rounded-2xl">
      <h1 class="text-5xl max-lg:text-3xl font-semibold uppercase font-kanit">Hi, i'm
        <span class="font-extrabold text-amber-900 u">Hafizh</span>
      </h1>
      <h2 class="text-3xl max-lg:text-xl font-light">Fullstack developer</h2>

      <p class="mt-6 mb-6 text-lg max-lg:text-sm text-justify">Web developer
        with a strong interest in technology and experience using Python, C,
        Java, and JavaScript. Current focus on Laravel to build efficient and
        impactful web solutions. Believes that programs are valuable by their
        function to the environment and society.</p>

      <div class="flex flex-row items-center gap-10">
        {{ $slot }}
      </div>
    </div>
    <div class="[invisible] w-xl max-lg:hidden"></div>
    <img src="{{ asset('images/profile.png') }}"
      class="w-4xl h-250 object-top object-cover max-lg:hidden absolute right-[-15rem] bottom-0">
  </div>
</main>
