<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Carousel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    {{-- Sidebar --}}
    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('components.admin.navbar')

        <main class="p-6 relative">
            <h1 class="text-xl font-bold mb-4">Carousel</h1>

            <div class="bg-white p-6 rounded shadow">
                <p class="text-sm text-gray-700 mb-4">Kelola gambar slider yang ditampilkan di halaman utama website.</p>

                <button onclick="toggleUpload()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-upload mr-2"></i>Tambah Gambar
                </button>

                {{-- Daftar Gambar Carousel (Dummy) --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6">
                    <div class="border rounded overflow-hidden shadow">
                        <img src="/img/carousel1.jpg" alt="carousel1" class="w-full h-40 object-cover">
                        <div class="p-2 flex justify-between text-sm items-center">
                            <span>carousel1.jpg</span>
                            <button onclick="confirmDelete('carousel1.jpg')" class="text-red-600 hover:underline">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="border rounded overflow-hidden shadow">
                        <img src="/img/carousel2.jpg" alt="carousel2" class="w-full h-40 object-cover">
                        <div class="p-2 flex justify-between text-sm items-center">
                            <span>carousel2.jpg</span>
                            <button onclick="confirmDelete('carousel2.jpg')" class="text-red-600 hover:underline">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Modal Upload Gambar --}}
    <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white w-full max-w-md rounded p-6 relative">
            <h2 class="text-lg font-semibold mb-4">Upload Gambar Carousel</h2>
            <form onsubmit="handleUpload(event)">
                <input type="file" name="gambar" accept="image/*" required class="w-full p-2 border rounded mb-3 text-sm">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="toggleUpload()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Upload</button>
                </div>
            </form>
            <button class="absolute top-2 right-2 text-gray-500 hover:text-black" onclick="toggleUpload()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus --}}
    <div id="deleteConfirm" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white p-6 rounded w-full max-w-md text-center">
            <p class="text-lg font-semibold mb-4">Yakin ingin menghapus <span id="fileNameLabel" class="font-bold"></span>?</p>
            <div class="flex justify-center gap-4">
                <button onclick="hideDelete()" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                <button onclick="handleDelete()" class="bg-red-600 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    {{-- Popup Sukses --}}
    <div id="popupSuccess" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow hidden z-[9999]">
        Berhasil disimpan!
    </div>

    {{-- SCRIPT --}}
    <script>
        function toggleUpload() {
            const modal = document.getElementById('uploadModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function confirmDelete(filename) {
            document.getElementById('fileNameLabel').innerText = filename;
            document.getElementById('deleteConfirm').classList.remove('hidden');
            document.getElementById('deleteConfirm').classList.add('flex');
        }

        function hideDelete() {
            document.getElementById('deleteConfirm').classList.add('hidden');
            document.getElementById('deleteConfirm').classList.remove('flex');
        }

        function showPopup(message = 'Berhasil!') {
            const popup = document.getElementById('popupSuccess');
            popup.innerText = message;
            popup.classList.remove('hidden');
            setTimeout(() => {
                popup.classList.add('hidden');
            }, 3000);
        }

        function handleUpload(e) {
            e.preventDefault();
            toggleUpload();
            showPopup('Gambar berhasil ditambahkan!');
        }

        function handleDelete() {
            hideDelete();
            showPopup('Gambar berhasil dihapus!');
        }
    </script>

</body>
</html>
