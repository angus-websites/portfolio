<div class="bg-white rounded-lg p-5 flex flex-col">
    <!--Section name-->
    <div class="flex-0">
        <p class="uppercase text-lg font-bold mb-2 text-center">{{$name}}</p>
        <hr>
    </div>
    <div class="flex-1">
        <table class="my-5 w-full">
          <tbody>
            @foreach($skills as $skill)
              <tr>
                <td>
                  <div class="flex items-center space-x-3">
                    <div class="avatar">
                      <div class="w-12 h-12 mask mask-squircle">
                        <img src={{$skill->getImage()}}>
                      </div>
                    </div>
                    <div>
                      <div class="font-bold">
                        {{$skill->name}}
                      </div>
                    </div>
                  </div>
                </td>
                @can('update', App\Models\Skill::class)
                    @if($editmode)
                        <td><button class="btn btn-xs btn-warning">Edit</button></td>
                    @endif
                @endcan
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    @can('update', App\Models\SkillSection::class)
        @if($editmode)
            <div class="flex-0">
                <hr>
                <div class="text-center mt-5">
                    <button class="btn btn-sm btn-warning">Edit Section</button>
                </div>
            </div>
        @endif
    @endcan
  </div>
