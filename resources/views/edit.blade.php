<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Form') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-screen p-6 bg-white shadow-md">
            <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="flex flex-col mb-4">
                    <label for="productName">
                        Name:
                    </label>
                    <input type="text" name="productName" placeholder="Ex: F-22 Raptor" id="productName" value="{{ $employee->productName }}" required>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="productID">
                        Product ID:
                    </label>
                    <input type="text" name="productID" placeholder="Ex: 123XXXXX" id="productID" value="{{ $employee->productID }}" required>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="owner">
                        Manufacturer:
                    </label>
                    <input type="text" name="owner" placeholder="Ex: Lockheed Martin" id="owner" value="{{ $employee->owner }}" required>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="location">
                        Location:
                    </label>
                    <input type="text" name="location" placeholder="Ex: USA" id="location" value="{{ $employee->location }}" required>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="description">
                        Description:
                    </label>
                    <input type="text" name="description" placeholder="Add a description" id="description" value="{{ $employee->description }}" required>
                </div>

                <div class="flex flex-col">
                    <label for="productImage" class="font-semibold">
                        Image URL:
                    </label>
                    <input type="text" name="productImage" value="{{ $employee->productImage }}" placeholder="Enter Image URL" id="productImage" required class="border rounded p-2 focus:outline-none focus:border-blue-500">
                    <div class="mt-2">
                        <img id="previewImage" src="{{ $employee->productImage }}" class="max-w-full h-auto" alt="Preview Image" />
                    </div>
                </div>
        
                <div class="flex justify-between">
                    <button type="submit" class="bg-green-500 text-white font-semibold py-2 px-6 rounded hover:bg-green-600 focus:outline-none">
                        Update
                    </button>
                    <a href="{{ route('employee.show') }}" class="bg-red-500 text-white font-semibold py-2 px-6 rounded hover:bg-red-600 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
