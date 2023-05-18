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
    public function index(Request $request)
    {

        $complaints = Complaint::with(['category'])->latest()->paginate(10);

        if ($request->has(['keyword'])) {
            $complaints = Complaint::with(['category'])->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('status', 'like', '%' . $request->keyword . '%')
                ->orWhereHas('category', function ($query) use ($request) {
                    $query->where('category', 'like', '%' . $request->keyword . '%');
                })
                ->latest()->paginate(10);
        } elseif ($request->has(['start-date', 'end-date'])) {
            $startDate = $request->date('start-date');
            $endDate = $request->date('end-date');
            $complaints = Complaint::whereBetween('created_at', [$startDate, $endDate])->latest()->paginate(10);
        }

        return view('pages.admin.index', compact('complaints'));
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
