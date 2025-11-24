<?php

namespace App\Http\Controllers;

use App\Models\tblLoaiBangLai;
use Illuminate\Http\Request;

class TblLoaiBangLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banglais = tblLoaiBangLai::all();
        return view('admin.LoaiBangLai.index', compact('banglais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.LoaiBangLai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'socauhoi' => 'required|numeric',
            'mincauhoidung' => 'required|numeric',
        ]);
        tblLoaiBangLai::create($request->all());
        return redirect()->route('admin.banglai_list')->with('success', 'Thêm Bằng lái thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblLoaiBangLai $tblLoaiBangLai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banglai = tblLoaiBangLai::findOrFail($id);
        return view('admin.LoaiBangLai.edit', compact('banglai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required',
            'socauhoi' => 'required|numeric',
            'mincauhoidung' => 'required|numeric',
        ]);

        $tblLoaiBangLai = tblLoaiBangLai::findOrFail($id);
        $tblLoaiBangLai->update($request->all());

        return redirect()->route('admin.banglai_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tblLoaiBangLai = tblLoaiBangLai::findOrFail($id);
        $tblLoaiBangLai->delete();
        return redirect()->route('admin.banglai_list')->with('success', 'Đã xoá Bằng lái!');
    }
}
