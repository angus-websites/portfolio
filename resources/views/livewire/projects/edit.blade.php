<div>
    
    @if (session()->has('success'))
        <div class="alert alert-success shadow-lg mb-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
          </div>
        </div>
    @endif

    <form wire:submit.prevent="{{$this->getFormRoute()}}">

        <h2 class="text-lg font-medium">Basic details</h2>
        <div class="grid md:grid-cols-2 gap-4 p-4">
            <!-- Project name -->
            <div class="form-control">
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
                            required />
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
                      {{$category->short_name}}
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
                    input="trix"
                    wire:model.debounce.500ms="project.long_desc"
                    class="font-sans bg-white prose max-w-none">
                        
                </trix-editor>
            </div>
        </div>

        <h2 class="text-lg font-medium mt-7">Links</h2>
        <div class="p-4">

            <!--Github checkbox-->
            <div x-data="{show: {{$this->hasGitLink()}}}" class="mb-6" >
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
                                showgreen="true"
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
                                showgreen="true"
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
                        <button wire:click="addTag({{ $tag->id }})" class="btn btn-sm" type="button">{{$tag->name}}</button>
                    @empty
                        @if ($this->isTagSearchTaken())
                            <div class="text-center w-full">
                                <span class="badge badge-error mx-auto">No results</span>
                            </div>
                        @else
                            <div class="flex flex-col gap-y-2 mx-auto">
                                <button wire:click="createTag()" class="btn btn-sm btn-outline btn-info mx-auto" type="button">
                                    Create "{{$tag_search}}"
                                </button>
                                
                                @error('tag_search')
                                    <label class="label">
                                        <span class="label-text text-error">{{ $message }}</span>
                                    </label>
                                @enderror
                            </div>
                        @endif                        
                    @endforelse
                </div>

            </div>

            <!-- Display the added tags -->
            <div class="text-center">
                <p>Added tags</p>
                <div class="flex flex-row justify-center items-center gap-4 mt-5 flex-wrap">
                    @forelse($added_tags as $tag)
                        <button wire:click="removeTag({{ $tag->id }})" class="btn btn-success btn-sm gap-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                            {{ $tag->name }}
                        </button>

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
                <input type="file" wire:model="logo_image">
                <!-- Progress bar -->
                <div x-show="isUploading">
                    <progress class="progress progress-success w-56 my-2" x-bind:value="progress" max="100"></progress>    
                </div>

                @error('logo_image')
                    <label class="label mt-2">
                        <span class="label-text text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <!-- Logo preview -->
            <div class="text-center">
                <p>Logo preview</p>
                @if ($logo_image)
                    <div class="avatar mx-auto mt-2">
                      <div class="rounded-full w-32 h-32 shadow-md">
                        <img src="{{$logo_image->temporaryUrl()}}">
                      </div>
                    </div> 
                @endif
            </div>

            
            

        </div>

        <hr>
        <div class="py-4">
            <x-button class="btn-primary">{{$this->getButtonText()}}</x-button>
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