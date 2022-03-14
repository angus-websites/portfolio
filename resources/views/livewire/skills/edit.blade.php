<div class="grid grid-cols-6">
    <div class="col-span-6 md:col-span-3 lg:col-span-2">
        <!-- Name -->
        <div class="form-control mb-4">
            <x-label for="name" :value="__('Skill name')" />
            <x-input wire:model="skill.name"
                        id="name"
                        class="input-bordered"
                        type="text"
                        name="name"
                        required />
        </div>

        <!-- Description -->
        <div class="form-control mb-4">
            <x-label for="description" :value="__('Skill description')" />
            <textarea wire:model="skill.description" type="text" name="description" id="description" autocomplete="false" class="textarea h-24 textarea-bordered" ></textarea>
        </div>

        <!--Section-->
        <div class="form-control mb-4">
            <x-label for="section" :value="__('Skill Section')" />
            <select wire:model="skill.skill_section_id" id="section" name="skill_section_id" class="select select-bordered w-full" required>
              <option disabled="disabled">Choose a skill section</option>
              @foreach($sections as $section)
                <option value="{{$section->id}}">
                  {{$section->name}}
                </option>
              @endforeach
            </select>
        </div>
        
    </div>
</div>
