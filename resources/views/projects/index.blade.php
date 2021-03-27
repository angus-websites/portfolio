<x-guest-layout>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">

        @for ($i = 0; $i <= 10; $i++)
          <div class="p-4 md:w-1/3">
            @component('components.cards.project-card')
            @endcomponent
          </div>
        @endfor
      </div>
    </div>
  </section>
</x-guest-layout>
