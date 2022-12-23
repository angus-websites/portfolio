<div>
    <x-alerts.all />

    <form wire:submit.prevent="saveSkill">
        <div class="grid grid-cols-6">

          <!-- Basic details section -->
          <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
            <h3 class="text-lg font-medium mt-7" >Basic details</h3>
            <div class="">

              <!-- Name -->
              <div class="form-control mb-4">
                  <x-label for="name" :value="__('Skill name')" />
                  <x-input wire:model="skill.name"
                              autofocus
                              id="name"
                              class="input-bordered"
                              type="text"
                              name="name"
                              error="skill.name"
                              showgreen="true"
                              required />
              </div>

              <!--Section-->
              <div class="form-control mb-4">
                  <x-label for="section" :value="__('Skill Section')" />
                  <x-select wire:model="skill.skill_section_id" error="skill.skill_section_id" showgreen="true" id="section" name="skill_section_id" class="select-bordered w-full" required>
                    <option disabled="disabled">Choose a skill section</option>
                    @foreach($sections as $section)
                      <option value="{{$section->id}}">
                        {{$section->name}}
                      </option>
                    @endforeach
                  </x-select>
              </div>


              <!-- Description -->
              <div class="form-control mb-4">
                  <x-label for="description" :value="__('Skill description')" />
                  <x-textarea wire:model="skill.description" showgreen="true" error="skill.description" type="text" name="description" id="description" autocomplete="false" class="h-24 textarea-bordered" ></x-textarea>
              </div>
            </div>
          </div>

          <!-- Icon section -->
          <div class="col-span-6">
            <h3 class="text-lg font-medium mt-7">Icon details</h3>
            <div class="grid grid-cols-2">
              <!-- Icon upload -->
              <div class="form-control"
                   x-data="{ isUploading: false, progress: 0 }"
                   x-on:livewire-upload-start="isUploading = true"
                   x-on:livewire-upload-finish="isUploading = false"
                   x-on:livewire-upload-progress="progress = $event.detail.progress"
                   >
                  <x-label for="short_desc" :value="__('Icon')" />
                  <input type="file" wire:model="uploaded_icon">
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
              <div class="flex flex-row items-start justify-around">
                  <!-- Current image section -->
                  <div class="flex flex-col gap-y-2 justify-center">
                      <h3 class="mb-4 font-medium text-center">Current Icon</h3>
                      <div class="avatar mx-auto bg-white">
                        <div class="w-32 rounded">
                          <img src="{{$this->skill->getIcon()}}">
                        </div>
                      </div>
                      @if(!empty($this->skill->icon))
                          <div class="text-center mt-2">
                              <x-button wire:click="resetIcon" type="button" class="btn-sm btn-outline btn-error">Reset</x-button>
                          </div>
                      @endif
                  </div>

                  @if($is_uploaded_icon_valid && $uploaded_icon)

                      <!-- Uploaded image section-->
                      <div class="flex flex-col gap-y-2 justify-center">
                          <h3 class="mb-4 font-medium text-center">Uploaded Icon</h3>
                          <div class="avatar mx-auto bg-white">
                            <div class="w-32 rounded">
                              <img src="{{$uploaded_icon->temporaryUrl()}}">
                            </div>
                          </div>
                          <div class="text-center mt-2">
                              <x-button wire:click="discardUploadedIcon" type="button" class="btn-sm btn-outline btn-error">Discard</x-button>
                          </div>
                      </div>
                  @endif
              </div>

            </div>
          </div>

          <!-- Save section -->
          <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
            <div class="">
              <x-button-group class="mt-5 sm:mt-8 sm:justify-center lg:justify-start">
                <x-button  class="btn-primary" type="submit">
                  Save
                </x-button>
              </x-button-group>

              @can("delete", $skill)
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
          </div>

        </div>

    </form>


    @can("delete", $skill)
      @if(!$is_create)
          <!-- Delete Modal -->
          <input type="checkbox" id="delete-skill-modal" class="modal-toggle">
          <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
              <h3 class="font-bold text-lg">Are you sure?</h3>
              <p class="py-4">Are you sure you want to delete this Skill?</p>
              <div class="modal-action">
                <label for="delete-skill-modal" class="btn">No</label>
                <x-button wire:click="deleteSkill" class="btn btn-error">Yes</x-button>
              </div>
            </div>
          </div>
      @endif
    @endcan

</div>

