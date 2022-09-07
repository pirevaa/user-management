<div class="flex flex-col md:w-2/12 bg-zinc-900 md:h-screen border-r border-zinc-700 py-2 px-2">
    <h1 class="text-xl font-semibold text-gray-100 mx-auto mt-3">User Management</h1>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <x-side-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                {{ __('Dashboard') }}
            </x-side-link>

            <x-side-link :href="route('admin.users')" :active="request()->routeIs('admin.users*')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                {{ __('Users') }}
            </x-side-link>
        </nav>
    </div>
</div>