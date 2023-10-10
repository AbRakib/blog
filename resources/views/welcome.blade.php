<!doctype html>

{{-- seo tags start --}}
<meta charset="UTF-8">
<meta name="description" content="NewsDev - There are over 1000+ Newspaper published daily from online news sources. All latest news are post in English Language.We informing readers with knowledge & inspiration to help create a more...">
<meta name="keywords" content="arakib, Rakib, News, news, current news, cricket, sports, sport, content, title, tag, name, latest news, new news, update news, a, rakib, ARAKIB, dev, devnews, newsdev, DevNews, NewsDev, newsDev, devNews, de, deve, new, news, newses, Newspaper, knowledge, inspiration, Newspaper published daily, Daily News, English News, english newspaper">
<link rel="canonical" href="https://www.arakib.com/content">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="google-site-verification" content="">
<meta name="robots" content="noindex,nofollow">
{{-- seo tags end --}}

<title>NewsDev | Latest Best News From DEV News</title>
<link href="https://arakib.com/upload/settings/645377e5d8f95.jpg" rel="icon">

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
