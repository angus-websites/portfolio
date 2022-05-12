@section('title', "Edit User")

<x-app-layout>
  <x-page-container>
    
    <x-page-title title="Edit" subtitle="Here you can edit the details of this user" backLink="{{route('users.index')}}" backText="Users"/>

    <!--Edit-->
    @livewire("users.edit", ['user' => $user])
  </x-page-container>
  
</x-app-layout>
