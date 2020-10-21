<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ujian;
use App\Models\UjianSiswa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class UjianController extends Controller
{
    public function __construct() {
        $this->middleware(function($request, $next) {
            if (Gate::allows('manage-ujian')) {
                return $next($request);
            }
            abort(403, 'Access Forbidden');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujian');
    }

    public function dataUjian() {
        $data = Ujian::select('id', 'kelas_id', 'paket_soal_id', 'nama', 'waktu_mulai', 'waktu_ujian', 'token')
                     ->with('kelas:id,nama', 'paket_soal:id,nama')->get();
        return DataTables::of($data)
                        ->addIndexColumn()
                        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'paket' => 'required',
            'nama' => 'required',
            'mulai' => 'required',
            'waktu' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->all()
            ], 200);
        }

        $ujian = new Ujian;
        $ujian->kelas_id = $request->kelas;
        $ujian->paket_soal_id = $request->paket;
        $ujian->nama = $request->nama;
        $ujian->keterangan = $request->keterangan;
        $ujian->waktu_mulai = $request->mulai;
        $ujian->waktu_ujian = $request->waktu;
        $ujian->token = strtoupper(Str::random(8));
        $ujian->save();

        return response()->json([
            'status' => TRUE,
            'message' => 'Berhasil membuat ujian baru'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Ujian $ujian
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ujian $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Ujian $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ujian $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ujian $ujian)
    {
        //
    }

    // tambahan
    public function aktif() {
        return view('ujian_aktif');
    }

    public function dataAktif() {
        $data = UjianSiswa::select('id', 'siswa_id', 'ujian_id', 'waktu_mulai', 'waktu_selesai')
                          ->with('siswa', 'ujian')->get();
        return DataTables::of($data)
                         ->AddIndexColumn()
                         ->make(true);
    }
}
