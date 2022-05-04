@section('title', 'Service unavailable')
<x-error-layout>
    <x-error-page code="503" title="Service not available" subtitle="{{$exception->getMessage() ?: 'The site is not available, please try again later'}}" />
</x-error-layout>
