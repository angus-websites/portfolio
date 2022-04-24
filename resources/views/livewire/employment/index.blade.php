<div>
    @if (session()->has('success'))
        <div class="alert alert-success shadow-lg mb-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
          </div>
        </div>
    @endif

    @if (session()->has('info'))
        <div class="alert alert-info shadow-lg mb-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>{{ session('info') }}</span>
          </div>
        </div>
    @endif

    <div class="overflow-x-auto">
      <table class="table w-full">
        <thead>
            <tr>
                <th></th>
                <th colspan="2">Employment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employments as $employment)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>
                        <b>{{$employment->employer}}</b> - {{$employment->role}}
                    </td>
                    <td>
                        <div class="flex flex-row justify-start items-center gap-x-4">
                            @can("update", $employment)
                                <x-link-button href="{{route('employment.edit', ['employment' => $employment]) }}" class="btn btn-sm btn-warning">Edit</x-link-button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
