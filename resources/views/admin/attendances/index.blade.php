<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Absensi') }}
            </h2>
            <a href="{{ route('admin.attendances.pdf') }}" class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full">
                Download PDF
            </a>
        </div>
    </x-slot>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
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

                <table id="attendanceTable" class="display w-full">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal</th>
                            <th>Masuk</th>
                            <th>Pulang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->user->name }}</td>
                                <td>{{ $attendance->user->email }}</td>
                                <td>{{ $attendance->work_date->format('d/m/Y') }}</td>
                                <td>{{ $attendance->check_in_at?->timezone(config('app.timezone'))->format('H:i') ?? '-' }}</td>
                                <td>{{ $attendance->check_out_at?->timezone(config('app.timezone'))->format('H:i') ?? '-' }}</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.users.edit', $attendance->user) }}" class="rounded-full bg-indigo-700 px-4 py-2 text-sm font-semibold text-white">
                                            Edit
                                        </a>
                                        <button
                                            type="button"
                                            class="rounded-full bg-red-700 px-4 py-2 text-sm font-semibold text-white"
                                            x-on:click="$dispatch('open-modal', 'confirm-attendance-user-delete-{{ $attendance->id }}')"
                                        >
                                            Hapus
                                        </button>
                                    </div>
                                    <x-modal name="confirm-attendance-user-delete-{{ $attendance->id }}" :show="false" maxWidth="md">
                                        <div class="p-6">
                                            <h2 class="text-lg font-semibold text-gray-900">
                                                Hapus Pengguna
                                            </h2>
                                            <p class="mt-2 text-sm text-gray-600">
                                                Anda yakin ingin menghapus pengguna ini? Aksi ini tidak dapat dibatalkan.
                                            </p>
                                            <div class="mt-6 flex justify-end gap-3">
                                                <button type="button" class="rounded-full px-4 py-2 text-sm font-semibold text-gray-700 border border-gray-200" x-on:click="$dispatch('close-modal', 'confirm-attendance-user-delete-{{ $attendance->id }}')">
                                                    Batal
                                                </button>
                                                <form action="{{ route('admin.users.destroy', $attendance->user) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-full px-4 py-2 text-sm font-semibold text-white bg-red-700">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#attendanceTable').DataTable({
                    order: [[2, 'desc']],
                });
            });
        </script>
    @endpush
</x-app-layout>
