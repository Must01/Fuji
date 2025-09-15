<!DOCTYPE html>
<html class="dark scroll-smooth">

    <head>
        @include('partials.head')
    </head>

    <body class="min-h-screen bg-white dark:bg-zinc-800">
        {{-- Notification Toast --}}
        <div x-data="{ show: false, message: '', type: 'info' }"
            x-on:notify.window="
            show = true;
            message = $event.detail.message;
            type = $event.detail.type;
            setTimeout(() => show = false, 3000);
        "
            x-show="show" x-transition class="fixed bottom-6 right-6 z-50">
            <div class="flex items-center gap-3 rounded-xl border px-4 py-3 shadow-lg"
                :class="{
                    'bg-green-100 dark:bg-green-900 border-green-300 dark:border-green-700 text-green-800 dark:text-green-200': type === 'success',
                    'bg-blue-100 dark:bg-blue-900 border-blue-300 dark:border-blue-700 text-blue-800 dark:text-blue-200': type === 'info',
                    'bg-red-100 dark:bg-red-900 border-red-300 dark:border-red-700 text-red-800 dark:text-red-200': type === 'error'
                }">
                <span class="flex-1 text-sm font-medium" x-text="message"></span>

                <flux:button icon="x-mark" @click="show = false" size="xs" variant="subtle"
                    class="text-current hover:bg-black/5 dark:hover:bg-white/5">
                </flux:button>
            </div>
        </div>

        {{-- Sidebar --}}
        <flux:sidebar sticky stashable dismissible inset="left"
            class="z-40 border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">

            {{-- Mobile close button --}}
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" inset="left" />

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            {{-- Main nav --}}
            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="pencil-square" :href="route('note.index')"
                        :current="request()->routeIs('note.index')" wire:navigate>
                        Notes
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            {{-- Footer nav --}}
            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/must01/fuji" target="_blank">
                    Source Code
                </flux:navlist.item>

                <flux:navlist.item icon="user-circle" href="https://mustaphabouddahr.netlify.app" target="_blank">
                    Portfolio
                </flux:navlist.item>
            </flux:navlist>

            {{-- Desktop User Menu --}}
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down" />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                            class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        {{-- Mobile Header (hamburger + user menu) --}}
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                            {{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                            class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
        @livewire('livewire-ui-modal')
        @livewireScripts
    </body>

</html>
