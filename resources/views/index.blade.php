@extends('layout')

@section('title', 'Home')

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <h1>Selamat Datang di TokoKu</h1>
    <p>Tempat belanja online terpercaya untuk kebutuhan Anda.</p>
    <a href="{{ route('products') }}" class="btn">Lihat Produk</a>
  </section>

  <!-- Produk Unggulan -->
  <section class="highlight">
    <h2>Produk Unggulan</h2>
    <div class="highlight-grid" id="highlightGrid">
      <p>Sedang memuat produk unggulan...</p>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", async () => {
      const highlightGrid = document.getElementById("highlightGrid");

      try {
        let res = await fetch("https://fakestoreapi.com/products?limit=3");
        let products = await res.json();

        highlightGrid.innerHTML = products.map(product => `
          <div class="highlight-card">
            <img src="${product.image}" alt="${product.title}">
            <h3>${product.title}</h3>
            <p class="desc">${product.description.substring(0, 80)}...</p>
            <p class="price">Rp ${(product.price * 15000).toLocaleString('id-ID')}</p>
            <a href="/products/${product.id}" class="btn">Lihat Detail</a>
          </div>
        `).join("");
      } catch (error) {
        highlightGrid.innerHTML = "<p style='color:red;'>Gagal memuat produk unggulan.</p>";
        console.error("API Error:", error);
      }
    });
  </script>
@endsection
