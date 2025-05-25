<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Majors;
use Illuminate\Support\Facades\Gate; // Penting untuk otorisasi menggunakan Gate

class StudentController extends Controller
{
    public function index()
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'view-student'
        if (! Gate::allows('view-student')) {
            abort(401); // Menghentikan eksekusi dengan status 401 Unauthorized
        }

        // Logika untuk menampilkan daftar semua student
        $students = Student::with('majors')->get();
        return view('students.index', compact('students'));
    }

    public function show(string $id)
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'view-student'
        if (! Gate::allows('view-student')) {
            abort(401);
        }

        // Logika untuk menampilkan detail student berdasarkan $id
        $student = Student::with('majors')->find($id);
        return view('students.show', compact('student'));
    }

    public function create()
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'store-student'
        if (! Gate::allows('store-student')) {
            abort(401);
        }

        // Logika untuk menampilkan form pembuatan student baru
        $majors = Majors::all();
        return view('students.create', compact('majors'));
    }

    public function store(Request $request)
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'store-student'
        if (! Gate::allows('store-student')) {
            abort(401);
        }

        // Validasi data input dari request
        $validated = $request->validate([
            'name' => 'required',
            'student_id_number' => 'required|unique:students|max:9',
            'email' => 'required|email|unique:students',
            'phone_number' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Female,Male',
            'majors' => 'required', // Ini akan menjadi major_id
            'status' => 'required|in:Active,Inactive,Graduated,Dropped out',
        ]);

        // Membuat student baru di database
        Student::create([
            'name' => $validated['name'],
            'student_id_number' => $validated['student_id_number'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'status' => $validated['status'],
            'major_id' => $validated['majors'], // Pastikan ini sesuai dengan nama kolom di tabel students
        ]);

        // Redirect ke halaman index students dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function edit(string $id)
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'edit-student'
        if (! Gate::allows('edit-student')) {
            abort(401);
        }

        // Logika untuk menampilkan form edit student
        $student = Student::with('majors')->find($id);
        $majors = Majors::all();
        return view('students.edit', compact('student', 'majors'));
    }

    public function update(Request $request, string $id)
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'edit-student'
        if (! Gate::allows('edit-student')) {
            abort(401);
        }

        // Validasi data input untuk update
        $validated = $request->validate([
            'name' => 'required',
            // Unique rule dengan pengecualian ID student yang sedang diedit
            'student_id_number' => "required|unique:students,student_id_number,$id|max:9",
            'email' => "required|email|unique:students,email,$id",
            'phone_number' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Female,Male',
            'majors' => 'required', // Ini akan menjadi major_id
            'status' => 'required|in:Active,Inactive,Graduated,Dropped out',
        ]);

        // Cari student yang akan diupdate
        $student = Student::find($id);

        // Update data student
        $student->update([
            'name' => $validated['name'],
            'student_id_number' => $validated['student_id_number'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'birth_date' => $validated['birth_date'],
            'gender' => $validated['gender'],
            'status' => $validated['status'],
            'major_id' => $validated['majors'], // Pastikan ini sesuai dengan nama kolom di tabel students
        ]);

        // Redirect ke halaman index students dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(string $id)
    {
        // Pemeriksaan otorisasi: hanya izinkan jika pengguna memiliki izin 'destroy-student'
        if (! Gate::allows('destroy-student')) {
            abort(401);
        }

        // Cari student dan hapus
        $student = Student::findOrFail($id); // Gunakan findOrFail untuk menangani jika student tidak ditemukan
        $student->delete();

        // Redirect ke halaman index students dengan pesan sukses
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}