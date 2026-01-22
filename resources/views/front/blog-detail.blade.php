@extends('front.layouts.app')

@section('title', ($blog->meta_title ?? $blog->title) ?: 'Blog')
@section('meta_description', $blog->meta_description ?? '')

@section('content')
    <div id="header" class="bg-[#F6F7FA] relative">
        <div class="container max-w-[1130px] mx-auto relative pt-10 z-10">
            <!-- Navbar -->
            @include('front.layouts.navbar')
            <!-- End Navbar -->
            <div class="flex flex-col gap-[50px] items-center py-20">
                <div class="breadcrumb flex items-center justify-center gap-[30px]">
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Beranda</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">Blog</p>
                    <span class="text-cp-light-grey">/</span>
                    <p class="text-cp-light-grey last-of-type:text-cp-black last-of-type:font-semibold">{{ $blog->title }}</p>
                </div>
                <h1 class="font-bold text-4xl leading-[45px] text-center">{{ $blog->title }}</h1>
                @if($blog->published_at)
                    <p class="text-cp-light-grey">Dipublikasikan pada {{ $blog->published_at->format('d M Y') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container max-w-[1130px] mx-auto mt-20">
        <div class="bg-white rounded-[20px] border border-[#E8EAF2] overflow-hidden">
            @if(!empty($blog->image))
                <div class="w-full h-[320px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ Storage::url($blog->image) }}" class="w-full h-full object-cover object-center" alt="{{ $blog->title }}" />
                </div>
            @endif

            <div class="p-[30px]">
                <div class="leading-[30px] text-cp-black">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>

        <div class="mt-10">
            <a href="{{ route('front.blogs') }}" class="bg-cp-black p-[14px_20px] w-fit rounded-xl font-bold text-white inline-flex items-center gap-[10px]">
                <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                    <img src="{{ asset('assets/icons/arrow-circle-down.svg') }}" class="w-full h-full object-contain rotate-90" alt="icon" />
                </div>
                <span>Kembali ke Blog</span>
            </a>
        </div>
    </div>
@endsection
