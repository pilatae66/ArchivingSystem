<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex justify-between w-full">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-500 dark:hover:text-gray-400" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                <div class="space-x-8 -my-px ms-10 flex justify-between">
                    <x-nav-link :href="route('home')" :active="request()->routeIs(['item.*', 'home'])">
                        {{ __('Items') }}
                    </x-nav-link>
                    <x-nav-link-logout :action="route('logout')" method="post">
                        {{ __('Logout') }}
                    </x-nav-link-logout>
                </div>
                @endauth
                @guest
                <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex float-end">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-nav-link>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>