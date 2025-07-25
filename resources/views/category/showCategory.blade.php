<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-3xl font-bold text-center text-gray-800 uppercase mb-8">Add Category</h1>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('category.create') }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
                    @csrf

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                        <input
                            type="text"
                            name="category"
                            id="category"
                            placeholder="Enter category name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition duration-200"
                            required
                        >
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300"
                    >
                        Add
                    </button>
                </form>

            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-3xl font-bold text-center text-gray-800 uppercase mb-6">Category List</h1>
                <ul class="max-w-2xl mx-auto list-none p-0">
                    @foreach ($categories as $category)
                        <li class="bg-gray-100 p-4 mb-3 rounded-lg border border-gray-300 flex justify-between items-center hover:bg-blue-500 hover:text-white hover:transform hover:translate-x-1 transition-all duration-300 ease-in-out">
                            <span>{{ $category->name }}</span>
                            <div class="flex space-x-4">
                                <!-- Edit Button -->
                                <a
                                    href="{{ route('category.edit', $category->id) }}"
                                    class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-400 transition-all duration-300"
                                >
                                    Edit
                                </a>
                                
                                <!-- Delete Button (wrapped in a form to handle DELETE request) -->
                                <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-400 transition-all duration-300">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Pagination Links -->
                <div class="flex justify-center mt-6">
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>