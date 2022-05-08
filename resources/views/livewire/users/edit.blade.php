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
              <div class="form-control mb-4">
                  <x-label for="section" :value="__('Role')" />
                  <x-select wire:model="user.role_id" error="user.role_id" id="role" name="role_id" class="select-bordered w-full" required>
                    <option disabled="disabled">Choose a role</option>
                    @foreach($roles as $role)
                      <option value="{{$role->id}}">
                        {{$role->name}}
                      </option>
                    @endforeach
                  </x-select>
              </div>
            </div>
          </div>

          <!-- New Password Section -->
          <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
            <h3 class="text-lg font-medium mt-7" >{{$is_create ? "Create" : "Update"}} Password</h3>
            <div class="space-y-4 mt-4">
              <!-- Password -->
              <div class="form-control">
                  <x-label for="newPassword" :value="__('New Password')" />
                  <x-input wire:model="user_new_password"
                              id="newPassword"
                              class="input-bordered"
                              type="password"
                              name="newPassword"
                              error="user_new_password"
                              />
              </div>

              <!-- Password Confirmed -->
              <div class="form-control">
                  <x-label for="newPasswordConfirmed" :value="__('Confirm Password')" />
                  <x-input wire:model="user_new_password_confirmed"
                              id="newPasswordConfirmed"
                              class="input-bordered"
                              type="password"
                              name="newPasswordConfirmed"
                              error="user_new_password_confirmed"
                              />
              </div>
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
