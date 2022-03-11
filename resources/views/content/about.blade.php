@extends('layouts.master')
@section('title', 'About')
@section('menuAbout', 'active')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <img src="/img/about-us.jpg" class="w-100" alt="index">
        </div>
        <div class="col-lg-6">
            <div class="col-lg-12 p-5">
                <h1 class="text-center">About <span class="font-weight-bold text-primary">Us</span></h2>
            </div>
            <div class="col-lg-12 p-5" style="background-color: #f2f2f2;">
                <p>Web ini adalah web yang menyediakan akses bagi masyarakat untuk menemukan dan memesan Tiket pesawat. Travellur juga menawarkan reservasi untuk berbagai atraksi dan aktivitas lokal serta direktori kuliner. Melalui produk Layanan Finansial kami, kami juga menawarkan solusi pembiayaan, pembayaran, dan asuransi untuk membantu mengatasi berbagai kesulitan finansial dalam menunjang aktivitas Travel & Lifestyle Anda sehari-hari. Kami juga menyediakan layanan pelanggan yang dapat dihubungi 24/7 dalam bahasa lokal, serta lebih dari 40 pilihan pembayaran yang berbeda, baik online maupun offline</p>
            </div>
        </div>
    </div>
</div>

@endsection