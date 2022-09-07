<x-admin-layout>
    <div class="inline-flex border-b border-gray-100 w-full">
        <button
            class="h-10 px-4 py-2 -mb-px text-sm text-white text-center bg-transparent border-b-2 border-zinc-500 sm:text-base border-blue-400 whitespace-nowrap focus:outline-none">
            All Users
        </button>
    </div>

    <div x-data="{ open: false }" class="overflow-x-auto relative mt-3">
        <form action="{{ route('admin.users.search') }}" method="GET" class="flex mb-3">
            <input type="text" name="search" class="bg-zinc-700 p-2 border-zinc-800 outline-none w-full text-white"
                placeholder="Search user..." />
            <button type="submit" class="bg-zinc-900 p-2 text-white">Search</button>
        </form>

        @if(request()->input('search'))
        <h1 class="text-lg text-white mb-2">Showing search results for <strong>{{ request()->input('search') }}</strong>
        </h1>
        @endif

        @if(request()->input('search') && $users->isEmpty())
        <h1 class="text-white">No users found with <strong>{{ request()->input('search') }}</strong> in their name.</h1>
        @else
        <table class="w-full text-sm text-left text-gray-100">
            <thead class="text-xs uppercase bg-zinc-900 text-gray-100">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Full Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        E-Mail Address
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Job Title
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Contact Number
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b bg-zinc-700 border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                        {{ $user->name }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $user->email }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $user->job_title }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $user->contact_number }}
                    </td>
                    <td class="py-4 px-6 flex space-x-2">
                        <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="text-blue-400">Edit</a>
                        <form action="/admin/users/delete/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400">Delete</butt>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if(session('success'))
        <div class="bg-green-500 mt-2 p-2 w-full text-white font-bold">{{ session('success') }}</div>
        @endif

        {{-- @foreach($users as $row)
        <div id="editUser_{{$user->id}}">
            <x-modal>
                <div>
                    <x-label for="name">Full Name</x-label>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $row->name }}"
                        required autocomplete="current-password" />
                </div>

                <x-slot name="modalFooter">
                    <button type="button" @click="open = false"
                        class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                        Cancel
                    </button>

                    <button type="button"
                        class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                        Edit
                    </button>
                </x-slot>
            </x-modal>
        </div>
        @endforeach --}}

        @endif
        <div class="text-white mt-2">
            {{ $users->links('') }}
        </div>
    </div>

</x-admin-layout>