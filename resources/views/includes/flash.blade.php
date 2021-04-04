@if(session('success'))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500 text-center">
    <span class="inline-block align-middle mr-8">
      <b class="capitalize">Success!</b> {!! session('success') !!}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none closeAlert">
      <span>×</span>
    </button>
  </div>
@endif

@if(session('error'))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 text-center">
    <span class="inline-block align-middle mr-8">
      <b class="capitalize">Error!</b> {!! session('error') !!}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none closeAlert">
      <span>×</span>
    </button>
  </div>
@endif

@if(session('message'))
  <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500 text-center">
    <span class="inline-block align-middle mr-8">
      {!! session('message') !!}
    </span>
    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none closeAlert">
      <span>×</span>
    </button>
  </div>
@endif