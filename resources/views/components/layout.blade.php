<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ponpes Nurul Iman Sindangkerta</title>

    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}">

    {{-- alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- css & js vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen">
    {{-- header --}}
    <header class="h-16 bg-white z-50 sticky top-0 shadow-md">
        <div class="container">
            <div class="h-full flex justify-between items-center">
                <x-logo />
                {{-- desktop nav --}}
                <div class="hidden lg:flex">
                    <nav class="flex items-center">
                        @foreach (config('common.header.menu') as $menu)
                            <div class="relative group">
                                <a href="{{ $menu['href'] }}"
                                    class="text-gray-600 hover:text-emerald-600 transition capitalize px-3 flex items-center gap-2 h-16">
                                    <span>{{ $menu['label'] }}</span>
                                    @if (isset($menu['submenu']))
                                        <x-heroicon-o-chevron-down
                                            class="size-4 font-semibold group-hover:rotate-180 transition-all" />
                                    @endif
                                </a>

                                @if (isset($menu['submenu']))
                                    <div
                                        class="shadow-md bg-white z-50 opacity-0 invisible group-hover:visible group-hover:opacity-100 translate-y-5 group-hover:translate-y-0 absolute border top-full rounded-lg p-4 min-w-full transition-all">
                                        <div class="flex flex-col">
                                            @foreach ($menu['submenu'] as $submenu)
                                                <a href="{{ $submenu['href'] }}"
                                                    class="text-gray-600 py-2 block hover:text-emerald-600 transition min-w-max">{{ $submenu['label'] }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="ml-6">
                            <x-socials />
                        </div>
                    </nav>
                </div>
                {{-- mobile nav --}}
                <div id="mobile-nav" x-data="{ openMobileNav: false }" class="flex lg:hidden">
                    <button x-on:click="openMobileNav = !openMobileNav" type="button"
                        :class="openMobileNav ? 'rotate-180' : ''" class="transition">
                        <x-heroicon-o-bars-3 x-show="!openMobileNav" />
                        <x-heroicon-o-x-mark x-show="openMobileNav" />
                    </button>
                    <div x-on:click="openMobileNav = false"
                        :class="openMobileNav ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="fixed inset-0 bg-black/50 transition-all duration-500">
                        <nav x-on:click="(e) => e.stopPropagation()"
                            :class="openMobileNav ? 'translate-x-0' : '-translate-x-full'"
                            class="overflow-y-scroll w-[85%] sm:w-80 h-full bg-white border-r border-gray-800 transition-all duration-300 p-8">
                            <x-logo />
                            <div class="border-l-2 pl-3 border-l-green-500 my-6 ">
                                <x-socials />
                            </div>
                            <div class="flex flex-col mt-4">
                                @foreach (config('common.header.menu') as $menu)
                                    <div x-data="{ openMobileMenu: false }" class="relative group">
                                        <a href="{{ $menu['href'] }}" x-on:click="openMobileMenu = !openMobileMenu"
                                            class="border-b py-3 hover:text-green-600 flex justify-between items-center">
                                            <span>{{ $menu['label'] }}</span>
                                            @if (isset($menu['submenu']))
                                                <div :class="openMobileMenu ? 'rotate-180' : ''">
                                                    <x-heroicon-o-chevron-down
                                                        class="size-4 font-semibold transition-all" />
                                                </div>
                                            @endif
                                        </a>
                                        @if (isset($menu['submenu']))
                                            <div x-show="openMobileMenu" class="flex flex-col pl-2 mt-2">
                                                @foreach ($menu['submenu'] as $submenu)
                                                    <a href="{{ $submenu['href'] }}"
                                                        class="py-2 hover:text-green-600">{{ $submenu['label'] }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- main --}}
    <main class="grow">{{ $slot }}</main>
    <a href={{ config('common.common.links.wa-url.href') }}
        class="!z-50 fixed right-6 lg:right-12 bottom-6 bg-green-500/80 p-2 px-4 text-white hover:bg-green-600 transition-all duration-300 rounded-full flex items-center gap-2">
        <x-fab-whatsapp /> <span class="font-semibold text-lg hidden lg:block">Hubungi Kami</span>
    </a>
    {{-- footer --}}
    <footer class="pt-12 border-t">
        <div class="container">
            <div class="mb-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 place-items-start gap-8">
                <div>
                    <x-logo />
                    <p class="italic mb-2 mt-4">
                        <q>{{ config('common.common.moto') }}</q>
                    </p>
                    <p class="text-sm">
                        {{ config('common.common.address') }}
                    </p>
                </div>
                <div>
                    <h3 class="footer-title">Tautan</h3>
                    <div class="line">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                    <nav class="mt-3">
                        @foreach (config('common.footer.links') as $links)
                            <a href="{{ $links['href'] }}" class="link">{{ $links['label'] }}</a>
                        @endforeach
                    </nav>
                </div>
                <div>
                    <h3 class="footer-title">Tautan Lainnya</h3>
                    <div class="line">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                    <nav class="mt-3">
                        @foreach (config('common.footer.other-links') as $otherLinks)
                            <a href="{{ $otherLinks['href'] }}" class="link">{{ $otherLinks['label'] }}</a>
                        @endforeach
                    </nav>
                </div>
                <div>
                    <h3 class="footer-title">Follow Us</h3>
                    <div class="line">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                    <nav class="mt-4">
                        <a href="{{ config('common.common.links.email-url.href') }}"
                            class="link !flex gap-2 items-center">
                            <x-heroicon-o-phone class="size-5 min-w-max" />
                            <span>{{ config('common.common.links.wa-url.label') }}</span>
                        </a>
                        <a href="{{ config('common.common.links.email-url.href') }}"
                            class="link !flex gap-2 items-center">
                            <x-heroicon-o-envelope class="size-5 min-w-max" />
                            <span>{{ config('common.common.links.email-url.label') }}</span>
                        </a>
                        <div class="line !my-4">
                            <div class="line1"></div>
                            <div class="line2"></div>
                        </div>
                        <x-socials />
                    </nav>
                </div>
            </div>
            <hr>
            <p class="py-4 text-sm">
                Copyright &copy; {{ date('Y') }} <a href="#"
                    class="text-green-500 hover:text-green-600 hover:underline">Ponpes Nurul Iman
                    Sindangkerta</a>
            </p>
        </div>
    </footer>
</body>

</html>
