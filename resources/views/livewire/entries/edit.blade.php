<div>

    <d>

        <!-- Active or not -->
        <div>
            <label class="label cursor-pointer">
                <span class="label-text">Remember me</span>
                <input type="checkbox" class="toggle" checked />
            </label>
        </div>

        <!-- Long description -->
        <div class="form-control md:col-start-1 md:col-span-2" wire:ignore>
            <x-label for="editor" :value="__('Content')" />
            <input id="trix" type="hidden">
            <trix-editor
                input="trix"
                wire:model.debounce.500ms="entry.content"
                class="font-sans bg-white prose max-w-none">

            </trix-editor>
        </div>


        <!-- Save section -->
        <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
            <div class="">
                <x-button-group class="mt-5 sm:mt-8 sm:justify-center lg:justify-start">
                    <x-button  class="btn-primary" type="submit">
                        Save
                    </x-button>
                </x-button-group>

                @can("delete", $entry)
                    @if(!$is_create)
                        <!--Delete button -->
                        <x-button-group class="mt-10 sm:mt-8 sm:justify-center lg:justify-start">
                            <label for="delete-entry-modal" class="btn btn-error btn-sm modal-button">
                                Delete
                            </label>

                        </x-button-group>
                    @endif
                @endcan
            </div>
        </div>

    </d>

    @can("delete", $entry)
        @if(!$is_create)
            <!-- Delete Modal -->
            <input type="checkbox" id="delete-entry-modal" class="modal-toggle">
            <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Are you sure?</h3>
                    <p class="py-4">Are you sure you want to delete this Entry?</p>
                    <div class="modal-action">
                        <label for="delete-entry-modal" class="btn">No</label>
                        <x-button wire:click="deleteEntry" class="btn btn-error">Yes</x-button>
                    </div>
                </div>
            </div>
        @endif
    @endcan

    @push('stylesheets')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
        <style type="text/css">
            trix-toolbar [data-trix-button-group="file-tools"] {
                display: none;
            }
        </style>
    @endpush

    @push('scripts')
        <!--JS for Trix editor-->
        <script type="text/javascript" src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
        <script type="text/javascript">
            document.addEventListener("trix-file-accept", event => {
                event.preventDefault()
            })
        </script>
    @endpush

</div>
