<div>
    
    <form>

        <h2 class="text-lg font-medium">Basic details</h2>
        <div class="p-4">
            <!-- Project name -->
            <div class="form-control mb-4">
                <x-label for="name" :value="__('Project name')" />
                <x-input wire:model="project.name"
                            id="name"
                            class="input-bordered"
                            type="text"
                            name="name"
                            error="project.name"
                            showgreen="true"
                            required />
            </div>

            <!-- Date made -->
            <div class="form-control mb-4">
                <x-label for="date_made" :value="__('Date created')" />
                <x-input wire:model="project.name"
                            id="date_made"
                            class="input-bordered"
                            type="date"
                            name="date_made"
                            error="project.date_made"
                            showgreen="true"
                            required />
            </div>

            <!--Category-->
            <div class="form-control mb-4">
                <x-label for="category" :value="__('Category')" />
                <x-select wire:model="project.category" error="project.category" showgreen="true" id="category" name="category" class="select-bordered w-full" required>
                  <option disabled="disabled">Choose a category</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}">
                      {{$category->short_name}}
                    </option>
                  @endforeach
                </x-select>
            </div>

            <!-- Short Description -->
            <div class="form-control mb-4">
                <x-label for="short_desc" :value="__('Short project description')" />
                <x-input wire:model="project.short_desc"
                            id="short_desc"
                            class="input-bordered"
                            type="text"
                            name="short_desc"
                            error="project.short_desc"
                            showgreen="true"
                            required />
            </div>

            <!-- Long description -->
            <div class="form-control mb-4">
                <x-label for="editor" :value="__('Long project description')" />
                <input id="trix" type="hidden" name="content">
                <trix-editor input="trix" class="font-sans bg-white prose max-w-none"></trix-editor>
            </div>
        </div>

        <h2 class="text-lg font-medium mt-7">More details</h2>
        <div class="p-4">

            <!--Github checkbox-->
            <div x-data="{show: false}" class="mb-6" >
                <div class="form-control">
                    <div class="col-span-6 sm:col-span-4 flex items-start">
                      <div class="flex items-center h-5">
                        <input @click='show = !show' id="has_git" name="has_git" type="checkbox" class="checkbox checkbox-sm toggle_block">
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
                                required />
                </div>
            </div>



            <!-- Website link -->
            <div class="mb-6" x-data="{show: false}">
                <div class="form-control">
                    <div class="col-span-6 sm:col-span-4 flex items-start">
                      <div class="flex items-center h-5">
                        <input @click='show = !show' id="has_web" name="has_web" type="checkbox" class="checkbox checkbox-sm toggle_block">
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
                                required />
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
