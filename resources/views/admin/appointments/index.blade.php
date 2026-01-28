<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Janji Temu') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($appointments as $appointment)    
                    <div class="item-card grid grid-cols-1 md:grid-cols-[1fr_180px_180px_220px] items-center gap-4">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($appointment->product->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->name }}</h3>
                            </div>
                        </div> 
                        <div class="hidden md:flex flex-col md:justify-self-center">
                            <p class="text-slate-500 text-sm">Anggaran</p>
                            <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($appointment->budget, 0, ',', '.') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col md:justify-self-center">
                            <p class="text-slate-500 text-sm">Tanggal</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $appointment->meeting_at->format('d/m/Y') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3 md:justify-self-end">
                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Detail
                            </a>
                        </div>
                    </div> 
                @empty
                    <p>Belum ada data.</p>
                @endforelse
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

