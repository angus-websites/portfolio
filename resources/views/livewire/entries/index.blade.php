<div>

    <x-alerts.all />

    <!--Button flexbox -->
    <div class="flex flex-col gap-y-4 md:flex-row md:justify-around my-8">

        @can("create", App\Models\Entry::class)
            <div>
                <x-link-button href="{{route('entries.create') }}"  class="btn btn-primary">
                    Create Entry
                </x-link-button>


            </div>
        @endcan
    </div>

    <!-- Content -->
    <div class="overflow-x-auto">
        <table class="table w-full">
            <!-- head -->
            <thead>
            <tr>
                <th colspan="3">Entry</th>
            </tr>
            </thead>
            <tbody>
            @forelse($entries as $entry)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{route('entries.show', ['entry' => $entry])}}" class="link">{{$entry->title}}</a></td>
                    <td>
                        @can("update", $entry)
                            <x-link-button href="{{route('entries.edit', ['entry' => $entry])}}" class="btn-sm btn-warning">Edit</x-link-button>
                        @endcan

                        @can("delete", $entry)
                            <x-button wire:click="showDelete" class="btn-sm btn-error">Delete</x-button>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="2">No Entries found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
