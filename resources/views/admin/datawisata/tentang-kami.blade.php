<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami</title>
     {{-- Load Tailwind via Vite --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex">

    @include('components.admin.sidebar')

    <div class="flex-1 flex flex-col">
        @include('components.admin.navbar')

        <main class="p-6">
            <h1 class="text-xl font-bold mb-4">Tentang Kami</h1>

            <div class="bg-white p-6 rounded shadow text-sm text-gray-800 leading-relaxed">
                <p>
                    Desa wisata Sangurejo terletak di Sangurejo, Turi, Kab. Sleman, DI Yogyakarta. Sangurejo merupakan desa wisata yang memiliki pemandangan yang indah...
                </p>

                <p class="mt-4">Kemudian pada tahun 2012, dikarenakan pengunjung banyak yang berdatangan...</p>

                <p class="mt-4">Di Desa Wisata Sangurejo ini awalnya merupakan satu keluarga...</p>

                <div class="mt-6">
                    <button onclick="toggleModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        <i class="fas fa-edit mr-2"></i>Edit Data
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-xl relative">
            <h2 class="text-xl font-bold mb-4">Edit Data Tentang Kami</h2>
            <form>
                <textarea rows="8" class="w-full p-3 border rounded focus:outline-none focus:ring focus:ring-blue-300 text-sm">
Desa wisata Sangurejo terletak di Sangurejo, Turi, Kab. Sleman, DI Yogyakarta...
                </textarea>
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
            <button onclick="toggleModal()" class="absolute top-2 right-2 text-gray-400 hover:text-black">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- SCRIPT TOGGLER -->
    <script>
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }
    </script>

</body>
</html>
