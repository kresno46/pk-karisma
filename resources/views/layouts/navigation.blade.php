<div x-data="{ open: false }">
    <div class="sticky top-0 z-40 flex h-16 items-center justify-between border-b border-gray-200 bg-white px-4 sm:hidden">
        <button @click="open = true" class="inline-flex items-center justify-center rounded-md p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <x-application-logo class="block h-8 w-auto" />
            <span class="text-sm font-semibold text-gray-700">Admin</span>
        </a>
        <div class="relative ml-auto" x-data="{ openUser: false }">
            <button type="button" class="inline-flex items-center gap-2 rounded-full border border-gray-200 px-3 py-1 text-sm font-semibold text-gray-700" @click="openUser = !openUser">
                <span class="h-6 w-6 overflow-hidden rounded-full bg-gray-100">
                    @if (Auth::user()->profile_photo_path)
                        <img src="{{ Storage::url(Auth::user()->profile_photo_path) }}" alt="Foto profil" class="h-full w-full object-cover" />
                    @endif
                </span>
                <span>{{ Auth::user()->name }}</span>
                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="openUser" @click.outside="openUser = false" class="absolute right-0 mt-2 w-56 rounded-lg border border-gray-200 bg-white shadow-lg">
                <div class="border-b border-gray-100 px-4 py-3 text-sm text-gray-700">
                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                    {{ __('Profil') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                        {{ __('Keluar') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div x-show="open" class="fixed inset-0 z-40 bg-black/50 sm:hidden" @click="open = false"></div>

    <aside
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-gray-200 bg-white transition-transform duration-200 sm:translate-x-0"
    >
        <div class="flex h-16 items-center gap-3 border-b border-gray-200 px-4">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <x-application-logo class="block h-9 w-auto" />
                <span class="text-sm font-semibold text-gray-700">{{ config('app.name') }}</span>
            </a>
            <button @click="open = false" class="ms-auto inline-flex items-center justify-center rounded-md p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700 sm:hidden">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav x-data="{ sections: { main: true, content: true, settings: true, attendance: true } }" class="flex-1 space-y-2 overflow-y-auto p-4">
            <a
                href="{{ route('dashboard') }}"
                class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
            >
                <span>{{ __('Dasbor') }}</span>
            </a>

            @canany(['Kelola Bagian Hero', 'Kelola Prinsip', 'Kelola Statistik'])
                <button type="button" class="flex w-full items-center justify-between pt-4 text-xs font-semibold uppercase tracking-wide text-gray-400" @click="sections.main = !sections.main">
                    <span>Halaman Utama</span>
                    <span x-text="sections.main ? '–' : '+'"></span>
                </button>
                <div class="space-y-1" x-show="sections.main">
                    @can('Kelola Bagian Hero')
                        <a
                            href="{{ route('admin.hero-sections.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.hero-sections.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Bagian Hero') }}
                        </a>
                    @endcan
                    @can('Kelola Prinsip')
                        <a
                            href="{{ route('admin.principles.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.principles.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Prinsip Kami') }}
                        </a>
                    @endcan
                    @can('Kelola Statistik')
                        <a
                            href="{{ route('admin.statistics.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.statistics.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Statistik Perusahaan') }}
                        </a>
                    @endcan
                </div>
            @endcanany

            @canany(['Kelola Tim', 'Kelola Produk', 'Kelola Testimoni', 'Kelola Klien', 'Kelola Blog', 'Kelola Tentang', 'Kelola Janji Temu'])
                <button type="button" class="flex w-full items-center justify-between pt-4 text-xs font-semibold uppercase tracking-wide text-gray-400" @click="sections.content = !sections.content">
                    <span>Konten</span>
                    <span x-text="sections.content ? '–' : '+'"></span>
                </button>
                <div class="space-y-1" x-show="sections.content">
                    @can('Kelola Tim')
                        <a
                            href="{{ route('admin.teams.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.teams.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Tim Kami') }}
                        </a>
                    @endcan
                    @can('Kelola Produk')
                        <a
                            href="{{ route('admin.products.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.products.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Produk Kami') }}
                        </a>
                    @endcan
                    @can('Kelola Testimoni')
                        <a
                            href="{{ route('admin.testimonials.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.testimonials.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Testimoni') }}
                        </a>
                    @endcan
                    @can('Kelola Klien')
                        <a
                            href="{{ route('admin.clients.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.clients.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Klien Kami') }}
                        </a>
                    @endcan
                    @can('Kelola Blog')
                        <a
                            href="{{ route('admin.blogs.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.blogs.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Blog') }}
                        </a>
                    @endcan
                    @can('Kelola Tentang')
                        <a
                            href="{{ route('admin.abouts.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.abouts.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Tentang') }}
                        </a>
                    @endcan
                    @can('Kelola Janji Temu')
                        <a
                            href="{{ route('admin.appointments.index') }}"
                            class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.appointments.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                        >
                            {{ __('Janji Temu') }}
                        </a>
                    @endcan
                </div>
            @endcanany

            @can('Kelola Pengguna')
                <button type="button" class="flex w-full items-center justify-between pt-4 text-xs font-semibold uppercase tracking-wide text-gray-400" @click="sections.settings = !sections.settings">
                    <span>Pengaturan</span>
                    <span x-text="sections.settings ? '–' : '+'"></span>
                </button>
                <div class="space-y-1" x-show="sections.settings">
                    <a
                        href="{{ route('admin.users.index') }}"
                        class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.users.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                    >
                        {{ __('Pengguna') }}
                    </a>
                </div>
            @endcan

            @role('super_admin')
                <button type="button" class="flex w-full items-center justify-between pt-4 text-xs font-semibold uppercase tracking-wide text-gray-400" @click="sections.attendance = !sections.attendance">
                    <span>Absensi</span>
                    <span x-text="sections.attendance ? '–' : '+'"></span>
                </button>
                <div class="space-y-1" x-show="sections.attendance">
                    <a
                        href="{{ route('admin.attendances.index') }}"
                        class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.attendances.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                    >
                        {{ __('Data Absensi') }}
                    </a>
                </div>
            @endrole

            @role('user')
                <button type="button" class="flex w-full items-center justify-between pt-4 text-xs font-semibold uppercase tracking-wide text-gray-400" @click="sections.attendance = !sections.attendance">
                    <span>Absensi</span>
                    <span x-text="sections.attendance ? '–' : '+'"></span>
                </button>
                <div class="space-y-1" x-show="sections.attendance">
                    <a
                        href="{{ route('attendance.create') }}"
                        class="flex items-center gap-3 rounded-lg border px-3 py-2 text-sm font-medium {{ request()->routeIs('attendance.*') ? 'border-amber-200 bg-amber-50 text-amber-900' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                    >
                        {{ __('Absen Hari Ini') }}
                    </a>
                </div>
            @endrole
        </nav>

        <div class="border-t border-gray-200 p-4 text-xs text-gray-400">
            <span>PK-Karisma Admin</span>
        </div>
    </aside>
</div>
