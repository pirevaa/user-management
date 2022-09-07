<x-admin-layout>
    <div class="text-xl text-white">
        Admin Dashboard
    </div>

    <div class="md:flex justify-between md:space-x-5">
        <div class="bg-zinc-700 text-white mt-3 p-5 rounded shadow-md md:w-3/6">
            <h1 class="text-md font-bold">Total users:</h1>
            <p class="my-2 text-3xl">{{ count($users) }}</p>
        </div>
        <div class="bg-zinc-700 text-white mt-3 p-5 rounded shadow-md md:w-3/6">
            <h1 class="text-md font-bold">Newest user:</h1>
            <p class="my-2 text-3xl">{{ $newestUser->name }}</p>
        </div>
    </div>
</x-admin-layout>