<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Blog') }}
            </h2>
            <a href="{{ route('admin.blogs.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($blogs as $blog)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 overflow-hidden rounded-xl bg-slate-100">
                                @if($blog->image)
                                    <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover" />
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $blog->title }}</h3>
                                <p class="text-sm text-slate-500">{{ $blog->slug }}</p>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Status</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $blog->is_published ? 'Terbit' : 'Draf' }}
                            </h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Tanggal</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{ $blog->published_at ? $blog->published_at->format('d/m/Y') : '-' }}
                            </h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Ubah
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data.</p>
                @endforelse

                <div>
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
