<x-app-layout>
  <div class="h-[100vh] px-16 flex justify-between items-center bg-gray-gradient">
    <div class="w-1/2 flex flex-col justify-between gap-6">
      <h1 class="flex flex-col text-7xl font-bold">
        <span class="text-white">Projeto</span>
        <span class="text-gradient">Sexto</span>
        <span class="text-white">Sentido.</span>
      </h1>

      <p class="text-white">
        O Projeto <span class="text-gradient">Sexto Sentido</span> é um projeto de inclusão social no desporto, que permite que pessoas cegas ou com baixa visão possam realizar corrida e caminhada guiada. O grupo sediado no Porto, gostaria de chegar a todo o território nacional.
      </p>
    </div>

    <div class="">
      <img class="h-48 object-cover" src="./assets/navbar/logo.png" alt="Logo">
    </div>
  </div>

  <div class="px-16 py-12 flex flex-col flex-1 justify-center items-center">
    <h1 class="text-3xl font-bold uppercase pb-10">Quem Somos ?</h1>

    <div class="flex tele:flex-col justify-between items-center gap-4">
      <video controls class="w-[60vw]">
      {{-- <video controls autoplay class="w-[60vw]"> --}}
        <source src="/video.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>

      <div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque neque quis blanditiis accusamus dolore, aperiam minima inventore? Non qui provident rerum magni ipsum id adipisci corporis, aspernatur dolore ad! Eos?</p>
      </div>
  </div>

  <div class="w-full h-full px-16 py-12 flex justify-around items-center">
    <div class="h-full">
      <h1>H1</h1>
      <h2>H2</h2>
      <button>BOTÃO</button>
    </div>
    
    <div class="h-full grid grid-cols-2 gap-7">
      <div class="bg-white shadow-lg p-20 rounded-2xl">
        <h1 class="text-5xl font-bold">300+</h1>
        <h2 class="text-2xl font-semibold">Membros</h2>
      </div>

      <div class="bg-white shadow-lg p-20 rounded-2xl">
        <h1 class="text-5xl font-bold">300+</h1>
        <h2 class="text-2xl font-semibold">Membros</h2>
      </div>

      <div class="bg-white shadow-lg p-20 rounded-2xl">
        <h1 class="text-5xl font-bold">300+</h1>
        <h2 class="text-2xl font-semibold">Membros</h2>
      </div>

      <div class="bg-white shadow-lg p-20 rounded-2xl">
        <h1 class="text-5xl font-bold">300+</h1>
        <h2 class="text-2xl font-semibold">Membros</h2>
      </div>
    </div>
  </div>
</x-app-layout>