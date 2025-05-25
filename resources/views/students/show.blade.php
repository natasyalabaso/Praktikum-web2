<x-default-layout title="Student" section_title="Student detail">
    <div class="grid grid-cols-3">
        <div
            class="flex flex-col gap-4 px-6 py-4 bg-white border
            border-t-4 border-zinc-300 shadow col-span-3 md:col-span-2">
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <div>Name</div>
                    <div class="px-3 py-2 border border-zinc-300 ">
                        {{ $student->name }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Student ID Number</div>
                    <div class="px-3 py-2 border border-zinc-300 ">
                        {{ $student->student_id_number }}
                    </div>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <div>Email</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ $student->email }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Phone Number</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ $student->phone_number }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Birth date</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ date('d F Y', strtotime($student->birth_date)) }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Gender</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ $student->gender }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Majors</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ $student->majors->name }}
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div>Status</div>
                    <div class="px-3 py-2 border border-zinc-300">
                        {{ $student->status }}
                    </div>
                </div>
                <div class="self-end flex gap-2">
                    <a href="{{ route('students.index') }}" class="bg-slate-50 border
                        border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                        <span>Back</span>
                    </a>
                    <a href="{{ route('students.edit', $student->id) }}" 
                        class="bg-yellow-50 border border-yellow-500 text-yellow-500 
                        px-3 py-2 flex items-center gap-2 cursor-pointer">
                        <i class="ph ph-note-pencil block text-yellow-500"></i>
                        <span>Edit</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>