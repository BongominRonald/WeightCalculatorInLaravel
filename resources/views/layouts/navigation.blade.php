<nav x-data="{ open: false, logoutModal: false }" class="bg-white border-b border-[#eee]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-['Spartan'] text-lg font-extrabold tracking-tight text-[#24126A]">
                        S6<span class="text-[#3E80FF]">Weight</span>Calculator
                    </a>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('olevel.subjects')" :active="request()->routeIs('olevel.subjects')">
                        {{ __('O-Level Subjects') }}
                    </x-nav-link>
                    <x-nav-link :href="route('olevel.scores')" :active="request()->routeIs('olevel.scores')">
                        {{ __('O-Level Scores') }}
                    </x-nav-link>
                    <x-nav-link :href="route('alevel.subjects')" :active="request()->routeIs('alevel.subjects')">
                        {{ __('A-Level Subjects') }}
                    </x-nav-link>
                    <x-nav-link :href="route('alevel.scores')" :active="request()->routeIs('alevel.scores')">
                        {{ __('A-Level Scores') }}
                    </x-nav-link>
                    <x-nav-link :href="route('weight')" :active="request()->routeIs('weight')">
                        {{ __('Weight') }}
                    </x-nav-link>
                    <x-nav-link :href="route('view')" :active="request()->routeIs('view')">
                        {{ __('View Results') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-2">
                <button onclick="document.documentElement.classList.toggle('dark'); localStorage.setItem('dark', document.documentElement.classList.contains('dark'))"
                        class="p-2 rounded-full text-[#727272] hover:text-[#3E80FF] hover:bg-[#F4F7FA] dark:hover:bg-[#2a2a4a] transition-all duration-300 mr-2">
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                </button>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-[30px] text-[#727272] bg-white hover:text-[#3E80FF] focus:outline-none transition-all duration-300">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="#" @click.prevent="logoutModal = true">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button onclick="document.documentElement.classList.toggle('dark');localStorage.setItem('dark',document.documentElement.classList.contains('dark'))"
                        class="p-2 rounded-full text-[#727272] hover:text-[#3E80FF] hover:bg-[#F4F7FA] dark:hover:bg-[#2a2a4a] transition-all duration-300 mr-2">
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                </button>
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#727272] hover:text-[#3E80FF] hover:bg-[#F4F7FA] focus:outline-none focus:bg-[#F4F7FA] focus:text-[#3E80FF] transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('olevel.subjects')" :active="request()->routeIs('olevel.subjects')">
                {{ __('O-Level Subjects') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('olevel.scores')" :active="request()->routeIs('olevel.scores')">
                {{ __('O-Level Scores') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('alevel.subjects')" :active="request()->routeIs('alevel.subjects')">
                {{ __('A-Level Subjects') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('alevel.scores')" :active="request()->routeIs('alevel.scores')">
                {{ __('A-Level Scores') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('weight')" :active="request()->routeIs('weight')">
                {{ __('Weight') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('view')" :active="request()->routeIs('view')">
                {{ __('View Results') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-[#eee]">
            <div class="px-4">
                <div class="font-medium text-base text-[#24126A]">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[#727272]">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="#" @click.prevent="logoutModal = true; open = false">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>

    <div x-show="logoutModal"
         x-cloak
         @keydown.escape.window="logoutModal = false"
         class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0">
        <div x-show="logoutModal"
             class="fixed inset-0 transform transition-all"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 opacity-75" @click="logoutModal = false"></div>
        </div>
        <div x-show="logoutModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="mb-6 bg-white rounded-[10px] overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-lg sm:mx-auto">
            <div class="p-6">
                <h2 class="font-['Spartan'] text-lg font-medium text-[#24126A]">Confirm Logout</h2>
                <p class="mt-2 text-sm text-[#727272]">Are you sure you want to log out?</p>
                <div class="mt-6 flex justify-end gap-3">
                    <x-secondary-button @click="logoutModal = false">Cancel</x-secondary-button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button type="submit" class="!bg-red-600 hover:!bg-red-500">Log Out</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
