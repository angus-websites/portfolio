<div class="bg-white rounded-lg p-5">
    <!--Section name-->
    <p class="uppercase text-lg font-bold mb-2">{{$name}}</p>
    <hr>
    <table class="my-5">
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
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
