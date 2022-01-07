    <div class="sticky top-0 z-50">
        @if (request()->routeIs('/'))
            <p
                class="bg-orange-800 h-10 flex items-center justify-center text-sm font-medium text-white px-4 sm:px-6 lg:px-8">
                Get free delivery on orders over $100
            </p>
        @endif
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('/') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                            <h5 class="text-xl ml-4 font font-extrabold tracking-tight text-gray-900">
                                Saekopi
                            </h5>
                        </div>

                        <!-- Navigation Links -->
                        @can('admin')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                                    {{ __('Users') }}
                                </x-jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('transactions.index') }}"
                                    :active="request()->routeIs('transactions.*')">
                                    {{ 'Transactions' }}
                                </x-jet-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('products.index') }}"
                                    :active="request()->routeIs('products.*')">
                                    {{ __('Products') }}
                                </x-jet-nav-link>
                            </div>
                        @else
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="{{ route('list-products') }}"
                                    :active="request()->routeIs('list-products')">
                                    {{ __('List Products') }}
                                </x-jet-nav-link>
                            </div>
                        @endcan
                    </div>

                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Teams Dropdown -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                            <span class="inline-flex rounded-md">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                    {{ Auth::user()->currentTeam->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="w-60">
                                                <!-- Team Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Team') }}
                                                </div>

                                                <!-- Team Settings -->
                                                <x-jet-dropdown-link
                                                    href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                    {{ __('Team Settings') }}
                                                </x-jet-dropdown-link>

                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                        {{ __('Create New Team') }}
                                                    </x-jet-dropdown-link>
                                                @endcan

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Switch Teams') }}
                                                </div>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-jet-switchable-team :team="$team" />
                                                @endforeach
                                            </div>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            @endif

                            @can('admin')
                                @if (request()->routeIs('products.index'))
                                    <div class="my-2 space-x-8 sm:mr-2 sm:flex">
                                        <a href="{{ route('products.create') }}"
                                            class="mr-2 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-orange-600 hover:bg-orange-700">
                                            Create
                                        </a>
                                    </div>
                                @endif
                            @endcan
                            <!-- Settings Dropdown -->
                            <div class="mr-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover"
                                                    src="{{ Auth::user()->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                     this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>

                                </x-jet-dropdown>
                            </div>
                            @cannot('admin')
                                <a href="{{ route('list-carts.index') }}" class="group -m-2 p-2 flex items-center">
                                    <!-- Heroicon name: outline/shopping-bag -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $total_cart }}</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            @endcan
                        </div>
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = !open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class=" space-x-4 sm:ml-10 sm:flex">
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="{{ route('login') }}"
                                    class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="{{ route('register') }}"
                                    class="text-sm font-medium text-gray-700 hover:text-gray-800">Create account</a>

                                <!-- Cart -->
                                <a href="{{ route('login') }}" class="group -m-2 p-2 flex items-center">
                                    <!-- Heroicon name: outline/shopping-bag -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>

                    @endauth

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            @auth
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        @can('admin')
                            <x-jet-responsive-nav-link href="{{ route('dashboard') }}"
                                :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="{{ route('products.index') }}"
                                :active="request()->routeIs('products.*')">
                                {{ __('Products') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="{{ route('users.index') }}"
                                :active="request()->routeIs('users.*')">
                                {{ __('Users') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="{{ route('transactions.index') }}"
                                :active="request()->routeIs('transactions.*')">
                                {{ __('Transactions') }}
                            </x-jet-responsive-nav-link>
                        @else
                            <x-jet-responsive-nav-link href="{{ route('list-products') }}"
                                :active="request()->routeIs('list-products')">
                                {{ __('List Products') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex-shrink-0 mr-3">
                                    <img class="h-10 w-10 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                                    :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-responsive-nav-link
                                    href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                    :active="request()->routeIs('teams.show')">
                                    {{ __('Team Settings') }}
                                </x-jet-responsive-nav-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                                        :active="request()->routeIs('teams.create')">
                                        {{ __('Create New Team') }}
                                    </x-jet-responsive-nav-link>
                                @endcan

                                <div class="border-t border-gray-200"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endauth
        </nav>
    </div>
