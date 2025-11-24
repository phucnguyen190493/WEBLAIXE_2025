<?php

namespace App\Http\Controllers;

use App\Models\tblCauHoi;
use App\Models\tblCauHoiBangLai;
use App\Models\tblLoaiBangLai;
use Illuminate\Http\Request;

class TblCauHoiBangLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chbls = tblCauHoiBangLai::all();
        return view('admin.CauHoiBangLai.index', compact('chbls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cauhois = tblCauHoi::all();
        $banglais = tblLoaiBangLai::all();
        return view('admin.CauHoiBangLai.create', compact('banglais', 'cauhois'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'BangLaiId' => 'required'
        ]);
        tblCauHoiBangLai::create($request->all());
        return redirect()->route('admin.cauhoibanglai_list')->with('success', 'Thêm Câu hỏi - Bằng lái thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblCauHoiBangLai $tblCauHoiBangLai)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cauhois = tblCauHoi::all();
        $banglais = tblLoaiBangLai::all();
        $cauhoibanglai = tblCauHoiBangLai::findOrFail($id);
        return view('admin.CauHoiBangLai.edit', compact('cauhoibanglai', 'cauhois', 'banglais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'BangLaiId' => 'required'
        ]);

        $chbl = tblCauHoiBangLai::findOrFail($id);
        $chbl->update($request->all());

        return redirect()->route('admin.cauhoibanglai_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chbl = tblCauHoiBangLai::findOrFail($id);
        $chbl->delete();
        return redirect()->route('admin.cauhoibanglai_list')->with('success', 'Đã xoá Câu hỏi - Bằng lái!');
    }
}
