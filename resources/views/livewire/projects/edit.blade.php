<div>
    
    <x-alerts.all />

    @if (session()->has('success'))
        @can("view", $project)
            <div class="p-4 text-center">
                <a href="{{route("projects.show", ["project" => $project])}}" class="btn btn-sm">Preview</a>
            </div>
        @endcan
    @endif

    <form wire:submit.prevent="{{$this->is_create ? 'createProject' : 'updateProject'}}">

        <h2 class="text-lg font-medium">Basic details</h2>
        <div class="grid md:grid-cols-2 gap-4 p-4">

            <!-- Active or not -->
            <div class="form-control">
                <div class="col-span-6 sm:col-span-4 flex items-start">
                  <div class="flex items-center h-5">
                    <input wire:model="project.active" id="active" name="active" type="checkbox" class="checkbox checkbox-sm toggle_block">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="active" class="font-medium text-gray-700">Active</label>
                    <p class="text-gray-500">Is this project active?</p>
                    <x-input-error for="project.active" />
                  </div>

                </div>
            </div>

            <!-- Project name -->
            <div class="form-control col-start-1">
                <x-label for="name" :value="__('Project name')" />
                <x-input wire:model="project.name"
                            id="name"
                            class="input-bordered"
                            type="text"
                            name="name"
                            error="project.name"
                            required />
            </div>

            <!-- Date made -->
            <div class="form-control">
                <x-label for="date_made" :value="__('Date created')" />
                <x-input wire:model="project.date_made"
                            id="date_made"
                            class="input-bordered"
                            type="date"
                            name="date_made"
                            error="project.date_made"
                            />
            </div>

            <!--Category-->
            <div class="form-control">
                <x-label for="category" :value="__('Category')" />
                <x-select wire:model="project.category_id"
                          error="project.category_id"
                          id="category" 
                          name="category_id" 
                          class="select-bordered w-full" 
                          required>
                  <option selected>Choose a category</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">
                      {{$category->name}}
                    </option>
                  @endforeach
                </x-select>
            </div>

            <!-- Short Description -->
            <div class="form-control md:col-start-1">
                <x-label for="short_desc" :value="__('Short project description')" />
                <x-input wire:model="project.short_desc"
                            id="short_desc"
                            class="input-bordered"
                            type="text"
                            name="short_desc"
                            error="project.short_desc"
                            />
            </div>

            <!-- Long description -->
            <div class="form-control md:col-start-1 md:col-span-2" wire:ignore>
                <x-label for="editor" :value="__('Long project description')" />
                <input id="trix" type="hidden">
                <trix-editor
                    x-data
                    x-on:trix-change="$dispatch('input', event.target.value)"
                    x-ref="trix"
                    input="trix"
                    wire:key="projectEdit"
                    wire:model.debounce.500ms="project.long_desc"
                    class="font-sans bg-white prose max-w-none">
                        
                </trix-editor>
            </div>
        </div>

        <h2 class="text-lg font-medium mt-7">Links</h2>
        <div class="p-4">

            <!--Github checkbox-->
            <div x-data="{show: {{$this->hasGitLink()}} }" class="mb-6" >
                <div class="form-control">
                    <div class="col-span-6 sm:col-span-4 flex items-start">
                      <div class="flex items-center h-5">
                        <input x-model="show" @click='show = !show' id="has_git" name="has_git" type="checkbox" class="checkbox checkbox-sm toggle_block" checked="{{$this->hasGitLink()}}">
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="has_git" class="font-medium text-gray-700">Github Link</label>
                        <p class="text-gray-500">Does this project include a public github link?</p>
                      </div>
                    </div>
                </div>
                <div class="form-control" x-show="show" x-transition>
                    <x-label for="git_link" :value="__('Github link')" />
                    <x-input wire:model="project.git_link"
                                id="git_link"
                                class="input-bordered"
                                type="url"
                                name="git_link"
                                error="project.git_link"
                                x-bind:required="show" />
                </div>
            </div>



            <!-- Website link -->
            <div  x-data="{show: {{$this->hasWebLink()}} }" class="mb-6">
                <div class="form-control">
                    <div class="col-span-6 sm:col-span-4 flex items-start">
                      <div class="flex items-center h-5">
                        <input x-model="show" @click='show = !show' id="has_web" name="has_web" type="checkbox" class="checkbox checkbox-sm toggle_block">
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="has_web" class="font-medium text-gray-700">Website Link</label>
                        <p class="text-gray-500">Does this project include a live public website?</p>
                      </div>
                    </div>
                </div>
                <div class="form-control" x-show="show" x-transition:enter="transition ease-out duration-300" >
                    <x-label for="web_link" :value="__('Website link')" />
                    <x-input wire:model="project.web_link"
                                id="web_link"
                                class="input-bordered"
                                type="url"
                                name="web_link"
                                error="project.web_link"
                                x-bind:required="show" />
                </div>
            </div>
        </div>

        <h2 class="text-lg font-medium mt-7">Tags</h2>
        <div class="grid md:grid-cols-2 gap-4 p-4">
            <!--Tag search input -->
            <div>
                <!-- Tag search input -->
                <div class="form-control">
                    <x-label for="tagSearch" :value="__('Search for tags')" />
                    <x-input   wire:model="tag_search"
                               id="tagSearch"
                               class="input-bordered"
                               type="text"
                               /> 
                </div>
                <div class="divider">Results</div>
                <!-- Search results -->
                <div class="flex flex-row justify-start items-center gap-4 mt-5 flex-wrap">
                    @forelse($tags as $tag)
                        <x-button wire:click="addTag({{ $tag->id }})" class="btn btn-sm" type="button">{{$tag->name}}</x-button>
                    @empty
                        @if ($this->isTagSearchTaken())
                            <div class="text-center w-full">
                                <span class="badge badge-error mx-auto">No results</span>
                            </div>
                        @else
                            <div class="flex flex-col gap-y-2 mx-auto">
                                <x-button wire:click="createTag()" class=" btn-sm btn-info mx-auto" type="button">
                                    Create "{{$tag_search}}"
                                </x-button>
                                
                                @error('tag_search')
                                    <label class="label">
                                        <span class="label-text text-error-content">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        @endif                        
                    @endforelse
                </div>

            </div>

            <!-- Display the added tags -->
            <div class="text-center">
                <h3 class="mb-4 font-medium">Added tags</h3>
                <div class="flex flex-row justify-center items-center gap-4 flex-wrap">
                    @forelse($added_tags as $tag)
                        <x-button wire:click="removeTag({{ $tag->id }})" class="btn btn-success btn-sm gap-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            {{ $tag->name }}
                        </x-button>

                    @empty
                        <span class="badge badge-info mx-auto">No tags</span>
                    @endforelse
                </div>

            </div>
        </div>

        <h2 class="text-lg font-medium mt-7">Images</h2>
        <div class="grid md:grid-cols-2 gap-4 p-4">
            
            <!-- Logo upload -->
            <div class="form-control"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                 >
                <x-label for="short_desc" :value="__('Logo')" />
                <input type="file" wire:model="uploaded_logo">
                <!-- Progress bar -->
                <div x-show="isUploading">
                    <progress class="progress progress-success w-56 my-2" x-bind:value="progress" max="100"></progress>    
                </div>

                @error('uploaded_logo')
                    <label class="label mt-2">
                        <span class="label-text text-error-content">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Logo previews -->
            <div>
                <div class="flex flex-row items-start justify-around">
                    <!-- Current logo section -->
                    <div class="flex flex-col gap-y-2 justify-center"> 
                        <h3 class="mb-4 font-medium text-center">Current logo</h3>
                        <div class="avatar mx-auto">
                            <div class="rounded-full w-24 h-24 shadow-md">
                                <img src="{{$this->project->getLogo()}}">
                            </div>
                        </div> 

                        @if(!empty($this->project->logo))
                            <div class="text-center mt-2">
                                <x-button wire:click="resetLogo" type="button" class="btn-sm btn-error">Reset</x-button>
                            </div>
                        @endif    
                    </div>

                    @if($is_uploaded_logo_valid && $uploaded_logo)
                        <!-- Uploaded logo section-->
                        <div class="flex flex-col gap-y-2 justify-center"> 
                            <h3 class="mb-4 font-medium text-center">Uploaded logo</h3>
                            <div class="avatar mx-auto">
                                <div class="rounded-full w-24 h-24 shadow-md">
                                    <img src="{{$uploaded_logo->temporaryUrl()}}">
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <x-button wire:click="discardUploadedLogo" type="button" class="btn-sm btn-error">Discard</x-button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Image upload -->
            <div class="form-control"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                 >
                <x-label for="short_desc" :value="__('Image')" />
                <input type="file" wire:model="uploaded_image">
                <!-- Progress bar -->
                <div x-show="isUploading">
                    <progress class="progress progress-success w-56 my-2" x-bind:value="progress" max="100"></progress>    
                </div>

                @error('uploaded_image')
                    <label class="label mt-2">
                        <span class="label-text text-error-content">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Image previews -->
            <div>
                <div class="flex flex-row items-start justify-around">
                    <!-- Current image section -->
                    <div class="flex flex-col gap-y-2 justify-center"> 
                        <h3 class="mb-4 font-medium text-center">Current Image</h3>
                        <div class="mx-auto">
                            <img class="object-cover h-48 w-96" src="{{$this->project->getImage()}}">
                        </div> 
                        @if(!empty($this->project->img))
                            <div class="text-center mt-2">
                                <x-button wire:click="resetImage" type="button" class="btn-sm btn-error">Reset</x-button>
                            </div>
                        @endif
                        
                    </div>

                    @if($is_uploaded_image_valid && $uploaded_image)

                        <!-- Uploaded image section-->
                        <div class="flex flex-col gap-y-2 justify-center"> 
                            <h3 class="mb-4 font-medium text-center">Uploaded image</h3>
                            <div class="mx-auto">
                                <img class="object-cover h-48 w-96" src="{{$uploaded_image->temporaryUrl()}}">
                            </div> 
                            <div class="text-center mt-2">
                                <x-button wire:click="discardUploadedImage" type="button" class="btn-sm btn-error">Discard</x-button>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <!-- Cover upload -->
            <div class="form-control"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                 >
                <x-label for="coverUpload" :value="__('Cover image')" />
                <input id="coverUpload" type="file" wire:model="uploaded_cover">
                <!-- Progress bar -->
                <div x-show="isUploading">
                    <progress class="progress progress-success w-56 my-2" x-bind:value="progress" max="100"></progress>    
                </div>

                @error('uploaded_cover')
                    <label class="label mt-2">
                        <span class="label-text text-error-content">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Cover previews -->
            <div>
                <div class="flex flex-row items-start justify-around">
                    <!-- Current image section -->
                    <div class="flex flex-col gap-y-2 justify-center"> 
                        <h3 class="mb-4 font-medium text-center">Current Cover</h3>
                        <div class="mx-auto">
                            <img class="object-cover h-48 w-96" src="{{$this->project->getCover()}}">
                        </div> 
                        @if(!empty($this->project->cover))
                            <div class="text-center mt-2">
                                <x-button wire:click="resetCover" type="button" class="btn-sm btn-error">Reset</x-button>
                            </div>
                        @endif
                        
                    </div>

                    @if($is_uploaded_cover_valid && $uploaded_cover)

                        <!-- Uploaded image section-->
                        <div class="flex flex-col gap-y-2 justify-center"> 
                            <h3 class="mb-4 font-medium text-center">Uploaded cover</h3>
                            <div class="mx-auto">
                                <img class="object-cover h-48 w-96" src="{{$uploaded_cover->temporaryUrl()}}">
                            </div> 
                            <div class="text-center mt-2">
                                <x-button wire:click="discardUploadedCover" type="button" class="btn-sm btn-error">Discard</x-button>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <hr>
        <div class="py-4">
            <x-button class="btn-primary">{{$this->is_create ? 'Create' : 'Update'}}</x-button>

            @can("delete", $project)
                @if(!$is_create)
                    <!--Delete button -->
                    <x-button-group class="mt-10 sm:mt-8 sm:justify-center lg:justify-start">
                        <label for="delete-skill-modal" class="btn btn-error btn-sm modal-button">
                            Delete
                        </label>

                    </x-button-group>
                @endif
            @endcan

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

    @can("delete", $project)
      @if(!$is_create)
          <!-- Delete Modal -->
          <input type="checkbox" id="delete-skill-modal" class="modal-toggle">
          <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
              <h3 class="font-bold text-lg">Are you sure?</h3>
              <p class="py-4">Are you sure you want to delete this Project?</p>
              <div class="modal-action">
                <label for="delete-skill-modal" class="btn">No</label>
                <x-button wire:click="deleteProject" class="btn btn-error">Yes</x-button>
              </div>
            </div>
          </div>
      @endif
    @endcan

</div>
