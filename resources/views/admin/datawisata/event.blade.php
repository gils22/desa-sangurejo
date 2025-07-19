<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    @include('components.admin.sidebar')
    <div class="flex-1 flex flex-col">
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <h1 class="text-xl font-bold mb-4">Event</h1>

            <div class="bg-white p-6 rounded shadow">
                <button onclick="openAddModal()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    <i class="fas fa-plus mr-2"></i> Tambah Event
                </button>

                <table class="table-auto w-full mt-6 text-sm text-left text-gray-700">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Nama Event</th>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">Festival Budaya</td>
                            <td class="px-4 py-2">12 Agustus 2025</td>
                            <td class="px-4 py-2">
                                <a href="#" onclick="openEditModal('Festival Budaya', '2025-08-12')" class="text-blue-600 hover:underline mr-2">Edit</a>
                                <a href="#" onclick="openDeleteModal('Festival Budaya')" class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                        {{-- Tambah baris lainnya --}}
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    {{-- MODAL: Tambah/Edit --}}
    <div id="eventModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">
        <div class="bg-white w-full max-w-md p-6 rounded relative">
            <h2 id="modalTitle" class="text-lg font-semibold mb-4">Tambah Event</h2>
            <form id="eventForm" onsubmit="submitEvent(event)">
                <input type="text" id="eventName" placeholder="Nama Event" required class="w-full p-2 border rounded mb-3 text-sm">
                <input type="date" id="eventDate" required class="w-full p-2 border rounded mb-3 text-sm">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    {{-- MODAL: Hapus --}}
    <div id="deleteModal" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 items-center justify-center">
        <div class="bg-white w-full max-w-md p-6 rounded text-center">
            <p class="text-lg font-semibold mb-4">Yakin ingin menghapus <span id="eventToDelete" class="font-bold"></span>?</p>
            <div class="flex justify-center gap-3">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button onclick="confirmDelete()" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
            </div>
        </div>
    </div>

    {{-- Popup sukses --}}
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-50">
        Berhasil disimpan!
    </div>

    <script>
        let editing = false;

        function openAddModal() {
            editing = false;
            document.getElementById('modalTitle').innerText = 'Tambah Event';
            document.getElementById('eventName').value = '';
            document.getElementById('eventDate').value = '';
            document.getElementById('eventModal').classList.remove('hidden');
            document.getElementById('eventModal').classList.add('flex');
        }

        function openEditModal(name, date) {
            editing = true;
            document.getElementById('modalTitle').innerText = 'Edit Event';
            document.getElementById('eventName').value = name;
            document.getElementById('eventDate').value = date;
            document.getElementById('eventModal').classList.remove('hidden');
            document.getElementById('eventModal').classList.add('flex');
        }

        function submitEvent(e) {
            e.preventDefault();
            closeModal();
            showPopup(editing ? 'Event berhasil diperbarui!' : 'Event berhasil ditambahkan!');
        }

        function closeModal() {
            document.getElementById('eventModal').classList.add('hidden');
            document.getElementById('eventModal').classList.remove('flex');
        }

        function openDeleteModal(eventName) {
            document.getElementById('eventToDelete').innerText = eventName;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        function confirmDelete() {
            closeDeleteModal();
            showPopup('Event berhasil dihapus!');
        }

        function showPopup(message = 'Berhasil!') {
            const popup = document.getElementById('popupSuccess');
            popup.innerText = message;
            popup.classList.remove('hidden');
            setTimeout(() => popup.classList.add('hidden'), 3000);
        }
    </script>

</body>
</html>
