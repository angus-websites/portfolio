<div>

    <x-alerts.all />

    <a class="link">I'm a simple link</a>
    
    <form wire:submit.prevent="saveEmployment">

        <div class="grid grid-cols-1 gap-y-16">

            <!-- Basic details -->
            <div>
                <h2 class="text-lg font-medium">Details</h2>
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
            </div>

            <!-- Images -->
            <div>
                <h2 class="text-lg font-medium">Images</h2>
                <div class="grid md:grid-cols-2 gap-4 p-4">

                    <!-- Icon upload -->
                    <div class="form-control"
                         x-data="{ isUploading: false, progress: 0 }"
                         x-on:livewire-upload-start="isUploading = true"
                         x-on:livewire-upload-finish="isUploading = false"
                         x-on:livewire-upload-progress="progress = $event.detail.progress"
                         >
                        <x-label for="icon_upload" :value="__('Icon')" />
                        <input id="icon_upload" type="file" wire:model="uploaded_icon">
                        <!-- Progress bar -->
                        <div x-show="isUploading">
                            <progress class="progress progress-success w-56 my-2" x-bind:value="progress" max="100"></progress>    
                        </div>

                        @error('uploaded_icon')
                            <label class="label mt-2">
                                <span class="label-text text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Icon previews -->
                    <div>
                        <div class="flex flex-row items-start justify-around">
                            <!-- Current Icon section -->
                            <div class="flex flex-col gap-y-2 justify-center"> 
                                <h3 class="mb-4 font-medium text-center">Current Icon</h3>

                                @if(!empty($this->employment->icon))

                                    <div class="avatar mx-auto">
                                        <div class="rounded-full w-14 shadow-md">
                                            <img src="{{$this->employment->getIcon()}}">
                                        </div>
                                    </div> 

                                    <div class="text-center mt-2">
                                        <x-button wire:click="resetIcon" type="button" class="btn-sm btn-error">Reset</x-button>
                                    </div>
                                @else
                                    <div class="avatar placeholder mx-auto">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14">
                                            <span class="text-xl">{{$this->employment->employer[0] ?? "?"}}</span>
                                        </div>
                                    </div>
                                @endif 
                            </div>

                            @if($is_uploaded_icon_valid && $uploaded_icon)
                                <!-- Uploaded Icon section-->
                                <div class="flex flex-col gap-y-2 justify-center"> 
                                    <h3 class="mb-4 font-medium text-center">Uploaded Icon</h3>
                                    <div class="avatar mx-auto">
                                        <div class="rounded-full w-14 shadow-md">
                                            <img src="{{$uploaded_icon->temporaryUrl()}}">
                                        </div>
                                    </div>
                                    <div class="text-center mt-2">
                                        <x-button wire:click="discardUploadedIcon" type="button" class="btn-sm btn-error">Discard</x-button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save -->
            <div>
                <div class="p-4">
                    <x-button class="btn-primary">Save</x-button>
                </div>
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
