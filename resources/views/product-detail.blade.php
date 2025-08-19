@extends('layout')

@section('title', 'Detail Produk')

@section('content')
<section class="product-detail">
  <div class="detail-container" id="detailContainer">
    <p>Sedang memuat detail produk...</p>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", async () => {
    const container = document.getElementById("detailContainer");
    const productId = window.location.pathname.split("/").pop();

    try {
      let res = await fetch(`https://fakestoreapi.com/products/${productId}`);
      let product = await res.json();

      container.innerHTML = `
        <img src="${product.image}" alt="${product.title}">
        <div class="detail-info">
          <h2>${product.title}</h2>
          <p class="category">Kategori: ${product.category}</p>
          <p class="desc">${product.description}</p>
          <div class="rating">⭐ ${product.rating?.rate || 0} (${product.rating?.count || 0} ulasan)</div>
          <p class="price">Rp ${(product.price * 15000).toLocaleString('id-ID')}</p>
          <div class="actions">
            <button class="btn-outline">Tambah ke Keranjang</button>
            <button class="btn">Beli Sekarang</button>
          </div>
          <br>
          <a href="{{ route('products') }}" class="btn-outline">← Kembali</a>
        </div>
      `;
    } catch (error) {
      container.innerHTML = "<p style='color:red;'>Gagal memuat detail produk.</p>";
      console.error("API Error:", error);
    }
  });
</script>
@endsection
