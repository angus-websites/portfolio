@section('title', 'Users')

<x-app-layout>
  <x-page-container>
    <x-page-title title="Users" subtitle="You can manage the users here"/>

    <!--Skills-->
    <div class="my-10">
      <!--Skills-->
      @livewire("users.index")
    </div>
  </x-page-container>
  
</x-app-layout>
