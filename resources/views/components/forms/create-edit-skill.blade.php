<div class="container px-5 my-10 mx-auto">
  <div class="grid grid-cols-6">
    <div class="col-span-6 md:col-span-3 lg:col-span-2">
        <!-- Name -->
        <div class="form-control mb-4">
            <x-label for="name" :value="__('Skill name')" />
            <x-input id="name" class="input-bordered"
                          type="text"
                          name="name"
                          :value="old('name') ?? $name"
                          required />
        </div>
        <!-- Description -->
        <div class="form-control mb-4">
            <x-label for="description" :value="__('Skill description')" />
            <textarea type="text" name="description" id="description" autocomplete="false" class="textarea h-24 textarea-bordered" >{{old("description") ?? $description}}</textarea>
        </div>

      <div class="mt-8 text-center md:text-left">
        <x-button class="btn-success btn-sm md:btn-md">Save</x-button>
      </div>
    </div>
  </div>
</div>
