<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\ComplaintRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $complaints = Complaint::where('user_id', auth()->user()->id)
                ->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('unic_code', $request->keyword)
                ->get();
        } else {
            $complaints = Complaint::where('user_id', auth()->user()->id)->latest()->get();
        }
        return view('pages.frontend.history', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.frontend.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintRequest $request)
    {
        // Generate Bilangan Random
        $randomNumber = random_int(000000, 999999);
        while (Complaint::where('unic_code', $randomNumber)->exists()) {
            $randomNumber = random_int(000000, 999999);
        }

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->storePublicly("photos", "public");
        }

        Complaint::create([
            'user_id' =>  auth()->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'body' => $request->body,
            'status' => 'belum diproses',
            'photo_url' => $photo,
            'unic_code' => $randomNumber,
        ]);

        Alert::toast("<strong>Data Berhasil Dikirim!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->route('complainant.complaints.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        if (auth()->user()->role->role === 'complainant') {
            return view('pages.frontend.detail', compact('complaint'));
        } else {
            return view('pages.admin.detail', compact('complaint'));
        }
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
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        Alert::toast("<strong>Data Berhasil Dihapus!</strong>", 'success')->toHtml()->timerProgressBar();
        return redirect()->route('staff.complaints.index');
    }
}
