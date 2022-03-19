
@if($isCollapse() == true)
  <!--Employment collapse-->
  <div class="collapse rounded-lg bg-white collapse-arrow border border-base-300">
    <input type="checkbox" style="height: 100%">
    <div class="collapse-title">
      <div class="flex items-start gap-x-5">
        <!--Image-->
        <div class="flex-none">
          <div class="avatar placeholder">
            <div class="bg-neutral-focus text-neutral-content rounded-full w-10 h-10">
              <span class="text-xl">{{$employer[0]}}</span>
            </div>
          </div>
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
          <article class="prose mt-5">
            {!! $description !!}
          </article>
        </div>
      </div>
    </div>
  </div>
@else
  <!--Employment card-->
  <div class="rounded-lg bg-white border border-base-300 p-5">
    <div class="flex items-start gap-x-5">
      <!--Image-->
      <div class="flex-none">
        <div class="avatar placeholder">
          <div class="bg-neutral-focus text-neutral-content rounded-full w-10 h-10">
            <span class="text-xl">{{$employer[0]}}</span>
          </div>
        </div>
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

