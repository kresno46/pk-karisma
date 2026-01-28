<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Pengguna') }}
            </h2>
            <a href="{{ route('admin.users.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Tambah Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @if ($errors->has('user'))
                    <div class="mb-4 rounded-xl bg-red-500 px-4 py-3 text-white">
                        {{ $errors->first('user') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="mb-4 rounded-xl bg-green-500 px-4 py-3 text-white">
                        {{ session('status') }}
                    </div>
                @endif

                @forelse ($users as $user)
                    <div class="item-card grid grid-cols-1 md:grid-cols-[1fr_180px_220px] items-center gap-4">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $user->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $user->email }}</p>
                        </div>
                        <div class="hidden md:flex flex-col md:justify-self-center">
                            <p class="text-slate-500 text-sm">Role</p>
                            <p class="text-indigo-950 text-base font-semibold">
                                {{ $user->roles->pluck('name')->join(', ') ?: '—' }}
                            </p>
                        </div>
                        <div class="hidden md:flex items-center gap-3 md:justify-self-end">
                            <a href="{{ route('admin.users.edit', $user) }}" class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <button
                                type="button"
                                class="font-bold py-3 px-5 bg-red-700 text-white rounded-full"
                                x-on:click="$dispatch('open-modal', 'confirm-user-delete-{{ $user->id }}')"
                            >
                                Hapus
                            </button>
                        </div>
                    </div>
                    <x-modal name="confirm-user-delete-{{ $user->id }}" :show="false" maxWidth="md">
                        <div class="p-6">
                            <h2 class="text-lg font-semibold text-gray-900">
                                Hapus Pengguna
                            </h2>
                            <p class="mt-2 text-sm text-gray-600">
                                Anda yakin ingin menghapus pengguna ini? Aksi ini tidak dapat dibatalkan.
                            </p>
                            <div class="mt-6 flex justify-end gap-3">
                                <button type="button" class="rounded-full px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-200" x-on:click="$dispatch('close-modal', 'confirm-user-delete-{{ $user->id }}')">
                                    Batal
                                </button>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full px-4 py-2 text-sm font-semibold text-white bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </x-modal>
                @empty
                    <p>Belum ada data.</p>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>


