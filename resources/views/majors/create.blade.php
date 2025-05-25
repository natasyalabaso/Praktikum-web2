<x-default-layout title="Major" section_title="Add new major">
    <div class="grid grid-cols-7">
        <form action="{{ route('majors.store') }}" method="POST"
            class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-100 shadow col-span-3 md:col-span-2">
            @csrf
            @method("POST")

            <div class="flex flex-col gap-2">
                <label for="name">Major Name</label>
                <input type="text" id="name" name="name"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50" 
                    placeholder="Major Name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="code">Major Code</label>
                <input type="text" id="code" name="code"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50" 
                    placeholder="Major code" value="{{ old('code') }}">
                @error('code')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="description">Description</label>
                <textarea id="description" name="description"
                    class="px-3 py-2 border border-zinc-300 bg-slate-50" 
                    placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="self-end flex gap-2">
                <a href="{{ route('students.index') }}"
                    class="bg-slate-50 border border-slate-500 text-slate-500 px-3 py-2 cursor-pointer">
                    <span>Cancel</span>
                </a>
                <button type="submit"
                    class="bg-blue-500 text-white px-3 py-2 cursor-pointer hover:bg-blue-600">
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
