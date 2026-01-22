<footer class="bg-cp-black w-full relative overflow-hidden mt-20">
    <div class="container max-w-[1130px] mx-auto flex flex-wrap gap-y-4 items-center justify-between pt-[100px] pb-[220px] relative z-10">
        <div class="flex flex-col gap-10">
            <div class="flex items-center gap-3">
                <div class="flex shrink-0 h-[43px] overflow-hidden">
                    <img src="{{ asset('assets/logo/logo-white.svg') }}" class="object-contain w-full h-full" alt="logo" />
                </div>
                <div class="flex flex-col">
                    <p id="CompanyName" class="font-extrabold text-xl leading-[30px] text-white">{{ config('app.name') }}</p>
                    <p id="CompanyTagline" class="text-sm text-cp-light-grey">{{ config('company.tagline') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="#">
                    <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/icons/youtube.svg') }}" class="w-full h-full object-contain" alt="youtube" />
                    </div>
                </a>
                <a href="#">
                    <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/icons/whatsapp.svg') }}" class="w-full h-full object-contain" alt="whatsapp" />
                    </div>
                </a>
                <a href="#">
                    <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/icons/facebook.svg') }}" class="w-full h-full object-contain" alt="facebook" />
                    </div>
                </a>
                <a href="#">
                    <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/icons/instagram.svg') }}" class="w-full h-full object-contain" alt="instagram" />
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-wrap gap-[50px]">
            <div class="flex flex-col w-[200px] gap-3">
                <p class="font-bold text-lg text-white">Produk</p>
                <a href="{{ route('front.products') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Kayu Olahan</a>
                <a href="{{ route('front.products') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Plywood</a>
                <a href="{{ route('front.products') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Decking</a>
                <a href="{{ route('front.products') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Pallet & Kemasan</a>
            </div>
            <div class="flex flex-col w-[200px] gap-3">
                <p class="font-bold text-lg text-white">Perusahaan</p>
                <a href="{{ route('front.about') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Tentang Kami</a>
                <a href="{{ route('front.teams') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Tim</a>
                <a href="{{ route('front.about') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Visi & Misi</a>
                <a href="{{ route('front.about') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Komitmen Keberlanjutan</a>
            </div>
            <div class="flex flex-col w-[200px] gap-3">
                <p class="font-bold text-lg text-white">Tautan</p>
                <a href="{{ route('front.blogs') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Blog</a>
                <a href="{{ route('front.appointment') }}" class="text-cp-light-grey hover:text-white transition-all duration-300">Kontak</a>
                <a href="#" class="text-cp-light-grey hover:text-white transition-all duration-300">Kebijakan Privasi</a>
                <a href="#" class="text-cp-light-grey hover:text-white transition-all duration-300">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
    <div class="absolute -bottom-[135px] w-full">
        <p class="font-extrabold text-[250px] leading-[375px] text-center text-white opacity-5">PK KARISMA</p>
    </div>
</footer>
