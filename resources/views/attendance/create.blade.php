<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">
                @if (session('status'))
                    <div class="mb-4 rounded-xl bg-green-500 px-4 py-3 text-white">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->has('attendance'))
                    <div class="mb-4 rounded-xl bg-red-500 px-4 py-3 text-white">
                        {{ $errors->first('attendance') }}
                    </div>
                @endif

                <div class="mb-6">
                    <p class="text-sm text-slate-500">Tanggal</p>
                    <p class="text-lg font-semibold text-indigo-950">{{ \Illuminate\Support\Carbon::parse($today, config('app.timezone'))->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <form method="POST" action="{{ route('attendance.store') }}">
                        @csrf
                        <input type="hidden" name="action" value="check_in" />
                        <button
                            type="submit"
                            class="font-bold py-4 px-6 rounded-full text-white {{ $attendance && $attendance->check_in_at ? 'bg-gray-400 cursor-not-allowed' : 'bg-indigo-700' }}"
                            @disabled($attendance && $attendance->check_in_at)
                        >
                            Absen Masuk
                        </button>
                    </form>

                    <form method="POST" action="{{ route('attendance.store') }}">
                        @csrf
                        <input type="hidden" name="action" value="check_out" />
                        <button
                            type="submit"
                            class="font-bold py-4 px-6 rounded-full text-white {{ $attendance && $attendance->check_out_at ? 'bg-gray-400 cursor-not-allowed' : 'bg-indigo-700' }}"
                            @disabled($attendance && $attendance->check_out_at)
                        >
                            Absen Pulang
                        </button>
                    </form>
                </div>

                <div class="mt-6 text-sm text-slate-500">
                    <p>Masuk: {{ $attendance?->check_in_at?->timezone(config('app.timezone'))->format('H:i') ?? '-' }}</p>
                    <p>Pulang: {{ $attendance?->check_out_at?->timezone(config('app.timezone'))->format('H:i') ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
