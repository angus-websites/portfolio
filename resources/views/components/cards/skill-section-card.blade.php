<div class="border rounded-lg p-5 flex flex-col">
    <!--Section name-->
    <div class="flex-0">
        <p class="uppercase text-lg font-bold mb-2 text-center">{{$name}}</p>
        <hr>
    </div>
    <!-- Content for skills-->
    <div class="flex-1">
        {{-- <table class="my-5 w-full">
          <tbody>
            @if(sizeof($skills) < 1)
            <tr class="text-center">
                <td class="font-medium">
                    <div class="badge badge-outline">No skills found</div>
                </td>
            </tr>
            @endif
            @foreach($skills as $skill)
              <tr>
                <td class="py-4">
                  <div class="flex items-center space-x-3">
                    <div class="avatar">
                      <div class="w-10">
                        <img src={{$skill->getIcon()}}>
                      </div>
                    </div>
                    <div>
                      <div class="font-medium">
                        {{$skill->name}}
                      </div>
                    </div>
                  </div>
                </td>
                @can('update', App\Models\Skill::class)
                    @if($editmode)
                        <td>
                            <x-link-button href="{{{route('skills.edit',['skill' => $skill])}}}" class="btn-xs btn-warning">Edit</x-link-button>
                        </td>
                    @endif
                @endcan
              </tr>
            @endforeach
          </tbody>
        </table> --}}
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
    @can('update', App\Models\SkillSection::class)
        @if($editmode)
            <div class="flex-0">
                <hr>
                <div class="text-center mt-5">
                    <x-link-button :href='route("section.edit", ["section" => $section])' class="btn-sm btn-warning">Edit Section</x-link-button>
                </div>
            </div>
        @endif
    @endcan
  </div>
