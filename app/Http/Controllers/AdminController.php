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
            $query = Complaint::with(['category'])->latest()->get();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div>
                        <a href="' . route('staff.complaints.show', $item->id) . '" class="inline-flex items-center justify-between mr-2 px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Like">
                            <i class="ti ti-eye-filled"></i>
                        </a>
                        <form action="' . route('staff.complaints.destroy', $item->id) . '" method="post" class="inline-block">
                            <button type="submit" class="inline-flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                <i class="ti ti-trash-filled"></i>
                            </button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>
                    </div>
                ';
                })
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
                    return DATE_FORMAT($item->created_at, "Y/m/d, H:i");
                })
                ->rawColumns(['status', 'title', 'action'])
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
