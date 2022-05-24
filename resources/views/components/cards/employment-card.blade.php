
@if($isCollapse() == true)
  <!--Employment collapse-->
  <div class="collapse rounded-lg bg-base-200 collapse-arrow border">
    <input aria-hidden="true" tabindex="-1" type="checkbox" class="h-full"> 
    <div class="collapse-title">
      <div class="flex items-start space-x-5">
        <!--Image-->
        <div class="flex-none">

          @if($icon)
            <div class="avatar">
              <div class="rounded-full w-10 h-10 border">
                <img src="{{$icon}}" />
              </div>
            </div>  
          @else
            <div class="avatar placeholder">
              <div class="bg-neutral-focus text-neutral-content rounded-full w-10">
                <span class="text-xl">{{$employer[0] ?? "?"}}</span>
              </div>
            </div>
          @endif
        </div>
        <!--Small details-->
        <div class="flex-1">
          <div class="text-left">
            <p class="text-lg font-extrabold">{{$employer}}</p>
            <p class="text-sm font-medium text-accent">{{$role}}</p>
            <p class="text-sm font-light text-opacity-60">{{$start_date}} - {{$end_date}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse-content">
      <div class="flex items-start gap-x-5">
        <div class="w-10"></div>
        <div class="text-left text-sm text-base-content flex-1">
          <hr>
          <article class="prose mt-5 prose-sm">
            {!! $description !!}
          </article>
        </div>
      </div>
    </div>
  </div>
@else
  <!--Employment card-->
  <div class="rounded-lg bg-base-200 border p-5">
    <div class="flex items-start space-x-5">
      <!--Image-->
      <div class="flex-none">
        @if($icon)
          <div class="avatar">
            <div class="rounded-full w-10 h-10 border">
              <img src="{{$icon}}" />
            </div>
          </div>  
        @else
          <div class="avatar placeholder">
            <div class="bg-neutral-focus text-neutral-content rounded-full w-10">
              <span class="text-xl">{{$employer[0]}}</span>
            </div>
          </div>
        @endif
      </div>
      <!--Content-->
      <div class="flex-1">
        <div class="text-left">
          <p class="text-lg font-extrabold">{{$employer}}</p>
          <p class="text-sm font-medium text-accent">{{$role}}</p>
          <p class="text-sm font-light text-opacity-60">{{$start_date}} - {{$end_date}}</p>
        </div>
      </div>
    </div>
  </div>
@endif

