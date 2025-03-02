<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // GET: Ambil semua data karyawan
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    // POST: Tambah karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required'
        ]);

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    // GET: Ambil data karyawan berdasarkan ID
    public function show($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return response()->json($employee, 200);
        }
        return response()->json(['message' => 'Employee not found'], 404);
    }

    // PUT: Update data karyawan
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->update($request->all());
            return response()->json($employee, 200);
        }
        return response()->json(['message' => 'Employee not found'], 404);
    }

    // DELETE: Hapus karyawan
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
            return response()->json(['message' => 'Employee deleted'], 200);
        }
        return response()->json(['message' => 'Employee not found'], 404);
    }
}
