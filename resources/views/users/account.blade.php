@section('title', 'Account')

<x-app-layout>
    <x-page-container>
      <x-page-title title="Account" subtitle="Here you can manage your account details" />
      <!-- Main grid -->
      <div class="flex flex-col space-y-8 my-10">
        <!--Account -->
        <div>
          @livewire("users.account", ["user" => Auth::user()])
        </div>
      </div>

    </x-page-container>
</x-app-layout>
