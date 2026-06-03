<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            📚 {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Action Buttons --}}
            <div class="flex items-center gap-3 mb-6">
                <x-primary-button tag="a" href="{{ route('book.create') }}">
                    ➕ Tambah Buku
                </x-primary-button>
                <x-primary-button tag="a" href="{{ route('book.print') }}" target="blank">
                    🖨️ Print Data Buku
                </x-primary-button>
            </div>

            {{-- Info jumlah buku --}}
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                Total: <strong>{{ $books->count() }}</strong> buku ditemukan
            </p>

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th class="text-center">Tahun</th>
                            <th>Penerbit</th>
                            <th>Kota</th>
                            <th class="text-center">Cover</th>
                            <th>Rak</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </x-slot>

                    @php $num = 1; @endphp
                    @forelse($books as $book)
                        <tr class="hover:bg-indigo-50 dark:hover:bg-gray-700 transition">
                            <td class="text-center">{{ $num++ }}</td>
                            <td class="font-medium">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td class="text-center">{{ $book->year }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->city }}</td>
                            <td class="text-center">
                                @if($book->cover)
                                    <img src="{{ asset('storage/cover_buku/' . $book->cover) }}"
                                        width="70"
                                        class="rounded shadow-sm border border-gray-200 mx-auto"
                                        alt="Cover {{ $book->title }}"/>
                                @else
                                    <span class="text-xs text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-2 py-1 rounded">
                                    {{ $book->bookshelf->code }}-{{ $book->bookshelf->name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <x-primary-button tag="a" href="{{ route('book.edit', $book->id) }}">
                                        ✏️ Edit
                                    </x-primary-button>
                                    <form action="{{ route('book.delete', $book->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            🗑️ Hapus
                                        </x-danger-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-gray-400 italic py-6">
                                Belum ada data buku.
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </div>

        </div>
    </div>
</x-app-layout>