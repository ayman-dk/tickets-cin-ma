<nav class="bg-white border-b border-gray-100 shadow-sm navbar-cine">
<!-- <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-cine"> -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/logo3.png') }}" alt="Logo" style="max-height: 40px;">
                <span class="text-xl font-semibold">CinéNova</span>
                </a>

            </div>

            <!-- Liens de navigation -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin.dashboardA')" :active="request()->routeIs('admin.dashboardA')">
                            Dashboard Admin
                        </x-nav-link>

                        <x-nav-link :href="route('admin.films.index')" :active="request()->routeIs('admin.films.*')">
                             Films
                        </x-nav-link>

                        <x-nav-link :href="route('admin.seances.index')" :active="request()->routeIs('admin.seances.*')">
                             Séances
                        </x-nav-link>

                        <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                             Catégories
                        </x-nav-link>

                        <x-nav-link :href="route('admin.salles.index')" :active="request()->routeIs('admin.salles.*')">
                             Salles
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('user.dashboardU')" :active="request()->routeIs('user.dashboardU')">
                             Accueil
                        </x-nav-link>

                        <x-nav-link :href="route('user.films.index')" :active="request()->routeIs('user.films.*')">
                             Films
                        </x-nav-link>

                        <x-nav-link :href="route('user.reservations.index')" :active="request()->routeIs('reservations.*')">
                             Mes Réservations
                        </x-nav-link>
                    @endif
                @endauth
            </div>

            <!-- Compte -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                    <x-slot name="content">
                    <x-dropdown-link
                        :href="route('profile.edit')"
                        class="bg-gray-800 text-white hover:bg-gray-700 hover:text-yellow-400"
                    >Mon Profil
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                       <x-dropdown-link
                        :href="route('logout')"
                        class="bg-gray-800 text-white hover:bg-gray-700 hover:text-yellow-400"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        >Se déconnecter
                    </x-dropdown-link>
                    </form>
                    </x-slot>

                    </x-dropdown>
                @endauth
            </div>
        </div>
    </div>
</nav>
