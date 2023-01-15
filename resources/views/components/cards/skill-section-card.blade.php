<div {{$attributes->merge(['class' => ""])}}>
    <!--Section name-->
    <div class="flex-0">
        <p class="my-8 text-xl font-bold tracking-tight sm:text-2xl">{{$name}}</p>
    </div>
    <!-- Content for skills-->

    <div class="grid grid-cols-2 gap-5 sm:gap-12 sm:grid-cols-3 lg:grid-cols-4 text-center">

      @forelse($skills as $skill)
        <!-- Each skill -->
        <div class="pt-6">
          <div class="flow-root rounded-lg sm:bg-gray-50 sm:border px-6 pb-8">
            <div class="-mt-6">
              <div class="">
                <div class="inline-flex items-center justify-center rounded-xl bg-white p-2 shadow-lg border">
                  @if($skill->hasIcon())
                  <div class="w-10 h-10 ">
                      <img src={{$skill->getIcon()}}>
                  </div>
                  @else
                    <span class="inline-flex h-10 w-10 items-center justify-center">
                      <span class="text-sm font-medium leading-none">{{ strtoupper(substr($skill->name, 0, 1)) }}</span>
                    </span>
                  @endif
                </div>
              </div>
              <p class="mt-8 text-lg font-semibold leading-8 tracking-tight">{{$skill->name}}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    {{-- <div class="flex-1">
        <!--Grid -->
        <div class="flex flex-wrap gap-x-5 gap-y-8 justify-around my-5" >
          @forelse($skills as $skill)
            <div class="basis-full sm:basis-1/3">
              <div class="flex flex-row justify-center items-center space-x-3">
                @if($skill->icon)
                  <div class="avatar">
                    <div class="w-8 rounded-full">
                      <img src={{$skill->getIcon()}}>
                    </div>
                  </div>
                @else
                  <div class="avatar placeholder">
                    <div class="bg-secondarylight-100 text-secondarylight-300 rounded-full w-8">
                      <span class="text-xs">{{ucfirst($skill->name[0])}}</span>
                    </div>
                  </div>
                @endif
                <div class="flex-1 sm:flex-none font-medium text-left">
                  {{$skill->name}}
                </div>
              </div>
            </div>
          @empty
            <div class="col-span-2 text-center">
              <td class="font-medium">
                  <div class="badge badge-outline">No skills found</div>
              </td>
            </div>
          @endforelse
        </div>
    </div> --}}
  </div>
