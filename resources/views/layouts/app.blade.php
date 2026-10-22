<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Nada Musik') | Toko Alat Musik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --ink: #172033; --accent: #f59e0b; --paper: #f7f8fc; }
        body { background: var(--paper); color: var(--ink); }
        .navbar { background: #111827; }
        .brand-mark { color: var(--accent); font-weight: 800; letter-spacing: .3px; }
        .hero { background: linear-gradient(120deg, #172033, #344563); color: white; border-radius: 1.25rem; }
        .hero .eyebrow { color: #fbbf24; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; font-size: .8rem; }
        .product-card { border: 0; border-radius: 1rem; overflow: hidden; transition: transform .18s, box-shadow .18s; }
        .product-card:hover { transform: translateY(-4px); box-shadow: 0 1rem 2rem #17203318 !important; }
        .product-image { height: 210px; object-fit: contain; padding: 1rem; background: #fff; }
        .price { color: #b45309; font-weight: 800; }
        footer { color: #6b7280; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container py-2">
        <a class="navbar-brand brand-mark" href="{{ route('instruments.index') }}">♫ NADA MUSIK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Buka navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('instruments.index') }}">Beranda</a>
                <a class="nav-link" href="{{ route('instruments.index') }}#produk">Daftar Alat Musik</a>
            </div>
        </div>
    </div>
</nav>

<main class="container py-4 py-lg-5">
    @yield('content')
</main>

<footer class="container text-center py-4 small">
    © {{ date('Y') }} Nada Musik · Temukan suara favoritmu.
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
