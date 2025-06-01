<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CloudPractitionerHelp | @yield('maintitle', 'Dashboard')</title>

    {{-- ---------- CANONICAL TAG ---------- --}}
    @php
        // Always force “www” as your canonical host
        $host = 'www.cloudpractitionerhelp.com';
        $path = request()->getRequestUri();
        $scheme = request()->getScheme(); // “http” or “https”
        $canonicalUrl = $scheme . '://' . $host . $path;
    @endphp
    <link rel="canonical" href="{{ $canonicalUrl }}" />
    {{-- ------------------------------------- --}}


    <!-- New meta description for SEO / social previews -->
    <meta name="description"
        content="CloudPractitionerHelp is quiz generation web application provides concise, hands-on AWS Certified Cloud Practitioner (CLF-C02) free study modules for learning, affordable and free credits for quizzes, to help you pass the exam with confidence.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="CloudPractitionerHelp" />
    <meta property="og:title" content="CloudPractitionerHelp | Welcome" />
    <meta property="og:description"
        content="CloudPractitionerHelp provides concise, hands-on AWS Certified Cloud Practitioner (CLF-C02) free study modules, ultra-affordable practice challenges, to help you pass the exam with confidence." />
    <meta property="og:url" content="https://cloudpractitionerhelp.com" />
    <!-- Replace with the URL to your preferred shareable image (1200×630px recommended) -->
    <meta property="og:image" content="https://cloudpractitionerhelp.com/android-chrome-512x512.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <!-- Twitter Card -->
    <meta name="twitter:title" content="CloudPractitionerHelp | Welcome" />
    <meta name="twitter:description"
        content="CloudPractitionerHelp provides concise, hands-on AWS Certified Cloud Practitioner (CLF-C02) free study modules, ultra-affordable practice challenges, to help you pass the exam with confidence." />
    <meta name="twitter:image" content="https://cloudpractitionerhelp.com/android-chrome-512x512.png" />

    <!-- AlpineJS CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- Tailwind and other global CSS… -->
    @vite('resources/css/app.css')

    <livewire:styles />
</head>
{{ $slot }}

</html>
