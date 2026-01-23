<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if ($errors->any)
                    @foreach ($errors->all() as $error)
                        <div class="py-3 w-full-rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="title" :value="__('Judul')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $blog->title) }}" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="slug" :value="__('Slug (opsional)')" />
                        <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" value="{{ old('slug', $blog->slug) }}" autocomplete="slug" />
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Konten')" />
                        <textarea name="content" id="content" cols="30" rows="8" class="border border-slate-300 rounded-xl w-full">{{ old('content', $blog->content) }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Gambar (opsional)')" />
                        @if($blog->image)
                            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="rounded-2xl object-cover w-[120px] h-[120px] mb-2" />
                        @endif
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex items-center gap-2">
                        <input
                            id="is_published"
                            type="checkbox"
                            name="is_published"
                            value="1"
                            class="rounded border-slate-300"
                            {{ old('is_published', $blog->is_published) ? 'checked' : '' }}
                        >
                        <x-input-label for="is_published" :value="__('Terbitkan sekarang')" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Perbarui Blog
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
