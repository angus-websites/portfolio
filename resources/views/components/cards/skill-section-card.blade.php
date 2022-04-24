<div class="border rounded-lg p-5 flex flex-col">
    <!--Section name-->
    <div class="flex-0">
        <p class="uppercase text-lg font-bold mb-2 text-center">{{$name}}</p>
        <hr>
    </div>
    <!-- Content for skills-->
    <div class="flex-1">
        <!--Grid -->
        <div class="flex flex-wrap my-5 gap-x-5 gap-y-8 justify-around" >
          @forelse($skills as $skill)
            <div>
              <div class="flex flex-row items-center gap-x-3">
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
                <div class="flex-1 font-medium text-left">
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
    </div>
  </div>
