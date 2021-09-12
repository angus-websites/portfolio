<div class="shadow overflow-hidden sm:rounded-md">
  <div class="px-4 py-5 bg-white sm:p-6">
    <!--Image-->
    <div class="mb-3">
      <label class="block text-sm font-medium text-gray-700">
        Project Image
      </label>
      <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
        <div class="space-y-1 text-center">
          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="flex justify-center text-sm text-gray-600">
            <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
              <span>Upload an image</span>
              <input id="image-upload" name="image-upload" type="file" class="sr-only">
            </label>
          </div>
          <p class="text-xs text-gray-500">
            SVG, PNG, JPG
          </p>

          <p class="pt-4">
            <p class="text-s text-blue-50 p-1 bg-blue-600 text-white rounded-full">
              <span class="p-2" id="image-file-name">{{$image}}</span>
            </p>
          </p>

        </div>
      </div>
    </div>
    <div class="grid grid-cols-6 gap-6">
      <div class="col-span-6 sm:col-span-3">
        <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
        <input type="text" name="name" id="project_name" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{old('name') ?? $name}}" required>
      </div>

      <!--Date-->
      <div class="col-span-6 sm:col-span-3">
        <label for="date_made" class="block text-sm font-medium text-gray-700">Date Created</label>
        <input type="date" name="date_made" id="date_made" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="day/month/year" value="{{ old('dateMade') ?? $dateMade}}" required>
      </div>

      <!--Short description-->
      <div class="col-span-6 sm:col-span-4">
        <label for="short_desc" class="block text-sm font-medium text-gray-700">Short Description</label>
        <input type="text" name="short_desc" id="short_desc" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shortDesc') ?? $shortDesc}}">
      </div>

      <!--Long description-->
      <div class="col-span-6 sm:col-span-4">
        <label for="long_desc" class="block text-sm font-medium text-gray-700">Long Description</label>
        <textarea type="text" name="long_desc" id="long_desc" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{old('longDesc') ?? $longDesc}}</textarea>
      </div>

      <!--Category-->
      <div class="col-span-6 sm:col-span-3">
        <label for="country" class="block text-sm font-medium text-gray-700">Category</label>
        <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>



      <!--Github checkbox-->
      <div class="col-span-6 sm:col-span-4 flex items-start">
        <div class="flex items-center h-5">
          <input id="has_git" name="has_git" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded toggle_block" {{ isset($gitLink) ? "checked='true'" : "" }}>
        </div>
        <div class="ml-3 text-sm">
          <label for="has_git" class="font-medium text-gray-700">Github Link</label>
          <p class="text-gray-500">Does this project include a public github link?</p>
        </div>
      </div>
      <div class="col-span-6 sm:col-span-3" id="has_git_block" style="{{ isset($gitLink) ? "" : "display: none;" }}">
        <!--Input for git-->
        <label for="git_url" class="block text-sm font-medium text-gray-700">Github URL</label>
        <input type="text" name="git_link" id="has_git_input" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$gitLink}}">
      </div>

      <!--Web checkbox-->
      <div class="col-span-6 sm:col-span-4 flex items-start">
        <div class="flex items-center h-5">
          <input id="has_web" name="has_web" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded toggle_block" {{ isset($webLink) ? "checked='true'" : "" }}>
        </div>
        <div class="ml-3 text-sm">
          <label for="has_web" class="font-medium text-gray-700">Website Link</label>
          <p class="text-gray-500">Does this project include a live website link?</p>
        </div>
      </div>
      <div class="col-span-6 sm:col-span-3" id="has_web_block" style="{{ isset($webLink) ? "" : "display: none;" }}">
        <!--Input for Web-->
        <label for="web_url" class="block text-sm font-medium text-gray-700">Web URL</label>
        <input type="text" name="web_link" id="has_web_input" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$webLink}}">
      </div>

    </div>
  </div>
  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Save
    </button>
  </div>
</div>

<script type="text/javascript">
  window.addEventListener("DOMContentLoaded", () => {

    //When a checkbox is clicked
    $(".toggle_block").click(function() {
        if($(this).is(":checked")){
          //Show
          $("#"+$(this).attr("id")+"_block").show(200);
          //Make required
          $("#"+$(this).attr("id")+"_input").prop("required",true);
        }else{
          $("#"+$(this).attr("id")+"_block").hide(200);
          $("#"+$(this).attr("id")+"_input").prop("required",false);
        }
    });

    //Handle upload
    $('#image-upload').change(function() {
      if ($(this).prop("files").length > 0) {
        $('#image-file-name').text($(this).prop("files")[0].name);
      }
    });
  });
</script>
