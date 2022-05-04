
@section('title', 'Contact')

<x-app-layout>
  <div class="container px-5 py-24 mx-auto">
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
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Me</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Feel free to use the form below to send me a message</p>
    </div>
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
  </div>
</x-app-layout>
