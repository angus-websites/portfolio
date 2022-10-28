<div>

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
