<?php

namespace App\Http\Controllers;

use App\Models\tblMoPhong;
use Illuminate\Http\Request;

class TblMoPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mophongs = tblMoPhong::all();
        $path = env("PATH_IMAGE");
        return view('admin.MoPhong.index', compact('mophongs', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.MoPhong.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required',
            'diem5' => 'required|numeric',
            'diem4' => 'required|numeric',
            'diem3' => 'required|numeric',
            'diem2' => 'required|numeric',
            'diem1' => 'required|numeric',
            'diem1end' => 'required|numeric'
        ]);
        tblMoPhong::create($request->all());
        return redirect()->route('admin.mophong_list')->with('success', 'Thêm Mô phỏng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblMoPhong $tblMoPhong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mophong = tblMoPhong::findOrFail($id);
        return view('admin.MoPhong.edit', compact('mophong'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'video' => 'required',
            'diem5' => 'required|numeric',
            'diem4' => 'required|numeric',
            'diem3' => 'required|numeric',
            'diem2' => 'required|numeric',
            'diem1' => 'required|numeric',
            'diem1end' => 'required|numeric'
        ]);

        $mophong = tblMoPhong::findOrFail($id);
        $mophong->update($request->all());

        return redirect()->route('admin.mophong_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mophong = tblMoPhong::findOrFail($id);
        $mophong->delete();
        return redirect()->route('admin.mophong_list')->with('success', 'Đã xoá Mô phỏng!');
    }
}
