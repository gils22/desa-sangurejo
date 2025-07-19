<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-xl font-bold">Galeri</h1>
                    <p class="text-gray-600">Kelola dokumentasi foto Desa Wisata Sangurejo</p>
                </div>
                <button onclick="toggleTambah()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i>Tambah Foto
                </button>
            </div>

            {{-- Galeri List --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                <div class="border rounded shadow overflow-hidden">
                    <img src="/img/galeri1.jpg" class="w-full h-48 object-cover" alt="Foto Galeri">
                    <div class="p-3 text-sm">
                        <p class="mb-2">Kegiatan outbound pelajar di area kebun edukasi.</p>
                        <div class="flex justify-between">
                            <a href="#" onclick="toggleEdit()" class="text-blue-600 hover:underline"><i class="fas fa-pen mr-1"></i>Edit</a>
                            <button onclick="confirmHapus()" class="text-red-600 hover:underline"><i class="fas fa-trash mr-1"></i>Hapus</button>
                        </div>
                    </div>
                </div>
                {{-- Tambahkan galeri lainnya jika perlu --}}
            </div>
        </main>
    </div>

    <!-- Modal Tambah Foto -->
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-lg relative">
            <h2 class="text-lg font-semibold mb-4">Tambah Foto Galeri</h2>
            <form onsubmit="event.preventDefault(); showSuccess()">
                <input type="file" class="w-full border p-2 rounded mb-3 text-sm" required>
                <textarea placeholder="Deskripsi" rows="3" class="w-full border p-2 rounded mb-3 text-sm" required></textarea>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="toggleTambah()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleTambah()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Modal Edit Foto -->
    <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-lg relative">
            <h2 class="text-lg font-semibold mb-4">Edit Foto Galeri</h2>
            <form onsubmit="event.preventDefault(); showUpdateSuccess()">
                <input type="file" class="w-full border p-2 rounded mb-3 text-sm">
                <textarea placeholder="Deskripsi" rows="3" class="w-full border p-2 rounded mb-3 text-sm" required>Deskripsi saat ini...</textarea>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="toggleEdit()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleEdit()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Konfirmasi Hapus -->
    <div id="confirmHapus" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-md text-center">
            <p class="text-lg font-semibold mb-4">Yakin ingin menghapus foto ini?</p>
            <div class="flex justify-center gap-4">
                <button onclick="hideHapus()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button onclick="showFail()" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Popup -->
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Foto berhasil ditambahkan!
    </div>

    <div id="popupUpdated" class="fixed top-5 right-5 bg-blue-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Foto berhasil diperbarui!
    </div>

    <div id="popupFail" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Foto berhasil dihapus!
    </div>

    <!-- SCRIPT -->
    <script>
        function toggleTambah() {
            const modal = document.getElementById('modalTambah');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function toggleEdit() {
            const modal = document.getElementById('modalEdit');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function confirmHapus() {
            document.getElementById('confirmHapus').classList.remove('hidden');
            document.getElementById('confirmHapus').classList.add('flex');
        }

        function hideHapus() {
            document.getElementById('confirmHapus').classList.add('hidden');
            document.getElementById('confirmHapus').classList.remove('flex');
        }

        function showSuccess() {
            toggleTambah();
            document.getElementById('popupSuccess').classList.remove('hidden');
            setTimeout(() => document.getElementById('popupSuccess').classList.add('hidden'), 3000);
        }

        function showUpdateSuccess() {
            toggleEdit();
            document.getElementById('popupUpdated').classList.remove('hidden');
            setTimeout(() => document.getElementById('popupUpdated').classList.add('hidden'), 3000);
        }

        function showFail() {
            hideHapus();
            document.getElementById('popupFail').classList.remove('hidden');
            setTimeout(() => document.getElementById('popupFail').classList.add('hidden'), 3000);
        }
    </script>

</body>
</html>
