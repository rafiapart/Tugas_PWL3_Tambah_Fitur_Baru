<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ✏️ {{ __('Edit Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                {{-- Header Card --}}
                <div class="bg-indigo-600 px-6 py-4">
                    <p class="text-white text-sm">Perbarui informasi buku di bawah ini dengan data yang benar.</p>
                </div>

                <div class="p-6">
                    <form method="post" action="{{ route('book.update', $books->id) }}" enctype="multipart/form-data" class="mt-2 space-y-5">
                        @csrf
                        @method('patch')

                        {{-- Judul --}}
                        <div class="max-w-xl">
                            <x-input-label for="title" value="📖 Judul Buku"/>
                            <x-text-input id="title" type="text" name="title" class="mt-1 block w-full" value="{{ old('title', $books->title) }}" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        {{-- Penulis --}}
                        <div class="max-w-xl">
                            <x-input-label for="author" value="✍️ Penulis"/>
                            <x-text-input id="author" type="text" name="author" class="mt-1 block w-full" value="{{ old('author', $books->author) }}" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>

                        {{-- Tahun & Kota (2 kolom) --}}
                        <div class="max-w-xl grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="year" value="📅 Tahun Terbit"/>
                                <x-text-input id="year" type="number" name="year" class="mt-1 block w-full" value="{{ old('year', $books->year) }}" required/>
                                <x-input-error class="mt-2" :messages="$errors->get('year')" />
                            </div>
                            <div>
                                <x-input-label for="city" value="🏙️ Kota Terbit"/>
                                <x-text-input id="city" type="text" name="city" class="mt-1 block w-full" value="{{ old('city', $books->city) }}" required/>
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>
                        </div>

                        {{-- Penerbit --}}
                        <div class="max-w-xl">
                            <x-input-label for="publisher" value="🏢 Penerbit"/>
                            <x-text-input id="publisher" type="text" name="publisher" class="mt-1 block w-full" value="{{ old('publisher', $books->publisher) }}" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('publisher')" />
                        </div>

                        {{-- Kategori Rak --}}
                        <div class="max-w-xl">
                            <x-input-label for="bookshelf_id" value="📚 Kategori Rak Buku"/>
                            <x-select-input id="bookshelf_id" name="bookshelf_id" class="mt-1 block w-full" required>
                                <option value="">-- Pilih Rak Buku --</option>
                                @foreach($bookshelves as $key => $value)
                                    <option value="{{ $key }}" {{ old('bookshelf_id', $books->bookshelf_id) == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        {{-- Cover --}}
                        <div class="max-w-xl">
                            <x-input-label for="cover" value="🖼️ Halaman Sampul Depan"/>

                            {{-- Preview cover lama --}}
                            @if ($books->cover)
                                <div class="mt-2 mb-3">
                                    <p class="text-xs text-gray-500 mb-1">Cover saat ini:</p>
                                    <img src="{{ asset('storage/cover_buku/' . $books->cover) }}" width="100" class="rounded border border-gray-300 shadow-sm"/>
                                </div>
                            @endif

                            <x-file-input id="cover" name="cover" class="mt-1 block w-full"/>
                            <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti cover.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>

                        {{-- Tombol --}}
                        <div class="flex items-center gap-3 pt-2 border-t border-gray-200 dark:border-gray-700">
                            <x-secondary-button tag="a" href="{{ route('book') }}">← Batal</x-secondary-button>
                            <x-primary-button name="save_and_create" value="true">💾 Simpan & Buat Baru</x-primary-button>
                            <x-primary-button name="save" value="true">✅ Simpan</x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>