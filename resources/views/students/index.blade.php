<x-default-layout title="Student" section_title="Students">
    @if (session('success'))
        <div class="bg-green-500 border border-green-500 text-green-500 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif

    @can('store-student')
        <div class="flex">
            <a href="{{ route('students.create') }}"
               class="bg-green-50 border border-green-500 px-3 py-2 flex items-center gap-2">
                <i class="ph ph-plus block text-green-500"></i>
                Add Student
            </a>
        </div>
    @endcan

    <div class="overflow-auto">
        <div class="min-w-full bg-white shadow">
            <table class="border-zinc-200 text-sm text-left leading-normal">
                <thead>
                    <tr class="bg-zinc-100 border-b border-zinc-200 text-left leading-normal">
                        <th class="px-3 py-3 text-left">#</th>
                        <th class="px-3 py-3 text-left">Name</th>
                        <th class="px-3 py-3 text-center">Student ID Numbers</th>
                        <th class="px-3 py-3 text-center">Major</th>
                        <th class="px-3 py-3 text-center">Gender</th>
                        <th class="px-3 py-3 text-center">Address</th>
                        <th class="px-3 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 text-sm font-light">
                    @forelse ($students as $student)
                        <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                            <td class="px-3 py-3">{{ $loop->iteration }}</td>
                            <td class="px-3 py-3">{{ $student->name }}</td>
                            <td class="px-3 py-3 text-center">{{ $student->id_number }}</td>
                            <td class="px-3 py-3 text-center">{{ $student->major->name }}</td>
                            <td class="px-3 py-3 text-center">{{ $student->gender }}</td>
                            <td class="px-3 py-3 text-center">{{ $student->address }}</td>
                            <td class="px-3 py-3 text-center">
                                @can('edit-student')
                                    <a href="{{ route('students.edit', $student->id) }}"
                                       class="bg-yellow-50 border border-yellow-500 px-2 inline-block">
                                        <i class="ph ph-note-pencil block text-yellow-500"></i>
                                    </a>
                                @endcan

                                @can('destroy-student')
                                    <form onsubmit="return confirm('Are you sure?')" method="POST"
                                          action="{{ route('students.destroy', $student->id) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-50 border border-red-500 px-2">
                                            <i class="ph ph-trash-simple block text-red-500"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center py-4 text-zinc-500">No students found.</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
