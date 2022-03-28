<div>
    @if (session()->has('success'))
        <div class="alert alert-success shadow-lg mb-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
          </div>
        </div>
    @endif

    <div class="grid grid-cols-6">

        <div class="col-span-6 md:col-span-3 lg:col-span-2">

            <form wire:submit.prevent="saveSkill">
                <!-- Name -->
                <div class="form-control mb-4">
                    <x-label for="name" :value="__('Skill name')" />
                    <x-input wire:model="skill.name"
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

                

                <!--Save button -->
                <x-button-group class="mt-5 sm:mt-8 sm:justify-center lg:justify-start">
                  <button href="#" class="btn btn-primary" type="submit">
                    Save
                  </button>
                </x-button-group>

            </form>
        </div>
    </div>
</div>

