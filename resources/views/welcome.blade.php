<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    html{
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        
        @include('components.navbar')
        @include('components.header')
        @yield('content')
        @include('components.footer')

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.0/cdn.js" integrity="sha512-kABigH+locGcvvX9sgOGm0JP4iDKUQzti7/HfbX+3ECCP2pmb13F6/ImQtVpSvrnNQHewqNMojAykCIw7z04LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
