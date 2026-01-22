<nav class="flex flex-wrap items-center justify-between bg-white p-[20px_30px] rounded-[20px] gap-y-3">
    <div class="flex items-center gap-1">
        <div class="flex shrink-0 h-[52px] w-[52px] overflow-hidden">
            <img src="{{ asset('assets/logo/logo.svg') }}" class="object-contain w-full h-full" alt="logo" />
        </div>
        <div class="flex flex-col">
            <p id="CompanyNama" class="font-extrabold text-xl leading-[30px]">{{ config('app.name') }}</p>
            <p id="CompanySlogan" class="text-sm text-cp-light-grey">{{ config('company.tagline') }}</p>
        </div>
    </div>
    <ul class="flex flex-wrap items-center gap-[30px]">
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 {{ request()->routeIs('front.index') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.index') }}">Beranda</a>
        </li>
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 {{ request()->routeIs('front.products') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.products') }}">Produk</a>
        </li>
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 {{ request()->routeIs('front.teams') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.teams') }}">Perusahaan</a>
        </li>
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 {{ request()->routeIs('front.blogs') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.blogs') }}">Blog</a>
        </li>
        <li class="font-semibold hover:text-cp-dark-blue transition-all duration-300 {{ request()->routeIs('front.about') ? 'text-cp-dark-blue' : '' }}">
            <a href="{{ route('front.about') }}">Tentang</a>
        </li>
    </ul>
    <a href="{{ route('front.appointment') }}" class="bg-cp-dark-blue p-[14px_20px] w-fit rounded-xl hover:shadow-[0_12px_30px_0_#312ECB66] transition-all duration-300 font-bold text-white">Minta Penawaran</a>
</nav>
