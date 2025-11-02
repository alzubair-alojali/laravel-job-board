<!DOCTYPE html>
<html class="h-full bg-gray-900 text-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <title>laravel - {{ $title }}</title>

</head>

<body>
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-900/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="/">
                                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company" class="size-8" />
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">home</x-nav-link>
                                <x-nav-link href="/about" :active="request()->is('about')"> about</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">contact</x-nav-link>
                                <x-nav-link href="/blog" :active="request()->is('blog')">blog</x-nav-link>
                            </div>
                        </div>
                    </div>

                    <!-- Authentication links (added) -->
                    <div class="flex items-center">
                        @guest
                            <div class="ml-4 flex items-center space-x-2">
                                <a href="{{ '/login' }}"
                                    class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-white/10">Login</a>

                                <a href="{{ '/signup' }}"
                                    class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-600 hover:bg-indigo-500">Sign
                                    up</a>
                            </div>
                        @else
                            <div class="ml-4 flex items-center space-x-4">
                                <span class="text-sm text-white">Hello, {{ auth()->user()->name }}</span>

                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-white/10">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endguest
                    </div>
                    <!-- /Authentication links (added) -->

                </div>
            </div>
        </nav>

        <header
            class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">{{ $title }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>