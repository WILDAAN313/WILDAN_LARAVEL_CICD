<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Categories</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Categories Records
                </p>

                <button
                    class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                    onclick="location.href='{{ route('admin.category.create') }}';">
                    Add Category
                </button>

                <div class="bg-white overflow-auto rounded shadow">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Slug</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Parent</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Children</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Added by</th>
                                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $category->id }}</td>

                                    {{-- الاسم --}}
                                    <td class="py-4 px-6 border-b border-grey-light font-medium">
                                        {{ $category->name }}
                                    </td>

                                    {{-- السلاج --}}
                                    <td class="py-4 px-6 border-b border-grey-light text-gray-600">
                                        {{ $category->slug }}
                                    </td>

                                    {{-- اسم الأب --}}
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        {{ optional($category->parent)->name ?? '—' }}
                                    </td>

                                    {{-- عدد الأبناء --}}
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <span class="inline-flex items-center text-xs px-2 py-1 rounded bg-gray-100">
                                            {{ $category->children_count ?? $category->children->count() }}
                                        </span>
                                    </td>

                                    {{-- المضاف بواسطة --}}
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        {{ optional($category->user)->name ?? '—' }}
                                    </td>

                                    {{-- إدارة --}}
                                    <td class="py-4 px-6 border-b border-grey-light space-x-2 whitespace-nowrap">
                                        <button
                                            class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                            type="button"
                                            onclick="location.href='{{ route('admin.category.edit', $category->id) }}';">
                                            Edit
                                        </button>

                                        <form method="POST"
                                              style="display:inline"
                                              action="{{ route('admin.category.destroy', $category->id) }}"
                                              onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-6 px-6 text-center text-gray-500">
                                        No categories found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
</x-admin-layout>
