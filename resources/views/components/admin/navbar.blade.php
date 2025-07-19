<header class="bg-emerald-700 text-white flex justify-between items-center px-6 py-4 shadow-md">
    <div></div> {{-- Tempat judul/breadcrumb jika dibutuhkan --}}
    
    <div class="flex items-center space-x-4">
        <span class="font-medium">Admin</span>
        <img src="{{ asset('img/Logo.png') }}" alt="Admin" class="w-9 h-9 rounded-full border-2 border-white shadow">
        <a href="#" onclick="handleLogout()" class="text-white hover:underline text-sm flex items-center space-x-1">
            <i class="fas fa-sign-out-alt"></i><span>Logout</span>
        </a>
    </div>
</header>

<!-- Tambahkan script logout ini di bawah sebelum tag </body> -->
<script>
    function handleLogout() {
        localStorage.removeItem('loggedIn');
        window.location.href = '/admin/login';
    }
</script>
