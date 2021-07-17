@section('title', 'Edit - '.$project->name)

<x-app-layout>
  <section class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit Project</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{{ route('projects.update',$project->slug) }}}">
          @method('PUT')
          @csrf
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
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload an image</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                      PNG, JPG
                    </p>
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                  <input type="text" name="name" id="project_name" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$project->name}}" required>
                </div>

                <!--Date-->
                <div class="col-span-6 sm:col-span-3">
                  <label for="date_made" class="block text-sm font-medium text-gray-700">Date Created</label>
                  <input type="date" name="date_made" id="date_made" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="day/month/year" value="{{$project->get_date_created()}}" required>
                </div>

                <!--Short description-->
                <div class="col-span-6 sm:col-span-4">
                  <label for="short_desc" class="block text-sm font-medium text-gray-700">Short Description</label>
                  <input type="text" name="short_desc" id="short_desc" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{$project->short_desc}}">
                </div>

                <!--Long description-->
                <div class="col-span-6 sm:col-span-4">
                  <label for="long_desc" class="block text-sm font-medium text-gray-700">Long Description</label>
                  <textarea type="text" name="long_desc" id="long_desc" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$project->long_desc}}</textarea>
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
                    <input id="has_git" name="has_git" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded toggle_block" {{ isset($project->git_link) ? "checked='true'" : "" }}>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="has_git" class="font-medium text-gray-700">Github Link</label>
                    <p class="text-gray-500">Does this project include a public github link?</p>
                  </div>
                </div>
                <div class="col-span-6 sm:col-span-3" id="has_git_block" style="{{ isset($project->git_link) ? "" : "display: none;" }}">
                  <!--Input for git-->
                  <label for="git_url" class="block text-sm font-medium text-gray-700">Github URL</label>
                  <input type="text" name="git_link" id="has_git_input" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($project->git_link) ? $project->git_link : "" }}">
                </div>
                <!--Web checkbox-->
                <div class="col-span-6 sm:col-span-4 flex items-start">
                  <div class="flex items-center h-5">
                    <input id="has_web" name="has_web" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded toggle_block" {{ isset($project->web_link) ? "checked='true'" : "" }}>
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="has_web" class="font-medium text-gray-700">Website Link</label>
                    <p class="text-gray-500">Does this project include a live website link?</p>
                  </div>
                </div>
                <div class="col-span-6 sm:col-span-3" id="has_web_block" style="{{ isset($project->web_link) ? "" : "display: none;" }}">
                  <!--Input for Web-->
                  <label for="web_url" class="block text-sm font-medium text-gray-700">Web URL</label>
                  <input type="text" name="web_link" id="has_web_input" autocomplete="false" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ isset($project->web_link) ? $project->web_link : "" }}">
                </div>


                



              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
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

      //Handle upload TODO update
      $('#image_upload input[type=file]').change(function() {
        if ($(this).prop("files").length > 0) {
          $('#image_upload .file-name').text($(this).prop("files")[0].name);
        }
      });
    });
    
  </script>
</x-app-layout>
