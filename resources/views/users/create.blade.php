@section('title', "New User")

<x-app-layout>
  <x-page-container>
    <x-page-title title="New User" subtitle="Here you can create a new user" backLink="{{route('users.index')}}" backText="Users"/>

    <!--Edit-->
    @livewire("users.edit", ['user' => $user])
  </x-page-container>
  
</x-app-layout>
