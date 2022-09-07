<x-admin-layout>
    <h1 class="text-white text-xl">Edit user <strong>{{ $user->name }}</strong></h1>

    @if(session('success'))
    <div class="bg-green-500 mt-2 p-2 w-full text-white font-bold">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.users.edit', ['id' => $user->id]) }}" method="POST"
        class="bg-zinc-900 p-5 text-white flex flex-col mt-5 space-y-3">

        @csrf

        <label for="name">Full Name</label>
        <input id="name" name="name" type="text" class="bg-zinc-800 border-0 outline-none rounded mt-2"
            value="{{ $user->name }}" />

        <label for="email">Email Address</label>
        <input id="email" name="email" type="email" class="bg-zinc-800 border-0 outline-none rounded mt-2"
            value="{{ $user->email }}" />

        <label for="job_title">Job Title</label>
        <input id="job_title" name="job_title" type="text" class="bg-zinc-800 border-0 outline-none rounded mt-2"
            value="{{ $user->job_title }}" />

        <label for="contact_number">Contact Number</label>
        <input id="contact_number" name="contact_number" type="numeric"
            class="bg-zinc-800 border-0 outline-none rounded mt-2 p-2" value="{{ $user->contact_number }}" />

        <label for="roles">Roles:</label>
        @foreach($roles as $role)
        <fieldset>
            <legend class="sr-only">Roles</legend>

            <div class="flex items-center">
                @if($user->hasRole($role->name))
                <input id="role-option" type="radio" name="role" value="{{ $role->name }}"
                    class="w-4 h-4 bg-gray-700 border-gray-600" checked>
                <label for="role-option" class="block ml-2 text-sm font-medium text-gray-300">
                    {{ $role->name }}
                </label>
                @else
                <input id="role-option" type="radio" name="role" value="{{ $role->name }}"
                    class="w-4 h-4 bg-gray-700 border-gray-600">
                <label for="role-option" class="block ml-2 text-sm font-medium text-gray-300">
                    {{ $role->name }}
                </label>
                @endif
            </div>
        </fieldset>
        @endforeach

        <button type="submit" class="bg-zinc-800 p-2 hover:bg-neutral-800">Edit</button>
    </form>
</x-admin-layout>