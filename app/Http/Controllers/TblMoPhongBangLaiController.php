<?php

namespace App\Http\Controllers;

use App\Models\tblLoaiBangLai;
use App\Models\tblMoPhong;
use App\Models\tblMoPhongBangLai;
use Illuminate\Http\Request;

class TblMoPhongBangLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mophongbanglais = tblMoPhongBangLai::all();
        return view('admin.MoPhongBangLai.index', compact('mophongbanglais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mophongs = tblMoPhong::all();
        $banglais = tblLoaiBangLai::all();
        return view('admin.MoPhongBangLai.create', compact('mophongs', 'banglais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MoPhongId' => 'required',
            'BangLaiId' => 'required',
            'stt' => 'required|numeric'
        ]);
        tblMoPhongBangLai::create($request->all());
        return redirect()->route('admin.mophongbanglai_list')->with('success', 'Thêm Mô phỏng - Bằng lái thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblMoPhongBangLai $tblMoPhongBangLai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mophongbanglai = tblMoPhongBangLai::findOrFail($id);
        $mophongs = tblMoPhong::all();
        $banglais = tblLoaiBangLai::all();
        return view('admin.MoPhongBangLai.edit', compact('mophongbanglai', 'mophongs', 'banglais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MoPhongId' => 'required',
            'BangLaiId' => 'required',
            'stt' => 'required|numeric'
        ]);

        $mophongbanglai = tblMoPhongBangLai::findOrFail($id);
        $mophongbanglai->update($request->all());

        return redirect()->route('admin.mophongbanglai_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mophongbl = tblMoPhongBangLai::findOrFail($id);
        $mophongbl->delete();
        return redirect()->route('admin.mophongbanglai_list')->with('success', 'Đã xoá Mô phỏng - Bằng lái !');
    }
}
