<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Paket Destinasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col">
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <h1 class="text-xl font-bold mb-1">Paket Destinasi</h1>
            <p class="text-gray-600 mb-4">Kelola Paket Destinasi Desa Wisata Sangurejo</p>

            <button onclick="toggleTambah()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                +Tambah Paket
            </button>

            <!-- Tabel Paket -->
            <table class="w-full mt-6 text-sm border">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-2">Foto</th>
                        <th class="p-2">Paket</th>
                        <th class="p-2">Fasilitas</th>
                        <th class="p-2">Harga</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2"><img src="/img/paket1.jpg" class="w-16 h-16 object-cover rounded"></td>
                        <td class="p-2">Paket Wisata Alam</td>
                        <td class="p-2 whitespace-pre-line">Welcome Drink\nGuide Lokal\nTracking Kebun\nWorkshop Kerajinan</td>
                        <td class="p-2">Rp 150.000</td>
                        <td class="p-2 flex space-x-2">
                            <a href="#" class="text-blue-600" onclick="openEditModal('Paket Wisata Alam', 'Welcome Drink\nGuide Lokal\nTracking Kebun\nWorkshop Kerajinan', 150000)">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button onclick="confirmHapus()" class="text-red-600"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>

    <!-- Modal Tambah Paket -->
    <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-lg relative">
            <h2 class="text-lg font-semibold mb-4">Tambah Paket Destinasi</h2>
            <form onsubmit="event.preventDefault(); showSuccess('Data berhasil ditambahkan!')">
                <input type="text" placeholder="Nama Paket" class="w-full border p-2 rounded mb-3 text-sm" required>
                <textarea placeholder="Fasilitas" rows="4" class="w-full border p-2 rounded mb-3 text-sm" required></textarea>
                <input type="number" placeholder="Harga (Rp)" class="w-full border p-2 rounded mb-3 text-sm" required>
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

    <!-- Modal Edit Paket -->
    <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-lg relative">
            <h2 class="text-lg font-semibold mb-4">Edit Paket Destinasi</h2>
            <form onsubmit="event.preventDefault(); updatePaket()">
                <input type="text" id="editNama" class="w-full border p-2 rounded mb-3 text-sm" required>
                <textarea id="editFasilitas" rows="4" class="w-full border p-2 rounded mb-3 text-sm" required></textarea>
                <input type="number" id="editHarga" class="w-full border p-2 rounded mb-3 text-sm" required>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="toggleEdit()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
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
            <p class="text-lg font-semibold mb-4">Yakin ingin menghapus data ini?</p>
            <div class="flex justify-center gap-4">
                <button onclick="hideHapus()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button onclick="showFail()" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Popup Sukses -->
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Data berhasil ditambahkan!
    </div>

    <!-- Popup Gagal -->
    <div id="popupFail" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Data berhasil dihapus!
    </div>

    <!-- SCRIPT -->
    <script>
        function toggleTambah() {
            document.getElementById('modalTambah').classList.toggle('hidden');
            document.getElementById('modalTambah').classList.toggle('flex');
        }

        function toggleEdit() {
            document.getElementById('modalEdit').classList.toggle('hidden');
            document.getElementById('modalEdit').classList.toggle('flex');
        }

        function openEditModal(nama, fasilitas, harga) {
            document.getElementById('editNama').value = nama;
            document.getElementById('editFasilitas').value = fasilitas.replace(/\\n/g, "\n");
            document.getElementById('editHarga').value = harga;
            toggleEdit();
        }

        function updatePaket() {
            toggleEdit();
            showSuccess('Data berhasil diperbarui!');
        }

        function confirmHapus() {
            document.getElementById('confirmHapus').classList.remove('hidden');
            document.getElementById('confirmHapus').classList.add('flex');
        }

        function hideHapus() {
            document.getElementById('confirmHapus').classList.add('hidden');
            document.getElementById('confirmHapus').classList.remove('flex');
        }

        function showSuccess(msg = 'Data berhasil ditambahkan!') {
            document.getElementById('popupSuccess').innerText = msg;
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
