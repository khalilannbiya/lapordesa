<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Jumlah data complaint dengan status "belum diproses"
        $unprocessedCount = Complaint::where('status', 'belum diproses')->count();

        // Jumlah data complaint dengan status "sedang diproses"
        $processingCount = Complaint::where('status', 'sedang diproses')->count();

        // Jumlah data complaint dengan status "telah selesai"
        $completedCount =  Complaint::where('status', 'selesai')->count();

        // Jumlah data keseluruhan
        $totalCount = Complaint::query()->count();

        return view('pages.admin.dashboard', compact('unprocessedCount', 'processingCount', 'completedCount', 'totalCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
