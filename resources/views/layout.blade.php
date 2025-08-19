<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') - TokoKu</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav>
      <div class="logo">TokoKu</div>
      <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('products') }}" class="{{ Request::is('products') ? 'active' : '' }}">Products</a></li>
        <li><a href="{{ route('contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
      </ul>

      <div class="auth-nav" id="authNav">
        <button id="openAuthModal" class="btn-small">Login / Register</button>
      </div>
    </nav>
  </header>

  <!-- Konten Halaman -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 TokoKu</p>
  </footer>

  <!-- Modal Login/Register -->
  <div id="authModal" class="modal hidden">
    <div class="modal-content">
      <span class="close-btn" id="closeAuthModal">&times;</span>
      <div class="tabs">
        <button id="loginTab" class="active">Login</button>
        <button id="registerTab">Register</button>
      </div>

      <!-- Login Form -->
      <form id="loginForm" class="auth-form">
        <input type="email" id="loginEmail" placeholder="Email" required>
        <input type="password" id="loginPassword" placeholder="Password" required>
        <button type="submit" class="btn">Login</button>
      </form>

      <!-- Register Form -->
      <form id="registerForm" class="auth-form hidden">
        <input type="text" id="regName" placeholder="Nama Lengkap" required>
        <input type="email" id="regEmail" placeholder="Email" required>
        <input type="password" id="regPassword" placeholder="Password" required>
        <button type="submit" class="btn">Register</button>
      </form>
    </div>
  </div>
</body>
</html>
