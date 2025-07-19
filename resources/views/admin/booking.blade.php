<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola data booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    @include('components.admin.sidebar')
    <div class="flex-1 flex flex-col">
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <h1 class="text-2xl font-semibold mb-1">Kelola Data Booking</h1>
            <p class="text-gray-600 mb-6">Edit atau Perbarui Data Booking Desa Wisata Sangurejo</p>

            <div class="bg-white p-4 rounded shadow overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Nama Paket</th>
                            <th class="px-4 py-3">Deskripsi</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-t">
                            <td class="px-4 py-3">Paket Makrab</td>
                            <td class="px-4 py-3 whitespace-pre-line">
                                Nama: Aulia<br>
                                No WhatsApp: 0823123123<br>
                                Email: aulia@gmail.com<br>
                                Alamat: Bantul<br>
                                Tanggal Booking: 2025-07-01<br>
                                Jumlah Peserta: 50<br>
                                Catatan: -
                            </td>
                            <td class="px-4 py-3 space-x-3">
                                <button onclick="toggleEdit()" class="text-blue-600"><i class="fas fa-pen"></i></button>
                                <button onclick="confirmHapus()" class="text-red-600"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <button onclick="toggleTambah()" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                    Tambah Data
                </button>
            </div>
        </main>
    </div>

    <!-- Modal Tambah -->
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-xl relative">
            <h2 class="text-lg font-semibold mb-4">Tambah Booking</h2>
            <form onsubmit="event.preventDefault(); showSuccess('Tambah'); toggleTambah();">
                <input type="text" placeholder="Nama Paket" class="w-full border p-2 rounded mb-2" required>
                <input type="text" placeholder="Nama" class="w-full border p-2 rounded mb-2" required>
                <input type="text" placeholder="No WhatsApp" class="w-full border p-2 rounded mb-2" required>
                <input type="email" placeholder="Email" class="w-full border p-2 rounded mb-2" required>
                <input type="text" placeholder="Alamat" class="w-full border p-2 rounded mb-2" required>
                <input type="date" class="w-full border p-2 rounded mb-2" required>
                <input type="number" placeholder="Jumlah Peserta" class="w-full border p-2 rounded mb-2" required>
                <textarea placeholder="Catatan" class="w-full border p-2 rounded mb-2"></textarea>
                <div class="text-right mt-4">
                    <button type="button" onclick="toggleTambah()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleTambah()"><i class="fas fa-times"></i></button>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-xl relative">
            <h2 class="text-lg font-semibold mb-4">Edit Booking</h2>
            <form onsubmit="event.preventDefault(); showSuccess('Edit'); toggleEdit();">
                <input type="text" value="Paket Makrab" class="w-full border p-2 rounded mb-2">
                <input type="text" value="Aulia" class="w-full border p-2 rounded mb-2">
                <input type="text" value="0823123123" class="w-full border p-2 rounded mb-2">
                <input type="email" value="aulia@gmail.com" class="w-full border p-2 rounded mb-2">
                <input type="text" value="Bantul" class="w-full border p-2 rounded mb-2">
                <input type="date" value="2025-07-01" class="w-full border p-2 rounded mb-2">
                <input type="number" value="50" class="w-full border p-2 rounded mb-2">
                <textarea class="w-full border p-2 rounded mb-2">-</textarea>
                <div class="text-right mt-4">
                    <button type="button" onclick="toggleEdit()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleEdit()"><i class="fas fa-times"></i></button>
        </div>
    </div>

    <!-- Konfirmasi Hapus -->
    <div id="confirmHapus" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow text-center w-full max-w-md">
            <p class="text-lg font-semibold mb-4">Yakin ingin menghapus data ini?</p>
            <div class="flex justify-center gap-4">
                <button onclick="hideHapus()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button onclick="showFail()" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Data berhasil disimpan!
    </div>
    <div id="popupFail" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Data berhasil dihapus!
    </div>

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

        function showSuccess(action = 'Tambah') {
            document.getElementById('popupSuccess').textContent = `Data berhasil di${action.toLowerCase()}!`;
            document.getElementById('popupSuccess').classList.remove('hidden');
            setTimeout(() => document.getElementById('popupSuccess').classList.add('hidden'), 3000);
        }

        function showFail() {
            hideHapus();
            document.getElementById('popupFail').classList.remove('hidden');
            setTimeout(() => document.getElementById('popupFail').classList.add('hidden'), 3000);
        }
    </script>

</body>
</html>
