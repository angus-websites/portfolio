<div>
    <form wire:submit.prevent="{{$this->is_create ? 'createProject' : 'updateProject'}}">

        <h2 class="text-lg font-medium">Basic details</h2>
        <div class="grid md:grid-cols-2 gap-4 p-4">
            <!-- Employer name -->
            <div class="form-control">
                <x-label for="employer" :value="__('Employer name')" />
                <x-input wire:model="employment.employer"
                            id="employer"
                            class="input-bordered"
                            type="text"
                            name="employer"
                            error="employment.employer"
                            required />
            </div>

            <!-- Role -->
            <div class="form-control">
                <x-label for="role" :value="__('Job Role')" />
                <x-input wire:model="employment.role"
                            id="role"
                            class="input-bordered"
                            type="text"
                            name="role"
                            error="employment.role"
                            placeholder="Waiter, Teacher, etc"
                            required />
            </div>

            <!-- Start date -->
            <div class="form-control">
                <x-label for="start_date" :value="__('Start Date')" />
                <x-input wire:model="employment.start_date"
                            id="start_date"
                            class="input-bordered"
                            type="date"
                            name="start_date"
                            error="employment.start_date"
                            required />
            </div>

            <!-- End date -->
            <div class="form-control">
                <x-label for="end_date" :value="__('End Date')" />
                <x-input wire:model="employment.end_date"
                            id="end_date"
                            class="input-bordered"
                            type="date"
                            name="end_date"
                            error="employment.end_date"
                            />
            </div>

            <!-- Description -->
            <div class="form-control md:col-start-1 md:col-span-2" wire:ignore>
                <x-label for="editor" :value="__('Description')" />
                <input id="trix" type="hidden">
                <trix-editor
                    input="trix"
                    wire:model.debounce.500ms="employment.description"
                    class="font-sans bg-white prose max-w-none">
                        
                </trix-editor>
            </div>

        </div>

    </form>

    @push('stylesheets')
      <link rel="stylesheet" type="text/css" href="https://www.unpkg.com/trix@1.3.1/dist/trix.css">
      <style type="text/css">
        trix-toolbar [data-trix-button-group="file-tools"] {
          display: none;
        }
      </style>
    @endpush

    @push('scripts')
      <!--JS for Trix editor-->
      <script type="text/javascript" src="https://www.unpkg.com/trix@1.3.1/dist/trix.js"></script>
      <script type="text/javascript">
        document.addEventListener("trix-file-accept", event => {
          event.preventDefault()
        })
      </script>
    @endpush
    
</div>
