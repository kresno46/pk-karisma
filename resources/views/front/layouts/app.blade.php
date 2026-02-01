<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Beranda') - {{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('assets/logo/logo.svg') }}" type="image/svg+xml" />
        <meta name="description" content="@yield('meta_description', '')" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/output.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        <!-- CSS for carousel/flickity-->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css" />

        <!-- CSS for modal/flowbite -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" /> -->
        <style>
            .reveal {
                opacity: 0;
                transform: translateY(16px);
                transition: opacity 600ms ease, transform 600ms ease;
            }
            .reveal.is-visible {
                opacity: 1;
                transform: translateY(0);
            }
            .reveal-delay-1 { transition-delay: 120ms; }
            .reveal-delay-2 { transition-delay: 240ms; }
            .reveal-delay-3 { transition-delay: 360ms; }
        </style>
    </head>
    <body class="font-poppins text-cp-black">
        <!-- Content -->
        @yield('content')
        <!-- EndContent -->

        <style>
            @keyframes wa-pulse {
                0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5); }
                70% { box-shadow: 0 0 0 16px rgba(37, 211, 102, 0); }
                100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
            }
            .wa-float-animate {
                animation: wa-pulse 2.2s ease-out infinite;
            }
        </style>

        <a
            href="https://wa.me/6282310384866?text=Halo%2C%20saya%20mau%20tanya%20tentang%20pembuatan%20gazebo"
            class="z-50 flex items-center justify-center wa-float-animate"
            style="position:fixed;bottom:24px;right:24px;width:56px;height:56px;background:#25D366;border-radius:9999px;box-shadow:0 12px 30px rgba(0,0,0,0.2);border:2px solid #fff;"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="WhatsApp"
        >
            <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" class="h-7 w-7" />
        </a>

        <!-- Footer -->
        @include('front.layouts.footer')
        <!-- End Footer -->

        <!-- Scripts -->
        @stack('scripts')
        <script>
            (function () {
                var items = document.querySelectorAll('.reveal');
                if (!('IntersectionObserver' in window) || items.length === 0) {
                    items.forEach(function (el) { el.classList.add('is-visible'); });
                    return;
                }
                var observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15 });
                items.forEach(function (el) { observer.observe(el); });
            })();
        </script>
        <!-- End Scripts -->
    </body>
</html>
