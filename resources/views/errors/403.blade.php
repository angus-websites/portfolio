@section('title', 'Permission denied')
<x-error-layout>
    <x-error-page code="403" title="Access denied" subtitle="{{$exception->getMessage() ?: 'You are not authorised to access this page'}}" />
</x-error-layout>
