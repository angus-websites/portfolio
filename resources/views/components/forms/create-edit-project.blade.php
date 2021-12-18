<div class="shadow overflow-hidden sm:rounded-md">
  <div class="px-4 py-5 bg-white sm:p-6">
    
    <div class="grid grid-cols-6 gap-6">
      <!--Image-->
      <div class="col-span-6 sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">
          Project Image
        </label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md file-section">
          <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
              <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <div class="flex justify-center text-sm text-gray-600">
              <label for="image-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <span>Upload an image</span>
                <input id="image-upload" name="imageUpload" type="file" class="sr-only file-upload">
              </label>
            </div>
            <p class="text-xs text-gray-500">
              SVG, PNG, JPG
            </p>

            <p class="pt-4">
              <p class="text-s text-blue-50 p-1 bg-blue-600 text-white rounded-full">
                <span class="p-2 file-name">{{$image}}</span>
              </p>
            </p>

          </div>
        </div>
      </div>

      <!--Logo-->
      <div class="col-span-6 sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">
          Logo Image
        </label>
        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md file-section">
          <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
              <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <div class="flex justify-center text-sm text-gray-600">
              <label for="logo-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <span>Upload an image</span>
                <input id="logo-upload" name="logoUpload" type="file" class="sr-only file-upload">
              </label>
            </div>

            <p class="text-xs text-gray-500">
              SVG, PNG, JPG
            </p>

            <p class="pt-4">
              <p class="text-s text-blue-50 p-1 bg-blue-600 text-white rounded-full">
                <span class="p-2 file-name">{{$logo}}</span>
              </p>
            </p>

          </div>
        </div>
      </div>

      <div class="col-span-6 sm:col-span-3">
        <div class="form-control">
          <x-label for="name" :value="__('Project Name')" />
          <x-input id="project_name" class="input-bordered" type="text" name="name" :value="old('name') ?? $name" required />
        </div>
      </div>

      <!--Date-->
      <div class="col-span-6 sm:col-span-3">
        <div class="form-control">
          <x-label for="date_made" :value="__('Date Created')" />
          <x-input type="date" name="date_made" id="date_made" class="input-bordered" placeholder="day/month/year" :value="old('dateMade') ?? $dateMade" required />
        </div>
      </div>

      <!--Short description-->
      <div class="col-span-6 sm:col-start-1 sm:col-end-4">
        <div class="form-control">
          <x-label for="short_desc" :value="__('Short Description')" />
          <x-input type="text" name="short_desc" id="short_desc" class="input-bordered" :value="old('shortDesc') ?? $shortDesc" />
        </div>
      </div>

      <!--Long description-->
      <div class="col-span-6 sm:col-start-1 sm:col-end-4">
        <div class="form-control">
          <x-label for="longDesc" :value="__('Long Description')" />
          <textarea type="text" name="long_desc" id="long_desc" autocomplete="false" class="textarea h-24 textarea-bordered" >{{old('longDesc') ?? $longDesc}}</textarea>
        </div>
      </div>

      <!--Category-->
      <div class="col-span-6 sm:col-start-1 sm:col-end-4">
        <x-label for="country" :value="__('Category')" />
        <select id="country" name="country" class="select select-bordered w-full max-w-xs" required>
          <option disabled="disabled">Choose a category</option> 
          @foreach($categories as $category)
            <option value="{{$category->id}}" @if($currentCategoryId == $category->id) selected="selected" @endif>
              {{$category->name}}
            </option>
          @endforeach
        </select>
      </div>



      <!--Github checkbox-->
      <div class="col-span-6 sm:col-span-4 flex items-start">
        <div class="flex items-center h-5">
          <input id="has_git" name="has_git" type="checkbox" class="checkbox checkbox-sm toggle_block" {{ isset($gitLink) ? "checked='true'" : "" }}>
        </div>
        <div class="ml-3 text-sm">
          <label for="has_git" class="font-medium text-gray-700">Github Link</label>
          <p class="text-gray-500">Does this project include a public github link?</p>
        </div>
      </div>
      <div class="col-span-6 sm:col-span-3" id="has_git_block" style="{{ isset($gitLink) ? "" : "display: none;" }}">
        <!--Input for git-->
        <div class="form-control">
          <x-label for="git_link" :value="__('Github URL')" />
          <x-input id="git_link" class="input-bordered" type="text" name="git_link" :value="old('gitLink') ?? $gitLink" />
        </div>
      </div>

      <!--Web checkbox-->
      <div class="col-span-6 sm:col-span-4 flex items-start">
        <div class="flex items-center h-5">
          <input id="has_web" name="has_web" type="checkbox" class="checkbox checkbox-sm toggle_block" {{ isset($webLink) ? "checked='true'" : "" }}>
        </div>
        <div class="ml-3 text-sm">
          <label for="has_web" class="font-medium text-gray-700">Website Link</label>
          <p class="text-gray-500">Does this project include a live website link?</p>
        </div>
      </div>
      <div class="col-span-6 sm:col-span-3" id="has_web_block" style="{{ isset($webLink) ? "" : "display: none;" }}">
        <!--Input for Web-->      
        <div class="form-control">
          <x-label for="git_link" :value="__('Website URL')" />
          <x-input id="web_link" class="input-bordered" type="text" name="web_link" :value="old('webLink') ?? $webLink" />
        </div>
      </div>

      <!--Tags-->
      <div class="col-span-6  sm:col-start-1 sm:col-end-4">
        <label class="block text-sm font-medium text-gray-700">Tags</label>
        <!--List the tags-->
        <div class="py-2 flex space-x-1" id="tag-list">
          @foreach($tags as $tag)
            <x-tag :colour="$tag->colour" :textcolour="$tag->text_colour" class="tagParent">
              <!--Close button-->
              <button class="remove-tag-button" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current">   
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
                </svg>
              </button>
              <!--Tag name-->
              {{$tag->name}}
            </x-tag>
          @endforeach
        </div>
        <!--Add new tags-->
        <div class="form-control mt-2">
          <x-input placeholder="Add tags" id="add_tags" autocomplete="false" class="input-bordered" type="text"/>
        </div>
        <div class="my-3">
          <ul id="tag-results" >
          </ul>
        </div>
      </div>

    </div>
  </div>
  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
    <x-button type="submit" class="btn-primary">
      Save
    </x-button>
  </div>
