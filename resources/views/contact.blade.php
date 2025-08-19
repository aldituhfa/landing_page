@extends('layout')

@section('title', 'Contact')

@section('content')
<section class="contact-container">
  <div class="contact-box">
    <h2>Tentang Kami</h2>
    <p>TokoKu adalah e-commerce yang menyediakan produk berkualitas dengan harga terjangkau.</p>
    
    <h3>Hubungi Kami</h3>
    <form id="contactForm">
      <input type="text" id="name" placeholder="Nama" required>
      <input type="email" id="email" placeholder="Email" required>
      <textarea id="message" placeholder="Pesan" required></textarea>
      <button type="submit" class="btn">Kirim</button>
    </form>
  </div>
</section>
@endsection
