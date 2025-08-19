@extends('layout')

@section('title', 'Produk')

@section('content')
<section class="products">
  <h2>Daftar Produk</h2>
  <div class="grid" id="productGrid">
    <p>Sedang memuat produk...</p>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", async () => {
    const grid = document.getElementById("productGrid");

    try {
      let res = await fetch("https://fakestoreapi.com/products");
      let products = await res.json();

      grid.innerHTML = products.map(product => `
        <div class="card">
          <a href="/products/${product.id}">
            <img src="${product.image}" alt="${product.title}">
            <h3>${product.title}</h3>
          </a>
          <p class="desc">${product.description.substring(0, 60)}...</p>
          <div class="rating">⭐ ${product.rating?.rate || 0} (${product.rating?.count || 0})</div>
          <p class="price">Rp ${(product.price * 15000).toLocaleString('id-ID')}</p>
          <div class="actions">
            <button class="btn-outline add-to-cart" data-id="${product.id}" data-title="${product.title}" data-price="${product.price}" data-image="${product.image}">
              🛒 Tambah ke Keranjang
            </button>
            <a href="/products/${product.id}" class="btn">Beli Sekarang</a>
          </div>
        </div>
      `).join("");

      // Event listener untuk cart
      document.querySelectorAll(".add-to-cart").forEach(btn => {
        btn.addEventListener("click", (e) => {
          const id = btn.dataset.id;
          const title = btn.dataset.title;
          const price = btn.dataset.price;
          const image = btn.dataset.image;

          // ambil cart dari localStorage
          let cart = JSON.parse(localStorage.getItem("cart")) || [];

          // cek kalau produk sudah ada
          let existing = cart.find(item => item.id == id);
          if (existing) {
            existing.qty += 1;
          } else {
            cart.push({ id, title, price, image, qty: 1 });
          }

          localStorage.setItem("cart", JSON.stringify(cart));
          alert(`${title} ditambahkan ke keranjang!`);
        });
      });

    } catch (error) {
      grid.innerHTML = "<p style='color:red;'>Gagal memuat produk dari API.</p>";
      console.error("API Error:", error);
    }
  });
</script>
@endsection
