<div>
    @if (session()->has('success'))
        <div class="alert alert-success shadow-lg mb-5">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
          </div>
        </div>
    @endif

    
    <form wire:submit.prevent="saveUser">
        <div class="grid grid-cols-6 gap-8">

          <!-- Basic details section -->
          <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
            <h3 class="text-lg font-medium mt-7" >Basic details</h3>
            <div class="space-y-4 mt-4">
              <!-- Name -->
              <div class="form-control">
                  <x-label for="name" :value="__('Name')" />
                  <x-input wire:model="user.name"
                              autofocus
                              id="name"
                              class="input-bordered"
                              type="text"
                              name="name"
                              error="user.name"
                              required />
              </div>

              <!-- Email -->
              <div class="form-control">
                  <x-label for="email" :value="__('Email')" />
                  <x-input wire:model="user.email"
                              id="email"
                              class="input-bordered"
                              type="email"
                              name="email"
                              error="user.email"
                              required />
              </div>

              <!--Role-->
              {{-- <div class="form-control mb-4">
                  <x-label for="section" :value="__('Role')" />
                  <x-select wire:model="user.skill_section_id" error="skill.skill_section_id" showgreen="true" id="section" name="skill_section_id" class="select-bordered w-full" required>
                    <option disabled="disabled">Choose a skill section</option>
                    @foreach($sections as $section)
                      <option value="{{$section->id}}">
                        {{$section->name}}
                      </option>
                    @endforeach
                  </x-select>
              </div> --}}
            </div>
          </div>

          <!-- Roles Section -->
          <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-4">
              <h3 class="text-lg font-medium mt-7" >Roles</h3>

              <div class="overflow-x-auto mt-8 shadow-md">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th colspan="2">Role name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->roles()->get() as $role)
                            <tr>
                                <th>{{$role->name}}</th>
                                @can("delete", $role)
                                    <td>
                                        <x-button class="btn-sm btn-error">Remove</x-button>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>

          </div>

          <!-- Save section -->
          <div class="col-span-6">
              <x-button-group class="mt-8 sm:mt-8 sm:justify-center lg:justify-start">
                <x-button  class="btn-primary" type="submit">
                  Save
                </x-button>
              </x-button-group>
          </div>

        </div>
    </form>
</div>
