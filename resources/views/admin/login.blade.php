<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-emerald-600 h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-2xl shadow-xl w-96 text-center">

    <!-- Logo -->
    <img src="{{ asset('img/Logo.png') }}" alt="Logo"
         class="mx-auto mb-6 w-24 h-24 object-contain drop-shadow-md">

    <!-- Form -->
    <form onsubmit="return handleLogin(event)">
      <div class="relative mb-4">
        <i class="fas fa-user absolute left-3 top-2.5 text-slate-400"></i>
        <input type="text" id="username" placeholder="USERNAME"
          class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
      </div>

      <div class="relative mb-4">
        <i class="fas fa-lock absolute left-3 top-2.5 text-slate-400"></i>
        <input type="password" id="password" placeholder="PASSWORD"
          class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
      </div>

      <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 rounded-xl font-semibold hover:bg-indigo-700 transition duration-150">LOGIN</button>
    </form>

    <p class="text-xs mt-3 text-slate-500 hover:underline cursor-pointer">Lupa Password?</p>
  </div>

  <script>
    function handleLogin(e) {
      e.preventDefault();
      const user = document.getElementById('username').value;
      const pass = document.getElementById('password').value;

      if (user === 'admin' && pass === 'admin') {
        localStorage.setItem('loggedIn', 'true');
        window.location.href = "/admin/dashboard";
      } else {
        alert("Username atau Password salah!");
      }
    }
  </script>

</body>
</html>
