
@section('title', 'Contact')
@section('description', 'Feel free to contact me using the form below')

<x-app-layout>
  <x-page-container>
    @if ($errors->any())
    <div class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-5" role="alert">
      <p class="font-bold">Errors...</p>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <x-page-title title="Contact me" subtitle="Do you have a question? Get in touch. Use the form below to send me a message" />
    <form method="POST" action="/contact">
      @csrf
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
          <div class="p-2 w-1/2">
            <div class="form-control">
              <x-label for="name" :value="__('Name')" />
              <x-input name="name" type="text" class="input-bordered" placeholder="" required></x-input>
            </div>
          </div>
          <div class="p-2 w-1/2">
            <div class="form-control">
              <x-label for="email" :value="__('Email')" />
              <x-input name="email" type="email" class="input-bordered" placeholder="" required></x-input>
            </div>
          </div>
          <div class="p-2 w-full">
            <div class="form-control">
                <x-label for="message" :value="__('Your Message')" />
                <textarea name="message" class="textarea textarea-bordered h-24" placeholder=""></textarea>
            </div>
          </div>
          <div class="p-2 w-full mt-4">
            <x-button class="btn-primary btn-block">Send</x-button>
          </div>
        </div>
      </div>
    </form>
  </x-page-container>
</x-app-layout>
