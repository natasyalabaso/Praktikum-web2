<x-default-layout title="Student" section_title="Edit student data">
    <div class="grid grid-cols-3">
        <form action="{{ route('students.update', $student->id) }}" method="POST"
            class="col-span-3 col-start-1 p-6 bg-white border border-zinc-300 shadow md:col-span-2">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name"
                        class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="Full Name" value="{{ old('name', $student->name) }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="student_id_number">Student ID Number</label>
                    <input type="text" id="student_id_number" name="student_id_number"
                        class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="Student ID (e.g., F551220##)"
                        value="{{ old('student_id_number', $student->student_id_number) }}">
                    @error('student_id_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 pt-4">
                <div class="flex flex-col gap-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                        class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="student@example.com" value="{{ old('email', $student->email) }}">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-col gap-2">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number"
                        class="px-3 py-2 border border-zinc-300 bg-slate-50"
                        placeholder="Phone number (e.g., 08123456789)"
                        value="{{ old('phone_number', $student->phone_number) }}">
                    @error('phone_number')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2 pt-4">
                <label for="birth_date">Birth Date</label>
                <input type="date" id="birth_date" name="birth_date"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50"
                    value="{{ old('birth_date', $student->birth_date) }}">
                @error('birth_date')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 pt-4">
                <label for="gender">Gender</label>
                <select name="gender" id="gender"
                    class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled {{ old('gender', $student->gender) == '' ? 'selected' : '' }}>Select Gender</option>
                    <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 pt-4">
                <label for="majors">Majors</label>
                <select name="majors" id="majors"
                    class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled>Select Majors</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major->id }}"
                            {{ old('majors', $student->majors_id) == $major->id ? 'selected' : '' }}>
                            {{ $major->name }}
                        </option>
                    @endforeach
                </select>
                @error('majors')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2 pt-4">
                <label for="status">Status</label>
                <select name="status" id="status"
                    class="px-3 py-2 border border-zinc-300 appearance-none bg-slate-50">
                    <option value="" disabled {{ old('status', $student->status) == '' ? 'selected' : '' }}>
                        Select student status
                    </option>
                    <option value="Active" {{ old('status', $student->status) == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status', $student->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="Graduated" {{ old('status', $student->status) == 'Graduated' ? 'selected' : '' }}>Graduated</option>
                    <option value="Dropped out" {{ old('status', $student->status) == 'Dropped out' ? 'selected' : '' }}>Dropped Out</option>
                </select>
                @error('status')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="self-end flex gap-2 pt-6">
                <a href="{{ route('students.index') }}"
                    class="bg-slate-50 border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Cancel</span>
                </a>
                <button type="submit"
                    class="bg-blue-50 border border-blue-500 text-blue-500 px-3 py-2 flex items-center gap-2 cursor-pointer">
                    <i class="ph ph-floppy-disk block text-blue-500"></i>
                    <span>Updated</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>