</div>

<script type="text/javascript">
  window.addEventListener("DOMContentLoaded", () => {


    //--------VARIABLES----------





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
    $('.file-section .file-upload').change(function() {
      if ($(this).prop("files").length > 0) {
        $(this).closest(".file-section").find(".file-name").text($(this).prop("files")[0].name);
      }
    });

    //When someone starts typing in tags field
    $("#add_tags").on('keyup', function (event) {
      tagSearch();
    });

    // Attach a delegated event handler (Adding a tag)
    $( "#tag-results" ).on( "click", ".add-tag-button", function( event ) {
      button = $(this);
      name= button.siblings(".buttonText").text();
      console.log("Name is: "+button.children())
      colour = button.attr("backgroundColour");
      textColour = button.attr("textColour");
      addNewTag(name,colour,textColour);

    });

    // Attach a delegated event handler (Removing a tag)
    $( "#tag-list" ).on( "click", ".remove-tag-button", function( event ) {
      var target=$(this).closest('.tagParent');
      target.hide("fast", function(){ target.remove(); });

    });

    /**
     * Will return
     * @return {Boolean} [description]
     */
    function isTagValid(){

    }

    /**
     * Add a tag to the list of 
     * tags for this project
     */
    function addNewTag(name,colour="#000000",textColour="#FFFFFF"){
      //Check the tag is not already in this project
      data=`
      <div class="badge border-0 tagParent" style="color: ${textColour}; background-color: ${colour};">
        <!--Close button-->
        <button type="button" class="remove-tag-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        ${name}
      </div>
      `
      $("#tag-list").append(data);

    }

    /**
     * Display the tag on the screen
     */
    function displayTagResult(name,colour,textColour){
      if (!colour) colour = "#000000";
      if (!textColour) textColour = "#FFFFFF";
      data=
      `
      <div class="badge border-0" style="color: ${textColour}; background-color: ${colour};">
        <!--Add button-->
        <button class="add-tag-button" type="button" textColour="${textColour}" backgroundColour="${colour}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
        </button>
        <span class="buttonText">${name}</span>
      </div>

      `
      //Append
      $("#tag-results").append(data);
    }

    /**
     * Run the ajax search and fetch the
     * tags
     */
    function tagSearch(){
      $("#tag-results").empty();
      $.ajax({
        type:"GET",
        url: '/tagSearch',
        data: {text: $("#add_tags").val()},
        success: function(data) {
          console.log(data);
          for (var i = 0; i < data.length; i++) {
            var current_data=data[i]["name"];
            var colour=data[i]["colour"];
            var textColour=data[i]["text_colour"];
            //Display the data onto the screen
            displayTagResult(current_data,colour,textColour);
          }
        },
        error: function (){
           console.log("Error during ajax request")
        }
      })
    }
  });
</script>
