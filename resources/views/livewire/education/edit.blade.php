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


    <form wire:submit.prevent="saveEducation">

        <div class="grid grid-cols-1 gap-y-16">

            <!-- Basic details -->
            <div>
                <h2 class="text-lg font-medium">Details</h2>
                <div class="grid md:grid-cols-2 gap-4 p-4">
                    <!-- Institute name -->
                    <div class="form-control">
                        <x-label for="institute" :value="__('Institute name')" />
                        <x-input wire:model="education.institute"
                                    id="institute"
                                    class="input-bordered"
                                    type="text"
                                    name="institute"
                                    error="education.institute"
                                    required />
                    </div>

                    <!-- Education Level -->
                    <div class="form-control">
                        <x-label for="level" :value="__('Level')" />
                        <x-input wire:model="education.level"
                                    id="level"
                                    class="input-bordered"
                                    type="text"
                                    name="level"
                                    error="education.level"
                                    placeholder="GCSE, A-Level, BSC.."
                                    required />
                    </div>

                    <!-- Start date -->
                    <div class="form-control">
                        <x-label for="start_date" :value="__('Start Date')" />
                        <x-input wire:model="education.start_date"
                                    id="start_date"
                                    class="input-bordered"
                                    type="date"
                                    name="start_date"
                                    error="education.start_date"
                                    required />
                    </div>

                    <!-- End date -->
                    <div class="form-control">
                        <x-label for="end_date" :value="__('End Date')" />
                        <x-input wire:model="education.end_date"
                                    id="end_date"
                                    class="input-bordered"
                                    type="date"
                                    name="end_date"
                                    error="education.end_date"
                                    />
                    </div>

                    <!-- Description -->
                    <div class="form-control md:col-start-1 md:col-span-2" wire:ignore>
                        <x-label for="editor" :value="__('Description')" />
                        <input id="trix" type="hidden">
                        <trix-editor
                            input="trix"
                            wire:model.debounce.500ms="education.description"
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

                                @if(!empty($this->education->icon))

                                    <div class="avatar mx-auto">
                                        <div class="rounded-full w-14 shadow-md">
                                            <img src="{{$this->education->getIcon()}}">
                                        </div>
                                    </div> 

                                    <div class="text-center mt-2">
                                        <x-button wire:click="resetIcon" type="button" class="btn-sm btn-error">Reset</x-button>
                                    </div>
                                @else
                                    <div class="avatar placeholder mx-auto">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14">
                                            <span class="text-xl">{{$this->education->institute[0] ?? "?"}}</span>
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
                                        <x-button wire:click="discardUploadedLogo" type="button" class="btn-sm btn-error">Discard</x-button>
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
