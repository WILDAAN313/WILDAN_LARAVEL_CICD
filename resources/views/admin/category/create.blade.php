<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Add Category</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Category Details
                </p>

                <form method="POST" action="{{ route('admin.category.store') }}">
                    @csrf

                    <div class="grid gap-6 mb-6 md:grid-cols-2">

                        {{-- Category Name --}}
                        <div class="mb-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Category Name
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="e.g. News" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category Slug --}}
                        <div class="mb-1">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Category Slug
                            </label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="e.g. news" required>
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Parent Category --}}
                        <div class="mb-1 md:col-span-2">
                            <label for="parent_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Parent Category (optional)
                            </label>
                            <select id="parent_id" name="parent_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- None (Main Category) --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <button type="submit"
                        class="px-4 py-2 text-white font-semibold tracking-wider bg-blue-600 hover:bg-blue-700 rounded transition">
                        Add Category
                    </button>
                </form>
            </div>
        </main>
    </div>
</x-admin-layout>
