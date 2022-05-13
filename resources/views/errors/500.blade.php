@section('title', 'Server error')
<x-error-layout>
    <x-error-page code="500" title="Server Error" subtitle="{{$exception->getMessage() ?: 'The server ran into a problem'}}" />
</x-error-layout>
