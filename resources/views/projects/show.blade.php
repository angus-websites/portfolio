@section('title', $project->name)
@section('description', $project->short_desc)

<x-app-layout bg="bg-base-300">

  @if($project->coming_soon)
    <div class="hero min-h-screen" style="background-image: url({{$project->getCover()}});">
      <div class="hero-overlay bg-opacity-70"></div>
      <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
          <h1 class="mb-5 text-6xl font-bold">Coming soon</h1>
          <p class="mb-5"><b>{{$project->name}}</b> is coming soon, check back later for more details</p>
          <x-link-button href="{{route('projects.index')}}" class="btn btn-primary">Other projects</x-link-button>
          @can('update', $project)
            <br>
            <x-link-button href="{{route('projects.edit', ['project' => $project])}}" class="btn-accent btn-sm my-5">Edit</x-link-button>
          @endcan
        </div>
      </div>
    </div>
  @else
    <section class="container mx-auto">
      @if(!$project->active)
        <div class="alert alert-warning shadow-lg my-8">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
            <span>This project is inactive</span>
          </div>
        </div>
      @endif
      <div class="my-16 mx-auto bg-white rounded-md">
        <div class="lg:w-4/5 p-10">

          <!--Top buttons -->
          <div class="flex flex-row space-x-2 mb-4 items-center">
            <!--Back-->
            <x-link-button href="{{route('projects.index') }}"  class="btn-ghost font-normal">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              <span>Projects</span>
            </x-link-button>

            @can('update', $project)
              <x-link-button href="{{route('projects.edit', ['project' => $project])}}" class="btn-accent btn-sm">Edit</x-link-button>
            @endcan
          </div>
        
          <!--Project details-->
          <div class="flex flex-wrap">
            <!--Image-->
            <img alt="{{$project->name}}" class="lg:w-1/2 w-full lg:h-full h-64 object-cover object-center rounded border" src="{{$project->getImage()}}">
            <!--Details-->
            <div class="lg:w-1/2 w-full lg:pl-10 mt-6 lg:mt-0 flex flex-col">
    
              @if (!is_null($project->logo))
                <!--Project image-->
                <div class="avatar mb-2">
                  <div class="rounded-full w-16 h-16 shadow-md">
                    <img src="{{$project->getLogo()}}" alt="">
                  </div>
                </div> 
              @endif

              <h1 class="text-3xl title-font font-medium mb-1">{{$project->name}}</h1>
              <!--Date-->
              <div class="flex mb-4">
                <span class="flex items-center text-gray-500">
                  @if($project->inProgress())
                    <span class="italic">In Progess</span>
                  @else
                    <span class="">{{$project->dateMadeHuman()}}</span>
                  @endif
                </span>
              </div>
              <p class="leading-relaxed">{{$project->short_desc}}</p>
              @if($project->tags()->count() > 0)

                {{-- Push meta tags to header --}}
                @push('meta')
                    <meta name="keywords" content="{{$project->tags()->get()->pluck('name')->join(',')}}">
                @endpush

                <div class="flex mt-6 items-center pb-5 border-b-2 mb-5 space-x-2">
                  <!--Tags-->
                  @foreach($project->tags()->get() as $tag)
                    <x-tag :colour="$tag->colour" :textcolour="$tag->text_colour">
                      {{$tag->name}}
                    </x-tag>
                  @endforeach
                </div>
              @endif
              <div class="flex-1 flex items-end space-x-2">
                @if(isset($project->git_link))
                  <a target="_blank" href="{{$project->git_link}}" class="btn btn-secondary">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    <span>Github</span>
                  </a>
                @endif

                @if(isset($project->web_link))
                <div>
                  <a target="_blank" href="{{$project->web_link}}" class="btn btn-primary">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 16.057v-3.057h2.994c-.059 1.143-.212 2.24-.456 3.279-.823-.12-1.674-.188-2.538-.222zm1.957 2.162c-.499 1.33-1.159 2.497-1.957 3.456v-3.62c.666.028 1.319.081 1.957.164zm-1.957-7.219v-3.015c.868-.034 1.721-.103 2.548-.224.238 1.027.389 2.111.446 3.239h-2.994zm0-5.014v-3.661c.806.969 1.471 2.15 1.971 3.496-.642.084-1.3.137-1.971.165zm2.703-3.267c1.237.496 2.354 1.228 3.29 2.146-.642.234-1.311.442-2.019.607-.344-.992-.775-1.91-1.271-2.753zm-7.241 13.56c-.244-1.039-.398-2.136-.456-3.279h2.994v3.057c-.865.034-1.714.102-2.538.222zm2.538 1.776v3.62c-.798-.959-1.458-2.126-1.957-3.456.638-.083 1.291-.136 1.957-.164zm-2.994-7.055c.057-1.128.207-2.212.446-3.239.827.121 1.68.19 2.548.224v3.015h-2.994zm1.024-5.179c.5-1.346 1.165-2.527 1.97-3.496v3.661c-.671-.028-1.329-.081-1.97-.165zm-2.005-.35c-.708-.165-1.377-.373-2.018-.607.937-.918 2.053-1.65 3.29-2.146-.496.844-.927 1.762-1.272 2.753zm-.549 1.918c-.264 1.151-.434 2.36-.492 3.611h-3.933c.165-1.658.739-3.197 1.617-4.518.88.361 1.816.67 2.808.907zm.009 9.262c-.988.236-1.92.542-2.797.9-.89-1.328-1.471-2.879-1.637-4.551h3.934c.058 1.265.231 2.488.5 3.651zm.553 1.917c.342.976.768 1.881 1.257 2.712-1.223-.49-2.326-1.211-3.256-2.115.636-.229 1.299-.435 1.999-.597zm9.924 0c.7.163 1.362.367 1.999.597-.931.903-2.034 1.625-3.257 2.116.489-.832.915-1.737 1.258-2.713zm.553-1.917c.27-1.163.442-2.386.501-3.651h3.934c-.167 1.672-.748 3.223-1.638 4.551-.877-.358-1.81-.664-2.797-.9zm.501-5.651c-.058-1.251-.229-2.46-.492-3.611.992-.237 1.929-.546 2.809-.907.877 1.321 1.451 2.86 1.616 4.518h-3.933z"/></svg>
                    <span>Website</span>
                  </a>
                </div>
                @endif
              </div>
            </div>
          </div>

          @if($project->long_desc)
            <!--Description-->
            <div class="mt-16 md:w-1/2">
              <article class="prose prose-sm">
                {!! $project->long_desc !!}
              </article>
            </div>
          @endif
        </div>
      </div>
    </section>

    <!--Blocks-->
    @foreach($project->blocks()->get() as $block)
      @include($block->getPath()) 
    @endforeach
  @endif

</x-app-layout>
