<?php

namespace App\Http\Controllers;

use App\Models\tblBoCauHoi;
use App\Models\tblCauHoi;
use App\Models\tblBoCauHoi_CauHoi;
use Illuminate\Http\Request;

class TblBoCauHoiCauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bochchs = tblBoCauHoi_CauHoi::all();
        return view('admin.BoCauHoiCauHoi.index', compact('bochchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cauhois = tblCauHoi::all();
        $bocauhois = tblBoCauHoi::all();
        return view('admin.BoCauHoiCauHoi.create', compact('cauhois', 'bocauhois'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'stt' => 'required|numeric',
            'BoCauHoiId' => 'required',
        ]);
        tblBoCauHoi_CauHoi::create($request->all());
        return redirect()->route('admin.bochch_list')->with('success', 'Thêm Bộ CH - CH thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(tblBoCauHoi_CauHoi $tblBoCauHoi_CauHoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bochch = tblBoCauHoi_CauHoi::findOrFail($id);
        $cauhois = tblCauHoi::all();
        $bocauhois = tblBoCauHoi::all();
        return view('admin.BoCauHoiCauHoi.edit', compact('bochch', 'cauhois', 'bocauhois'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'CauHoiId' => 'required',
            'stt' => 'required|numeric',
            'BoCauHoiId' => 'required',
        ]);

        $bochch = tblBoCauHoi_CauHoi::findOrFail($id);
        $bochch->update($request->all());

        return redirect()->route('admin.bochch_list')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bochch = tblBoCauHoi_CauHoi::findOrFail($id);
        $bochch->delete();
        return redirect()->route('admin.bochch_list')->with('success', 'Đã xoá Bộ CH - CH !');
    }
}
