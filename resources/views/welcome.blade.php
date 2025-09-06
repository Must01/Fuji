<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Fuji Notes</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">
        {{-- Hero container with gentle overlay for serenity --}}
        <div class="relative flex min-h-screen flex-col items-center bg-cover bg-center bg-no-repeat p-4 lg:p-6"
            style="background-image: url('../../bg-fuji.jpg')">

            {{-- Soft, calming overlay with subtle gradient --}}
            <div
                class="pointer-events-none absolute inset-0 bg-gradient-to-b from-slate-900/20 via-slate-800/15 to-slate-900/30">
            </div>

            {{-- Header --}}
            <header class="relative z-10 w-full max-w-6xl">
                @if (Route::has('login'))
                    <nav class="flex items-center justify-between">
                        <a href="{{ route('home') }}"
                            class="flex items-center gap-3 transition-all duration-300 hover:opacity-80" wire:navigate
                            aria-label="Home">
                            <x-app-logo class="drop-shadow-sm" />
                        </a>

                        <div class="flex items-center gap-4">
                            @guest
                                {{-- Login button = ghost --}}
                                <a href="{{ route('login') }}"
                                    class="rounded-full border border-white/30 px-5 py-2 text-sm text-white/80 backdrop-blur-sm transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:text-white">
                                    Log in
                                </a>

                                {{-- Register button = primary amber --}}
                                <a href="{{ route('register') }}"
                                    class="rounded-full bg-amber-300/90 px-5 py-2 text-sm font-medium text-slate-900 shadow-md backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-lg">
                                    Sign up
                                </a>
                            @else
                                <a href="{{ route('note.index') }}"
                                    class="rounded-full bg-amber-300/90 px-5 py-2 text-sm font-medium text-slate-900 shadow-md backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-lg">
                                    Notes
                                </a>
                            @endguest
                        </div>

                    </nav>
                @endif
            </header>

            {{-- Hero content with peaceful spacing --}}
            <main class="relative z-10 mx-auto w-full max-w-6xl px-4 pt-20 text-center lg:pt-28">
                <p class="mx-auto max-w-2xl text-base font-light tracking-wide text-white/70 drop-shadow-sm">
                    Welcome to <span class="border-b border-dotted border-white/30 text-white/80">Fuji Notes</span>
                </p>

                <h1
                    class="font-display mx-auto mt-8 max-w-5xl text-5xl font-light leading-[1.1] tracking-tight text-white drop-shadow-lg sm:text-6xl lg:text-7xl">
                    <span class="inline-block">A calm place for your</span>
                    <span class="relative ml-3 inline-block whitespace-nowrap">
                        {{-- Soft amber underline for warmth --}}
                        <svg aria-hidden="true" viewBox="0 0 418 42"
                            class="absolute left-0 top-2/3 h-[0.55em] w-full fill-amber-300/60 drop-shadow-sm"
                            preserveAspectRatio="none">
                            <path
                                d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z">
                            </path>
                        </svg>

                        <span
                            class="relative text-amber-200 drop-shadow-[0_4px_12px_rgba(252,211,77,0.3)]">thoughts</span>
                    </span>
                </h1>

                <p
                    class="mx-auto mt-10 max-w-2xl text-lg font-light leading-relaxed tracking-wide text-white/80 drop-shadow-sm">
                    A mindful space for your ideas — capture, nurture, and rediscover them when inspiration calls.
                </p>

                <div class="mt-12 flex items-center justify-center gap-4">
                    @guest
                        <a href="{{ route('register') }}"
                            class="rounded-full bg-amber-300/90 px-8 py-3 font-medium text-slate-900 shadow-lg backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-xl">
                            Begin your journey — it's free
                        </a>

                        <a href="#features"
                            class="rounded-full border border-white/30 px-6 py-3 text-white/90 backdrop-blur-sm transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:text-white">
                            Discover more
                        </a>
                    @else
                        <a href="{{ route('note.index') }}"
                            class="rounded-full bg-amber-300/90 px-8 py-3 font-medium text-slate-900 shadow-lg backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-xl">
                            Enter Fuji
                        </a>
                    @endguest
                </div>


            </main>

            {{-- Features section --}}

            <section id="features" class="relative z-10 mt-40 w-full bg-transparent px-6 pb-16">
                <div class="mx-auto max-w-6xl">
                    <div class="mb-10 text-center">
                        <h2 class="text-3xl font-light text-white drop-shadow-sm sm:text-4xl">What makes Fuji different
                        </h2>
                        <p class="mx-auto mt-3 max-w-2xl leading-relaxed text-white/70">
                            Fast, dependable, and designed to feel like a calm workspace for your ideas.
                        </p>
                    </div>

                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        {{-- Rich color themes (swatch) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div class="mb-4 inline-flex items-center justify-center rounded-full bg-amber-300/25 p-3">
                                <flux:icon name="swatch" variant="solid" class="h-6 w-6 text-amber-400" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">Rich color themes</h3>
                            <p class="leading-relaxed text-white/70">Pick from <span class="text-amber-200">18</span>
                                curated themes to match your mood.</p>
                            <div class="mt-4 flex gap-2">
                                <span class="h-4 w-4 rounded-full bg-rose-400/80"></span>
                                <span class="h-4 w-4 rounded-full bg-emerald-400/80"></span>
                                <span class="h-4 w-4 rounded-full bg-blue-400/80"></span>
                                <span class="h-4 w-4 rounded-full bg-amber-400/80"></span>
                                <span class="h-4 w-4 rounded-full bg-purple-400/80"></span>
                            </div>
                        </div>

                        {{-- Tag management (tag) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div
                                class="mb-4 inline-flex items-center justify-center rounded-full bg-emerald-300/25 p-3">
                                <flux:icon name="tag" variant="solid" class="h-6 w-6 text-emerald-400" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">Tag management</h3>
                            <p class="leading-relaxed text-white/70">Organize with custom tags and filter notes in
                                seconds.</p>
                        </div>

                        {{-- Light & dark (moon) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div class="mb-4 inline-flex items-center justify-center rounded-full bg-slate-300/20 p-3">
                                <flux:icon name="moon" variant="solid" class="h-6 w-6 text-slate-200" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">Light & dark appearance</h3>
                            <p class="leading-relaxed text-white/70">Comfortable in any light. Looks great day or night.
                            </p>
                        </div>

                        {{-- Responsive (device-phone-mobile) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div class="mb-4 inline-flex items-center justify-center rounded-full bg-blue-300/20 p-3">
                                <flux:icon name="device-phone-mobile" variant="solid" class="h-6 w-6 text-blue-300" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">Responsive design</h3>
                            <p class="leading-relaxed text-white/70">Smooth on desktop and mobile — no pinching or
                                squinting.</p>
                        </div>

                        {{-- Auth / Privacy (lock-closed) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div class="mb-4 inline-flex items-center justify-center rounded-full bg-cyan-300/20 p-3">
                                <flux:icon name="lock-closed" variant="solid" class="h-6 w-6 text-cyan-300" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">User authentication</h3>
                            <p class="leading-relaxed text-white/70">Private by default. Secure sign-in and note privacy
                                controls.</p>
                        </div>

                        {{-- Real-time updates (bolt) --}}
                        <div
                            class="bg-white/8 hover:bg-white/12 group rounded-2xl border border-white/10 p-8 shadow-lg backdrop-blur-md transition-all duration-500 hover:border-white/20">
                            <div class="mb-4 inline-flex items-center justify-center rounded-full bg-violet-300/20 p-3">
                                <flux:icon name="bolt" variant="solid" class="h-6 w-6 text-violet-300" />
                            </div>
                            <h3 class="mb-2 text-xl font-medium text-white/95">Real-time updates</h3>
                            <p class="leading-relaxed text-white/70">Powered by Livewire — changes appear instantly
                                without page reloads.</p>
                        </div>
                    </div>

                    {{-- Section CTA --}}
                    <div class="mt-20 flex flex-col items-center gap-6 text-center">
                        <p class="max-w-2xl text-lg font-light leading-relaxed text-white/75">
                            Simple to start, powerful as you grow.
                        </p>
                        <div class="flex gap-4">
                            @guest
                                <a href="{{ route('register') }}"
                                    class="rounded-full bg-amber-300/90 px-8 py-3 font-medium text-slate-900 shadow-lg backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-xl">
                                    Create your space
                                </a>
                                <a href="{{ route('login') }}"
                                    class="rounded-full border border-white/30 px-6 py-3 text-white/80 backdrop-blur-sm transition-all duration-300 hover:border-white/50 hover:bg-white/10 hover:text-white">
                                    Welcome back
                                </a>
                            @else
                                <a href="{{ route('note.index') }}"
                                    class="rounded-full bg-amber-300/90 px-8 py-3 font-medium text-slate-900 shadow-lg backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:bg-amber-300 hover:shadow-xl">
                                    Go to your space
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </section>



            {{-- Footer with zen simplicity --}}
            <footer class="relative z-10 mt-auto w-full border-t border-white/10 px-6 py-12">
                <div class="mx-auto max-w-7xl">
                    <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-3 md:text-left">
                        <div class="md:col-span-2">
                            <div class="mb-4 flex items-center justify-center gap-3 md:justify-start">
                                <x-app-logo class="drop-shadow-sm" />
                            </div>
                            <p class="mx-auto mb-4 max-w-md leading-relaxed text-white/60 md:mx-0">
                                A modern, mindful note-taking application built with Laravel, Livewire, and TailwindCSS.
                            </p>
                            <p class="text-sm text-white/40">
                                Made with ❤️ by <a href="https://mustaphabouddahr.netlify.app" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-amber-200/80 underline decoration-amber-200/40 transition-colors duration-300 hover:text-amber-200 hover:decoration-amber-200/80">
                                    Mustapha Bouddahr
                                </a>
                            </p>
                        </div>

                        <div class="flex flex-col items-center gap-4 md:items-end">
                            <div class="flex flex-col gap-2 text-center md:text-right">
                                <h3 class="mb-2 font-medium text-white/80">Links</h3>
                                <a href="https://github.com/must01/fuji" target="_blank" rel="noopener noreferrer"
                                    class="text-sm text-white/60 transition-colors duration-300 hover:text-white/90">
                                    View Source Code
                                </a>
                                <a href="https://github.com/must01" target="_blank" rel="noopener noreferrer"
                                    class="text-sm text-white/60 transition-colors duration-300 hover:text-white/90">
                                    My GitHub
                                </a>
                                <a href="https://mustaphabouddahr.netlify.app" target="_blank"
                                    rel="noopener noreferrer"
                                    class="text-sm text-white/60 transition-colors duration-300 hover:text-white/90">
                                    Portfolio
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-white/10 pt-8 text-center">
                        <p class="text-sm font-light tracking-wide text-white/40">
                            © {{ date('Y') }} Fuji Notes — Open source under MIT License
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>

</html>
