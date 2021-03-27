<x-guest-layout>
  <section class="text-gray-600 body-font">

    <div class="container px-5 pt-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-10">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">My Projects</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
      </div>
    </div>
    <!--Projects-->
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">

        @for ($i = 0; $i <= 10; $i++)
          <div class="p-4 md:w-1/3">
            @component('components.cards.project-card')
              @slot('title')
                  Title here
              @endslot
              @slot('description')
                  A short description goes here
              @endslot
              @slot('category')
                Category
              @endslot
              @slot('link')
                /link
              @endslot
              @slot('imagePath')
                /path/to/image
              @endslot
              @slot('imageAlt')
                Placeholder
              @endslot
            @endcomponent
          </div>
        @endfor
      </div>
    </div>
  </section>
</x-guest-layout>
