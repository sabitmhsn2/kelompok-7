@yield('php')
<?php

    $website = \App\Webs::get();
    foreach ($website as $xasi);
?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title }} |{{ $xasi->nama }}</title>
    <meta name="email" content="hello@ramacan.dev" />
    <meta name="description" content="{{ $xasi->deskripsi }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css" />
    <meta name="author" content="{{ config('app.developer.name') }}" />
    <meta name="website" content="{{ Request::url() }}" />

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $xasi->nama }}">
    <meta itemprop="description" content="{{ $xasi->deskripsi }}">
    <meta itemprop="image" content="{{ asset('foto/'.$xasi->logo) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $xasi->nama }}">
    <meta property="og:description" content="{{ $xasi->deskripsi }}">
    <meta property="og:image" content="{{ asset('foto/'.$xasi->logo) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $xasi->nama }}">
    <meta name="twitter:description" content="{{ $xasi->deskripsi }}">
    <meta name="twitter:image" content="{{ asset('foto/'.$xasi->logo) }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('foto/'.$xasi->logo) }}">
    <link rel="icon" type="image/png" href="{{ asset('foto/'.$xasi->logo) }}">