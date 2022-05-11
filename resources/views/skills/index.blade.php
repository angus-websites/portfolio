@section('title', 'Skills')

<x-app-layout>
  <x-page-container>
    <x-page-title title="My Skills" subtitle="You can manage your skills here" />
    <!--Skills-->
    <div class="my-10">
      <!--Skills-->
      @livewire("skills.index")
    </div>
  </x-page-container>
  
</x-app-layout>
