<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Complaint::with(['category'])->get();
            return DataTables::of($query)
                ->editColumn('title', function ($item) {
                    return "<p style='color:#fdfdfd; text-transform: capitalize; font-weight: 600;'>$item->title</p>";
                })
                ->editColumn('status', function ($item) {
                    $statusEdited = null;
                    if ($item->status === 'belum diproses') {
                        $statusEdited = "<p style='color:#ef4444; text-transform: capitalize; 	font-weight: 600;'>$item->status</p>";
                    } else if ($item->status === 'sedang diproses') {
                        $statusEdited = "<p style='color:#eab308; text-transform: capitalize; 	font-weight: 600;'>$item->status</p>";
                    } else {
                        $statusEdited = "<p style='color:#22c55e; text-transform: capitalize; 	font-weight: 600;'>$item->status</p>";
                    }
                    return $statusEdited;
                })
                ->editColumn('created_at', function ($item) {
                    return DATE_FORMAT($item->created_at, "H:i, d/m/Y");
                })
                ->rawColumns(['status', 'title'])
                ->make();
        }
        return view('pages.admin.index');
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
