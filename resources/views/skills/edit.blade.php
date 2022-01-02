@section('title', $skill->name)

<x-app-layout>
  <div class="container px-5 pt-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <!--Back-->
      <div class="text-left">
        <x-link-button href="{{route('skills.index') }}"  class="btn-ghost font-normal text-left">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
          <span>Skills</span>
        </x-link-button>
      </div>
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{$skill->name}}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you can edit the details of this skill or delete the skill</p>
      @can("delete", App\Models\Skill::class)
          <div class="my-5">
            <form method="POST" method="POST" action="{{{ route("skills.destroy", ["skill" => $skill] )}}}">
              @csrf
              @method("delete")
              <x-button class="btn-error btn-sm md:btn-md">Delete this skill</x-button>
            </form>
          </div>
      @endcan
    </div>
  </div>
  <!--Edit-->
  <form method="POST" action="{{{route('skills.update', ['skill' => $skill])}}}">
    @method('PUT')
    @csrf
    <x-forms.create-edit-skill :skill="$skill" :sections="$sections"/>
  </form>
</x-app-layout>
