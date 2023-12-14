<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($employees as $employee)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h4 class="text-lg font-semibold">
                        {{ $employee->productName }}
                    </h4>
                    <p class="text-sm">
                        ID: {{ $employee->productID }}
                    </p>
                    <br />
                    <p>
                        {{ $employee->owner }}
                    </p>
                    <p>
                        {{ $employee->location }}
                    </p>
                    <br />
                    <p className="mt-10 font-semibold">
                        Description
                        <hr />
                        <br />
                        <span class="text-gray-500 font-normal">
                            {{ $employee->description }}
                        </span>
                    </p>
                    <br />
                    <div class="flex w-full justify-between items-center space-x-3">
                        <a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-info text-white bg-green-500 px-5 py-1 rounded shadow-md">
                            Edit
                        </a>
                        
                        <form action="{{ route('employee.delete', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" style="background-color: #ff0000; color: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border-radius: 5px; padding: 5px 15px;">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <iframe id="editFrame" src="" width="100%" height="500px"></iframe>
        </div>
    </div>
    <script>
        function openEditModal(editUrl) {
            var modal = document.getElementById('editModal');
            var editFrame = document.getElementById('editFrame');
            editFrame.src = editUrl;
            modal.style.display = 'block';
        }

        function closeEditModal() {
            var modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }
    </script>
</x-app-layout>
