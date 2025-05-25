<x-default-layout title="Dashboard" section_title="Dashboard">
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="px-6 py-4 bg-sky-50 border hover:border-l-4 border-sky-400 space-y-1.5 shadow duration-200">
            <div class="text-zinc-600 text-sm">Total Students</div>
            <div class="text-2xl font-bold">521</div>
        </div>
        <div class="px-6 py-4 bg-green-50 border hover:border-l-4 border-green-400 space-y-1.5 shadow duration-200">
            <div class="text-zinc-600 text-sm">Total Majors</div>
            <div class="text-2xl font-bold">14</div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3 sm:col-span-2 overflow-x-auto">
            <table class="min-w-full bg-white shadow">
                <thead>
                    <tr class="border-b border-zinc-200 text-sm leading-normal">
                        <th class="py-3 px-6 text-left">#</th>
                        <th class="py-3 px-6 text-left">Majors</th>
                        <th class="py-3 px-6 text-center">Total Students</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 text-sm font-light">
                    <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                        <td class="py-3 px-6 text-left">1</td>
                        <td class="py-3 px-6 text-left">S1 Teknik Informatika</td>
                        <td class="py-3 px-6 text-center">153</td>
                    </tr>
                    <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                        <td class="py-3 px-6 text-left">2</td>
                        <td class="py-3 px-6 text-left">S1 Sistem Informasi</td>
                        <td class="py-3 px-6 text-center">124</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>