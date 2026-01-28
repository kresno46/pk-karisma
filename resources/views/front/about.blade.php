@extends('front.layouts.app')

@section('title', 'Tentang')

@section('content')
    <div id="header" class="bg-[#F6F7FA] relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <!-- Navbar -->
            @include('front.layouts.navbar')
            <!-- End Navbar -->
            <div class="reveal flex flex-col gap-[50px] items-center py-20" style="position:relative; z-index:0;">
                @include('front.layouts.header-logo-block')
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Beranda</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Tentang Kami</p>
                </div>
                <h2 class="font-bold text-4xl leading-[45px] text-center">
                    Tentang {{ config('app.name') }} <br />
                    Solusi Kayu Berkualitas & Berkelanjutan
                </h2>
            </div>
        </div>
    </div>

    <div id="Tentang" class="reveal container max-w-[1130px] mx-auto flex flex-col gap-20 mt-20">
        @forelse ($abouts as $about)
            <div class="product flex flex-wrap justify-center items-center gap-[60px] even:flex-row-reverse">
                <div class="w-[470px] h-[550px] flex shrink-0 overflow-hidden">
                    <img src="{{ Storage::url($about->thumbnail) }}" class="w-full h-full object-contain" alt="thumbnail" />
                </div>
                <div class="flex flex-col gap-[30px] py-[50px] h-fit max-w-[500px]">
                    <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">{{ $about->type }}</p>
                    <div class="flex flex-col gap-[10px]">
                        <h2 class="font-bold text-4xl leading-[45px]">{{ $about->name }}</h2>
                        <div class="flex flex-col gap-5">
                            @foreach ($about->keypoints as $keypoint)
                                <div class="flex items-center gap-[10px]">
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="{{ asset('assets/icons/tick-circle.svg') }}" alt="icon" />
                                    </div>
                                    <p class="leading-[26px] font-semibold">{{ $keypoint->keypoint }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>{{ __('Belum ada data') }}</p>
        @endforelse
    </div>

    <div id="Clients" class="reveal container max-w-[1130px] mx-auto flex flex-col justify-center text-center gap-5 mt-20">
        <h2 class="font-bold text-lg">Dipercaya oleh Mitra Industri</h2>
        <div class="logo-container flex flex-wrap gap-5 justify-center">
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-54.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-52.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-55.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-44.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
            <div class="logo-card h-[68px] w-fit flex items-center shrink-0 border border-[#E8EAF2] rounded-[18px] p-4 gap-[10px] bg-white hover:border-cp-dark-blue transition-all duration-300">
                <div class="overflow-hidden h-9">
                    <img src="{{ asset('assets/logo/logo-51.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
            </div>
        </div>
    </div>

    <div id="Stats" class="reveal bg-cp-black w-full mt-20 relative z-1-">
        <div class="container max-w-[1000px] mx-auto py-10">
            <div class="flex flex-wrap items-center justify-between p-[10px]">
                @forelse ($statistics as $statistic)
                    <div class="card w-[200px] flex flex-col items-center gap-[10px] text-center">
                        <div class="w-[55px] h-[55px] flex shrink-0 overflow-hidden">
                            <img src="{{ Storage::url($statistic->icon) }}" class="object-contain w-full h-full" alt="icon" />
                        </div>
                        <p class="text-cp-pale-orange font-bold text-4xl leading-[54px]">{{ $statistic->goal }}</p>
                        <p class="text-cp-light-grey">{{ $statistic->name }}</p>
                    </div>
                @empty
                    <p>{{ __('Belum ada data') }}</p>
                @endforelse
            </div>
        </div>
    </div>

    <div id="Trust" class="reveal container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex flex-wrap gap-6 items-center justify-between">
            <div class="flex flex-col gap-[14px] max-w-[680px]">
                <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">ALASAN MEMILIH KAMI</p>
                <h2 class="font-bold text-4xl leading-[45px]">Solusi Kayu yang Rapi, Cepat, dan Konsisten</h2>
                <p class="text-cp-light-grey leading-[28px]">
                    Kami bantu klien dari kebutuhan kecil sampai skala besar dengan proses yang jelas, komunikasi cepat,
                    dan kualitas yang bisa dipertanggungjawabkan.
                </p>
            </div>
            <a href="{{ route('front.appointment') }}" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white">Minta Penawaran</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
            <div class="card bg-white flex flex-col h-full p-[30px] gap-4 rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[52px] h-[52px] rounded-full bg-[#F6F7FA] flex items-center justify-center">
                    <img src="{{ asset('assets/icons/calendar.svg') }}" class="w-6 h-6 object-contain" alt="icon" />
                </div>
                <p class="font-bold text-xl leading-[30px]">On-time & Terjadwal</p>
                <p class="text-cp-light-grey">Timeline produksi jelas, update rutin, dan pengiriman tepat waktu.</p>
            </div>
            <div class="card bg-white flex flex-col h-full p-[30px] gap-4 rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[52px] h-[52px] rounded-full bg-[#F6F7FA] flex items-center justify-center">
                    <img src="{{ asset('assets/icons/note-favorite.svg') }}" class="w-6 h-6 object-contain" alt="icon" />
                </div>
                <p class="font-bold text-xl leading-[30px]">Quality Control Ketat</p>
                <p class="text-cp-light-grey">Sortir kualitas berlapis agar hasil konsisten sesuai spesifikasi.</p>
            </div>
            <div class="card bg-white flex flex-col h-full p-[30px] gap-4 rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[52px] h-[52px] rounded-full bg-[#F6F7FA] flex items-center justify-center">
                    <img src="{{ asset('assets/icons/monitor-mobbile.svg') }}" class="w-6 h-6 object-contain" alt="icon" />
                </div>
                <p class="font-bold text-xl leading-[30px]">Custom & Fleksibel</p>
                <p class="text-cp-light-grey">Ukuran, finishing, dan kemasan bisa disesuaikan kebutuhan proyek.</p>
            </div>
            <div class="card bg-white flex flex-col h-full p-[30px] gap-4 rounded-[20px] border border-[#E8EAF2] hover:border-cp-dark-blue transition-all duration-300">
                <div class="w-[52px] h-[52px] rounded-full bg-[#F6F7FA] flex items-center justify-center">
                    <img src="{{ asset('assets/icons/dollar-square.svg') }}" class="w-6 h-6 object-contain" alt="icon" />
                </div>
                <p class="font-bold text-xl leading-[30px]">Harga Transparan</p>
                <p class="text-cp-light-grey">Rincian jelas sejak awal agar mudah budgeting dan approval.</p>
            </div>
        </div>
    </div>

    <div id="Location" class="reveal container max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-20">
        <div class="flex flex-wrap items-end justify-between gap-6">
            <div class="flex flex-col gap-3 max-w-[700px]">
                <p class="badge w-fit bg-cp-pale-blue text-cp-light-blue p-[8px_16px] rounded-full uppercase font-bold text-sm">LOKASI KAMI</p>
                <h2 class="font-bold text-4xl leading-[45px]">Kunjungi Workshop & Gudang Kami</h2>
                <p class="text-cp-light-grey leading-[28px]">
                    PT. Karisma Gazebo Rakyat — klik peta untuk navigasi langsung ke lokasi.
                </p>
            </div>
            <a
                href="https://www.google.com/maps/place/PT.Karisma+Gazebo+Rakyat/@-6.3689508,106.7974242,17z"
                class="inline-flex items-center justify-center bg-cp-black px-[16px] py-[10px] w-fit h-auto rounded-lg text-sm font-semibold leading-none text-white"
                target="_blank"
                rel="noopener noreferrer"
            >
                Buka di Google Maps
            </a>
        </div>
        <div class="w-full overflow-hidden rounded-[20px] border border-[#E8EAF2] bg-white">
            <iframe
                title="Peta Lokasi PT. Karisma Gazebo Rakyat"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1938779499424!2d106.79742417586964!3d-6.368950762304182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eff4cbcbf789%3A0xe8859f60dc73e008!2sPT.Karisma%20Gazebo%20Rakyat!5e0!3m2!1sen!2sid!4v1769610807192!5m2!1sen!2sid"
                width="100%"
                height="420"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </div>
@endsection
