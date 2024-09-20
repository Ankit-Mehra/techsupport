<div class="w-64 bg-white border-r border-gray-200 hidden sm:block">
    <div class="h-16 flex items-center justify-center bg-gray-500">
        <!-- Logo -->
        <a href="{{ route('tickets.index') }}">
            <x-application-logo class="block h-10 w-auto fill-white text-gray-800" />
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 mt-5">
        <x-sidebar-link :href="route('tickets.index')" :active="request()->routeIs('tickets.index')">
            {{ __('Dashboard') }}
        </x-sidebar-link>

        <x-sidebar-link :href="route('tickets.create')" :active="request()->routeIs('tickets.create')">
            {{ __('New Ticket') }}
        </x-sidebar-link>

    </nav>

    <!-- User Settings -->
    <div class="absolute bottom-0 w-full">
        <div class="border-t border-gray-200">
            <div class="flex items-center px-4 py-4">
                <div>
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div>
                <x-sidebar-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-sidebar-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" class="px-1 py-6">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-600 hover:bg-gray-100 px-3 py-2 rounded-md">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
