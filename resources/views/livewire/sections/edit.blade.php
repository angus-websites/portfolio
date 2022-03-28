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

            <form wire:submit.prevent="saveSection">
                <!-- Name -->
                <div class="form-control mb-4">
                    <x-label for="name" :value="__('Section name')" />
                    <x-input wire:model="section.name"
                                id="name"
                                class="input-bordered"
                                type="text"
                                name="name"
                                error="section.name"
                                showgreen="true"
                                required />
                </div>

                <!--Save button -->
                <x-button-group class="mt-5 sm:mt-8 sm:justify-center lg:justify-start">
                  <x-button class="btn btn-primary" type="submit">
                    Save
                  </x-button>
                </x-button-group>

            </form>
        </div>
    </div>
</div>