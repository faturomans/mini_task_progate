<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employee;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function emoployees(Request $request) {
        $query = Employee::query();
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $dataEmployees = Employee::where(function ($query) use ($searchTerm) {
                $query->where('full_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_id', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('dapartement', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
                // Tambahkan orWhere untuk setiap field yang ingin Anda cari.
            })->orderBy('id', 'desc')->paginate(5);
        }
        $dataEmployees = $query->paginate(5);
        //$dataEmployees = Employee::all();
        $dataCompanies = Companies::all();

        return view('admin.employees.employees', compact('dataEmployees','dataCompanies',),
        ["title" => "Employees"]);
    }

    public function create() {
        $comapny_ids = Companies::get();
        return view('admin.employees.create', compact('comapny_ids'),
        ["title" => "Create"]);
    }

    public function insert(Request $request) {
        $this->validate($request, [
            // 'company_id' => 'required|',
            'company_id' => 'required|',
            'full_name' => 'required|',
            'dapartement' => 'required|',
            'email' => 'required|unique:employees,email',
            'phone' => 'required|',
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'full_name.required' => 'Name wajib diisi',
            'dapartement.required' => 'Dapartement wajib diisi',
            'email.required' => 'Email wajib diisi',
            'phone.required' => 'Phone Phone wajib diisi',
        ]);
        //dd($request->all());
        $user = Companies::where('company_email', $request->input('email'))->first();
        if ($user) {
            return redirect()->back()->with('error', 'Email Sudah Ada Pada Pengguna Lain.');
         }
        $dataEmployees = Employee::create([
            'full_name' => $request->full_name,
            'company_id' => $request->company_id,
            'dapartement' => $request->dapartement,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('admin-data-emoployees')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function look($id) {
        $company_ids = Companies::get();
        $look = Employee::find($id);
        //dd($ubah);
        return view('admin.employees.update', compact('look','company_ids'),
         ["title" => "Show"]);
    }

    public function detail($id) {
        $company_ids = Companies::get();
        $detail = Employee::find($id);
        return view('admin.employees.detail', compact('detail','company_ids'),
         ["title" => "Detail"]);
    }

    public function update(Request $request, $id) {
        $dataEmployees = Employee::find($id);
        $dataEmployees->full_name = $request->input('full_name');
        $dataEmployees->company_id = $request->input('company_id');
        $dataEmployees->dapartement = $request->input('dapartement');
        $dataEmployees->email = $request->input('email');
        $dataEmployees->phone = $request->input('phone');
        $dataEmployees->update();
        // if(session('halaman_url')) {
        //     return redirect(session('halaman_url'))->with('success', 'Data Berhasil Di Ubah');
        // }
        return redirect()->route('admin-data-emoployees')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id) {
        $delete = Employee::find($id);
        $delete->delete();
        return redirect()->route('admin-data-emoployees')->with('success', 'Data Berhasil Di Hapus');
    }

    public function report(Request $request) {
        $jumlah = Employee::count();
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $dataEmployees = Employee::where(function ($query) use ($searchTerm) {
                $query->where('full_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_id', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('dapartement', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('email', 'LIKE', '%' . $searchTerm . '%');
                // Tambahkan orWhere untuk setiap field yang ingin Anda cari.
            })->orderBy('id', 'desc')->paginate();
        } else {
            $dataEmployees = Employee::orderBy('id', 'desc')->paginate();
        }

        return view('admin.employees.report', compact('dataEmployees', 'jumlah'),
        ["title" => "Report"]);
    }

    public function reportPDF() {
        $dataEmployees = Employee::all();
        view()->share('dataEmployees', $dataEmployees);
        $pdf = PDF::loadview('admin.employees.reportPDF');
        return $pdf->download('Employee Mini Task Progate.pdf');
    }

}
