
@if($isCollapse() == true)
  <!--Education collapse-->
  <div class="collapse rounded-lg bg-white collapse-arrow border border-base-300">
    <input type="checkbox" class="h-full">
    <div class="collapse-title">
      <div class="flex items-start gap-x-5">
        <!--Image-->
        <div class="flex-none">
          <div class="avatar placeholder">
            <div class="bg-neutral-focus text-neutral-content rounded-full w-10 h-10">
              <span class="text-xl">{{$institute[0]}}</span>
            </div>
          </div>
        </div>
        <!--Small details-->
        <div class="flex-1">
          <div class="text-left">
            <p class="text-lg font-extrabold">{{$institute}}</p>
            <p class="text-sm font-medium text-accent">{{$level}}</p>
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
          <article class="prose prose-sm mt-5">
            {!!$description!!}
          </article>
        </div>
      </div>
    </div>
  </div>
@else
  <!--Education card-->
  <div class="rounded-lg bg-white border border-base-300 p-5">
    <div class="flex items-start gap-x-5">
      <!--Image-->
      <div class="flex-none">
        <div class="avatar placeholder">
          <div class="bg-neutral-focus text-neutral-content rounded-full w-10 h-10">
            <span class="text-xl">{{$institute[0]}}</span>
          </div>
        </div>
      </div>
      <!--Content-->
      <div class="flex-1">
        <div class="text-left">
          <p class="text-lg font-extrabold">{{$institute}}</p>
          <p class="text-sm font-medium text-accent">{{$level}}</p>
          <p class="text-sm font-light text-opacity-60">{{$start_date}} - {{$end_date}}</p>
        </div>
      </div>
    </div>
  </div>
@endif

