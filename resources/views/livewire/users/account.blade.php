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


    <form wire:submit.prevent="updateAccount">
        <div class="grid grid-cols-6">

            <!-- Basic details section -->
            <div class="col-span-6 md:col-span-4 lg:col-span-3 2xl:col-span-2">
                <div class="space-y-8">

                  <!-- Email -->
                  <div class="form-control">
                      <x-label for="email" :value="__('Email')" />
                      <x-input    value="{{$user_email}}"
                                  autofocus
                                  id="email"
                                  class="input-bordered"
                                  type="email"
                                  disabled
                                    />
                  </div>

                  <!-- Current Password -->
                  <div class="form-control">
                      <x-label for="current-password" :value="__('Current Password')" />
                      <x-input  wire:model="current_password"    
                                id="current_password"
                                class="input-bordered"
                                type="password"
                                name="current_password"
                                error="current_password"
                                    />
                  </div>

                  <!-- New Password -->
                  <div class="form-control">
                      <x-label for="new_password" :value="__('New Password')" />
                      <x-input  wire:model="new_password"   
                                id="new_password"
                                class="input-bordered"
                                type="password"
                                    />
                  </div>

                  <!-- Confirm -->
                  <div class="form-control">
                      <x-label for="new_password_confirmed" :value="__('Confirm Password')" />
                      <x-input  wire:model="new_password_confirmed"  
                                id="new_password_confirmed"
                                class="input-bordered"
                                error="new_password_confirmed"
                                type="password"
                                    />
                  </div>

                  <!-- Save -->
                  <x-button-group class="sm:justify-center lg:justify-start">
                      <x-button  class="btn-primary" type="submit">
                        Save
                      </x-button>
                  </x-button-group>

                </div>
            </div>

        </div>
      
    </form>

</div>
