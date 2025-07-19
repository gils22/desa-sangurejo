<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Kunjungan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bg-gray-100 flex">

  @include('components.admin.sidebar')

  <div class="flex-1 flex flex-col">
    @include('components.admin.navbar')

    <main class="p-6 relative">
      <h1 class="text-2xl font-semibold mb-1">Kelola Data Kunjungan</h1>
      <p class="text-gray-600 mb-6">Edit atau Perbarui Data Booking Desa Wisata Sangurejo</p>

      <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left border border-gray-200">
          <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
            <tr>
              <th class="px-4 py-3 border">Tanggal</th>
              <th class="px-4 py-3 border">Nama</th>
              <th class="px-4 py-3 border">Alamat</th>
              <th class="px-4 py-3 border">Telepon</th>
              <th class="px-4 py-3 border">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="border-t">
              <td class="px-4 py-2">Selasa, 04-04-2025</td>
              <td class="px-4 py-2">Aulia Noer Hikmah</td>
              <td class="px-4 py-2">Bantul, Yogyakarta</td>
              <td class="px-4 py-2">000000000000</td>
              <td class="px-4 py-2 space-x-2">
                <button onclick="toggleEdit()" class="text-blue-600"><i class="fas fa-pen"></i></button>
                <button onclick="confirmHapus()" class="text-red-600"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Tombol Tambah -->
      <div class="mt-4 text-right">
        <button onclick="toggleTambah()" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
          Tambah Pengunjung
        </button>
      </div>
    </main>
  </div>

  <!-- Modal Tambah -->
  <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow w-full max-w-lg relative">
      <h2 class="text-lg font-semibold mb-4">Tambah Pengunjung</h2>
      <form onsubmit="event.preventDefault(); showSuccess()">
        <input type="text" placeholder="Nama" class="w-full border p-2 rounded mb-3 text-sm" required />
        <input type="text" placeholder="Alamat" class="w-full border p-2 rounded mb-3 text-sm" required />
        <input type="tel" placeholder="Telepon" class="w-full border p-2 rounded mb-3 text-sm" required />
        <input type="date" class="w-full border p-2 rounded mb-3 text-sm" required />
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

  <!-- Modal Edit -->
  <div id="modalEdit" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow w-full max-w-lg relative">
      <h2 class="text-lg font-semibold mb-4">Edit Data Pengunjung</h2>
      <form onsubmit="event.preventDefault(); showSuccess('Edit')">
        <input type="text" value="Aulia Noer Hikmah" class="w-full border p-2 rounded mb-3 text-sm" />
        <input type="text" value="Bantul, Yogyakarta" class="w-full border p-2 rounded mb-3 text-sm" />
        <input type="tel" value="000000000000" class="w-full border p-2 rounded mb-3 text-sm" />
        <input type="date" value="2025-04-04" class="w-full border p-2 rounded mb-3 text-sm" />
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" onclick="toggleEdit()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
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

  <!-- Notifikasi -->
  <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
    Data berhasil disimpan!
  </div>
  <div id="popupFail" class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
    Data berhasil dihapus!
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
      const modal = document.getElementById('confirmHapus');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function hideHapus() {
      const modal = document.getElementById('confirmHapus');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function showSuccess(action = 'Tambah') {
      if (action === 'Tambah') toggleTambah();
      else toggleEdit();

      const popup = document.getElementById('popupSuccess');
      popup.classList.remove('hidden');
      popup.textContent = `Data berhasil di${action === 'Tambah' ? 'tambah' : 'edit'}!`;
      setTimeout(() => popup.classList.add('hidden'), 3000);
    }

    function showFail() {
      hideHapus();
      const popup = document.getElementById('popupFail');
      popup.classList.remove('hidden');
      setTimeout(() => popup.classList.add('hidden'), 3000);
    }
  </script>

</body>
</html>
