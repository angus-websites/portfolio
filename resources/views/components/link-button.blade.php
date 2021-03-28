<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs tracking-widest cursor-pointer focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
  <span class="mx-auto">
    {{ $slot }}
  </span>
</a>
