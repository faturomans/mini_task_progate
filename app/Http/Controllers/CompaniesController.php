<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Employee;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CompaniesController extends Controller
{
    public function companies(Request $request) {
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $dataCompanies = Companies::where(function ($query) use ($searchTerm) {
                $query->where('company_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_email', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_address', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_phone', 'LIKE', '%' . $searchTerm . '%');
                // Tambahkan orWhere untuk setiap field yang ingin Anda cari.
            })->orderBy('id', 'desc')->paginate(5);
        } else {
            $dataCompanies = Companies::orderBy('id', 'desc')->paginate(5);
        }

        return view('admin.companies.companies', compact('dataCompanies'),
        ["title" => "Componies"]);
    }

    public function create() {
        return view('admin.companies.create',
        ["title" => "Create"]);
    }

    public function insert(Request $request) {
        $this->validate($request, [
            'company_name' => 'required|',
            'company_email' => 'required|unique:companies,company_email',
            'company_address' => 'required|',
            'company_phone' => 'required|',
        ], [
             'company_email.unique' => 'Email sudah ada.',
            'company_name.required' => 'Company Name wajib diisi',
            'company_email.required' => 'Company Email wajib diisi',
            'company_address.required' => 'Company Address wajib diisi',
            'company_phone.required' => 'Company Phone wajib diisi',
        ]);
        // dd($request->all());
        $dataCompanies = Companies::create([
            // 'company_id' => $request->company_id,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
        ]);
        return redirect()->route('admin-data-companies')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function look($id) {
        $look = Companies::find($id);
        //dd($ubah);
        return view('admin.companies.update', compact('look'),
        ["title" => "Show"]);
    }

    public function detail($id) {
        $detail = Companies::find($id);
        return view('admin.companies.detail', compact('detail'),
        ["title" => "Detail"]);
    }

    public function update(Request $request, $id) {
        $dataCompanies = Companies::find($id);
        // $dataCompanies->company_id = $request->input('company_id');
        $dataCompanies->company_name = $request->input('company_name');
        $dataCompanies->company_email = $request->input('company_email');
        $dataCompanies->company_address = $request->input('company_address');
        $dataCompanies->company_phone = $request->input('company_phone');
        $dataCompanies->update();
        if(session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Di Ubah');
        }
        return redirect()->route('admin-data-companies')->with('success', 'Data Berhasil Di Ubah');
    }

    public function delete($id) {
        $delete = Companies::find($id);
        $delete->delete();
        return redirect()->route('admin-data-companies')->with('success', 'Data Berhasil Di Hapus');
    }

    public function report(Request $request) {
        $jumlah = Companies::count();
        if ($request->has('search')) {
            $searchTerm = $request->search;

            $dataCompanies = Companies::where(function ($query) use ($searchTerm) {
                $query->where('company_name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_email', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_address', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('company_phone', 'LIKE', '%' . $searchTerm . '%');
                // Tambahkan orWhere untuk setiap field yang ingin Anda cari.
            })->orderBy('id', 'desc')->paginate();
        } else {
            $dataCompanies = Companies::orderBy('id', 'desc')->paginate();
        }

        return view('admin.companies.report', compact('dataCompanies', 'jumlah'),
        ["title" => "Report"]);
    }

    public function reportPDF() {
        $dataCompanies = Companies::all();
        view()->share('dataCompanies', $dataCompanies);
        $pdf = PDF::loadview('admin.companies.reportPDF');
        return $pdf->download('Companies Mini Task Progate.pdf');
    }
}
