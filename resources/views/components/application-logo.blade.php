@php
  $variant = $attributes->get('data-variant');
  $strokeColor = $variant === 'white' ? '#FFFFFF' : '#0F172A';
@endphp
<span {{ $attributes->merge([
    'class' => 'relative inline-block',
    'style' => 'width:52px; height:52px;',
    'role' => 'img',
    'aria-label' => config('app.name', 'Logo'),
]) }}>
  <svg width="52" height="52" viewBox="0 0 55 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full">
    <g>
      <path d="M27.5 4.5L6.5 21.5H48.5L27.5 4.5Z" stroke="{{ $strokeColor }}" stroke-width="2.8" stroke-linejoin="round"/>
      <path d="M27.5 9.5L12.3 21.5" stroke="{{ $strokeColor }}" stroke-width="2.2" stroke-linecap="round"/>
      <path d="M27.5 9.5L42.7 21.5" stroke="{{ $strokeColor }}" stroke-width="2.2" stroke-linecap="round"/>

      <path d="M6 29.2C13.2 23.8 20.2 22.2 27.5 22.2C34.8 22.2 41.8 23.8 49 29.2" stroke="{{ $strokeColor }}" stroke-width="4.2" stroke-linecap="round"/>

      <path d="M27.5 26.8L18.2 43H36.8L27.5 26.8Z" fill="#E11D48"/>
      <path d="M27.5 30.1L21.1 41.3H24.2L27.5 35.6L30.8 41.3H33.9L27.5 30.1Z" fill="#BE123C"/>
    </g>
  </svg>
  <img
    src="{{ asset('assets/logo/logo-kayu.png') }}"
    alt=""
    aria-hidden="true"
    class="absolute"
    style="left:0%; top:62.5%; width:100%; height:46%; object-fit:contain; transform:scaleX(1.15); transform-origin:center;"
  />
</span>
