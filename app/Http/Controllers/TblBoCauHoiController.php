<?php

namespace App\Http\Controllers;

use App\Models\tblBoCauHoi;
use App\Models\tblLoaiBangLai;
use Illuminate\Http\Request;

class TblBoCauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bchs = tblBoCauHoi::all();
        return view('admin.BoCauHoi.index', compact('bchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banglais = tblLoaiBangLai::all();
        return view('admin.BoCauHoi.create', compact('banglais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'stt' => 'required|numeric',
            'BangLaiId' => 'required',
        ]);
        tblBoCauHoi::create($request->all());
        return redirect()->route('admin.bocauhoi_list')->with('success', 'Thêm Bộ câu hỏi thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblBoCauHoi $tblBoCauHoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bch = tblBoCauHoi::findOrFail($id);
        $banglais = tblLoaiBangLai::all();
        return view('admin.BoCauHoi.edit', compact('bch', 'banglais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'stt' => 'required|numeric',
            'BangLaiId' => 'required',
        ]);

        $bch = tblBoCauHoi::findOrFail($id);
        $bch->update($request->all());

        return redirect()->route('admin.bocauhoi_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bch = tblBoCauHoi::findOrFail($id);
        $bch->delete();
        return redirect()->route('admin.bocauhoi_list')->with('success', 'Đã xoá Bộ câu hỏi!');
    }
}
