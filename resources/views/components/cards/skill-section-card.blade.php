<div {{$attributes->merge(['class' => ""])}}>
    <!--Section name-->
    <div class="flex-0">
        <!-- Divider -->
        <div class="my-8 hidden sm:block">
          <p class="mb-4 text-lg font-bold tracking-tight sm:text-xl">{{$name}}</p>
          <hr class="py-4">
        </div>

        <!-- Mobile divider -->
        <div class="relative my-8 sm:hidden">
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center">
            <span class="bg-white px-3 text-lg font-bold tracking-tight">{{$name}}</span>
          </div>
        </div>

    </div>
    <!-- Content for skills-->

    <div class="grid grid-cols-2 gap-5 sm:gap-12 sm:grid-cols-3 lg:grid-cols-4 text-center">

      @forelse($skills as $skill)
        <!-- Each skill -->
        <div class="pt-5">
          <div class="flow-root rounded-lg px-6 pb-8">
            <div class="-mt-6">
              <div class="">
                <div class="inline-flex items-center justify-center rounded-xl bg-white p-2 shadow-lg border">
                  @if($skill->hasIcon())
                  <div class="w-8 h-8">
                      <img src={{$skill->getIcon()}}>
                  </div>
                  @else
                    <span class="inline-flex h-9 w-9 items-center justify-center">
                      <span class="text-sm font-medium leading-none">{{ strtoupper(substr($skill->name, 0, 1)) }}</span>
                    </span>
                  @endif
                </div>
              </div>
              <p class="mt-8 sm:text-lg text-md sm:font-semibold leading-8 tracking-tight">{{$skill->name}}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
