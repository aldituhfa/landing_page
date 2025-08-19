document.addEventListener("DOMContentLoaded", function () {
  // Contact Form
  const contactForm = document.getElementById("contactForm");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const message = document.getElementById("message").value.trim();

      if (!name || !email || !message) {
        alert("Harap isi semua field!");
        return;
      }

      alert("Terima kasih, " + name + "! Pesan Anda sudah terkirim.");
      contactForm.reset();
    });
  }

  // Modal Auth
  const authModal = document.getElementById("authModal");
  const openAuthBtn = document.getElementById("openAuthModal");
  const closeAuthBtn = document.getElementById("closeAuthModal");

  if (openAuthBtn) {
    openAuthBtn.addEventListener("click", () => {
      authModal.classList.remove("hidden");
    });
  }
  if (closeAuthBtn) {
    closeAuthBtn.addEventListener("click", () => {
      authModal.classList.add("hidden");
    });
  }

  // Tabs Login/Register
  const loginTab = document.getElementById("loginTab");
  const registerTab = document.getElementById("registerTab");
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");

  if (loginTab && registerTab) {
    loginTab.addEventListener("click", () => {
      loginTab.classList.add("active");
      registerTab.classList.remove("active");
      loginForm.classList.remove("hidden");
      registerForm.classList.add("hidden");
    });

    registerTab.addEventListener("click", () => {
      registerTab.classList.add("active");
      loginTab.classList.remove("active");
      registerForm.classList.remove("hidden");
      loginForm.classList.add("hidden");
    });
  }

  // Register
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const name = document.getElementById("regName").value.trim();
      const email = document.getElementById("regEmail").value.trim();
      const password = document.getElementById("regPassword").value.trim();
      if (!name || !email || !password) {
        alert("Harap isi semua data untuk register!");
        return;
      }
      // Simpan ke localStorage
      localStorage.setItem("user", JSON.stringify({ name, email, password }));
      alert("Registrasi berhasil! Silakan login.");
      registerForm.reset();
      loginTab.click();
    });
  }

  // Login
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("loginEmail").value.trim();
      const password = document.getElementById("loginPassword").value.trim();
      const user = JSON.parse(localStorage.getItem("user"));
      if (!user || user.email !== email || user.password !== password) {
        alert("Email atau password salah!");
        return;
      }
      localStorage.setItem("loggedIn", "true");
      alert("Login berhasil! Selamat datang, " + user.name);
      authModal.classList.add("hidden");
      updateAuthNav();
    });
  }

  // Update Navbar Auth
  function updateAuthNav() {
    const authNav = document.getElementById("authNav");
    const user = JSON.parse(localStorage.getItem("user"));
    const loggedIn = localStorage.getItem("loggedIn") === "true";

    if (loggedIn && user) {
      authNav.innerHTML = `
        <span>Halo, ${user.name}</span>
        <button id="logoutBtn" class="btn-small">Logout</button>
      `;
      document.getElementById("logoutBtn").addEventListener("click", () => {
        localStorage.setItem("loggedIn", "false");
        updateAuthNav();
      });
    } else {
      authNav.innerHTML = `<button id="openAuthModal" class="btn-small">Login / Register</button>`;
      document.getElementById("openAuthModal").addEventListener("click", () => {
        authModal.classList.remove("hidden");
      });
    }
  }

  updateAuthNav();
});
