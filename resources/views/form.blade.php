<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                <form action="/employee" method="POST" class="space-y-4">
                    @csrf

                    <div class="flex flex-col">
                        <label for="productName" class="font-semibold">
                            Name:
                        </label>
                        <input type="text" name="productName" placeholder="Ex: F-22 Raptor" id="productName" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="productID" class="font-semibold">
                            Product ID:
                        </label>
                        <input type="text" name="productID" placeholder="Ex: 123XXXXX" id="productID" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="owner" class="font-semibold">
                            Manufacturer:
                        </label>
                        <input type="text" name="owner" placeholder="Ex: Lockheed Martin" id="owner" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="location" class="font-semibold">
                            Location:
                        </label>
                        <input type="text" name="location" placeholder="Ex: USA" id="location" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="font-semibold">
                            Description:
                        </label>
                        <input type="text" name="description" placeholder="Add a description" id="description" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    </div>

                    <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600 focus:outline-none">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
