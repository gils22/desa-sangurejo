<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalender Event & Notifikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col">
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <h1 class="text-xl font-bold text-center mb-1">Kalender Event & Notifikasi</h1>
            <p class="text-gray-600 text-center mb-6">Kelola Kalender Event & Notifikasi Desa Wisata Sangurejo</p>

            <div class="flex flex-wrap justify-between items-center mb-4">
                <div class="flex space-x-2 items-center">
                    <button class="border border-gray-300 rounded px-3 py-1 bg-white hover:bg-gray-100">Hari Ini</button>
                    <input type="date" class="border border-gray-300 rounded px-3 py-1">
                    <span id="current-time" class="text-sm text-gray-700 font-medium"></span>
                    <select class="border border-gray-300 rounded px-3 py-1">
                        <option>Waktu: Indonesia</option>
                    </select>
                    <select class="border border-gray-300 rounded px-3 py-1">
                        <option>1 Minggu</option>
                        <option>3 Hari</option>
                    </select>
                </div>
                <button onclick="toggleModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Event
                </button>
            </div>

            {{-- Kalender Dummy --}}
            <div class="overflow-x-auto bg-white rounded shadow p-4">
                <table class="w-full text-sm text-center border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Senin 12</th>
                            <th class="border p-2">Selasa 13</th>
                            <th class="border p-2">Rabu 14</th>
                            <th class="border p-2">Kamis 15</th>
                            <th class="border p-2">Jumat 16</th>
                            <th class="border p-2">Sabtu 17</th>
                            <th class="border p-2">Minggu 18</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="h-32 align-top">
                            <td class="border p-2 text-left" id="cell-senin"></td>
                            <td class="border p-2 text-left" id="cell-selasa"></td>
                            <td class="border p-2 text-left" id="cell-rabu"></td>
                            <td class="border p-2 text-left" id="cell-kamis"></td>
                            <td class="border p-2 text-left" id="cell-jumat"></td>
                            <td class="border p-2 text-left" id="cell-sabtu"></td>
                            <td class="border p-2 text-left" id="cell-minggu"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal Tambah Event -->
    <div id="modalEvent" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-lg relative">
            <h2 class="text-lg font-semibold mb-4">Tambah Event Baru</h2>
            <form onsubmit="event.preventDefault(); tambahEvent()">
                <input id="eventName" type="text" placeholder="Nama Event" class="w-full border p-2 rounded mb-3 text-sm" required>
                <select id="eventHari" class="w-full border p-2 rounded mb-3 text-sm" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                </select>
                <div class="flex gap-2">
                    <input id="startTime" type="time" class="w-1/2 border p-2 rounded mb-3 text-sm" required>
                    <input id="endTime" type="time" class="w-1/2 border p-2 rounded mb-3 text-sm" required>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="toggleModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Event berhasil ditambahkan!
    </div>

    <!-- SCRIPT -->
    <script>
        function toggleModal() {
            const modal = document.getElementById('modalEvent');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function tambahEvent() {
            const nama = document.getElementById('eventName').value;
            const hari = document.getElementById('eventHari').value;
            const mulai = document.getElementById('startTime').value;
            const selesai = document.getElementById('endTime').value;

            if (!nama || !hari || !mulai || !selesai) return;

            const cell = document.getElementById('cell-' + hari);
            const tag = document.createElement('div');
            tag.className = "bg-blue-100 text-blue-800 rounded px-2 py-1 mb-1 text-xs w-fit";
            tag.innerHTML = `${nama} <br><span class="text-[10px]">${mulai} - ${selesai}</span>`;
            cell.appendChild(tag);

            toggleModal();
            showSuccessPopup();
        }

        function showSuccessPopup() {
            const popup = document.getElementById('popupSuccess');
            popup.classList.remove('hidden');
            setTimeout(() => popup.classList.add('hidden'), 3000);
        }

        function updateTime() {
            const now = new Date();
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const formatted = now.toLocaleTimeString('id-ID', timeOptions);
            document.getElementById('current-time').textContent = formatted;
        }

        setInterval(updateTime, 1000);
        updateTime(); // run once on load
    </script>

</body>
</html>
