@extends('front.layouts.app')

@section('title', 'Blog')

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
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blog</p>
                </div>
                <h2 class="font-bold text-4xl leading-[45px] text-center">
                    Artikel & Wawasan <br />
                    Seputar Kayu dan Industri
                </h2>
            </div>
        </div>
    </div>

    <div class="reveal container max-w-[1130px] mx-auto mt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @forelse ($blogs as $blog)
                <a href="{{ route('front.blog-detail', $blog->slug) }}" class="card bg-white flex flex-col h-full rounded-[20px] border border-[#E8EAF2] overflow-hidden hover:shadow-[0_10px_30px_0_#BCA18680] hover:border-cp-dark-blue transition-all duration-300">
                    <div class="w-full h-[220px] bg-[#D9D9D9] overflow-hidden border-b border-[#E8EAF2]">
                        @if(!empty($blog->image))
                            <img src="{{ Storage::url($blog->image) }}" class="w-full h-full object-cover object-center" alt="{{ $blog->title }}" />
                        @else
                            <div class="h-full w-full bg-[linear-gradient(135deg,_#F6F7FA_0%,_#EDE7DD_100%)]"></div>
                        @endif
                    </div>
                    <div class="p-[30px] pt-[32px] pb-[32px] flex flex-1 flex-col gap-6 bg-white">
                        <div class="flex items-center justify-between gap-3">
                            @if($blog->published_at)
                                <p class="text-sm text-cp-light-grey">{{ $blog->published_at->format('d/m/Y') }}</p>
                            @else
                                <p class="text-sm text-cp-light-grey">Draf</p>
                            @endif
                            <p class="text-sm text-cp-light-grey">Blog</p>
                        </div>
                        <p class="font-bold text-lg leading-[28px] text-cp-black">{{ $blog->title }}</p>
                        <p class="text-cp-light-grey leading-[26px]">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content ?? ''), 120) }}
                        </p>
                        <div class="mt-auto font-semibold text-cp-dark-blue">Baca Selengkapnya</div>
                    </div>
                </a>
            @empty
                <p>{{ __('Belum ada data') }}</p>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
