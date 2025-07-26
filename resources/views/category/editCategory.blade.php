<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h1 class="text-3xl font-bold text-center text-gray-800 uppercase mb-8">Edit Category</h1>

                <form method="POST" action="{{ route('category.update', $category->id) }}" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                        <input
                            type="text"
                            name="category"
                            id="category"
                            value="{{ old('category', $category->name) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
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
                        Update
                    </button>

                    <div class="mt-2">
                        <a href="{{ route('category.show') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 12h14"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                </form>
            </div>
</x-app-layout>