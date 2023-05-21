<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('role_id', 3)->latest();

        if ($request->has(['keyword'])) {
            $users = $users->where('name', 'like', '%' . $request->keyword . '%')
                ->orWhere(function (Builder $query) use ($request) {
                    $query->where('role_id', 3)
                        ->where('email', 'like', '%' . $request->keyword . '%');
                })
                ->orWhere(function (Builder $query) use ($request) {
                    $query->where('role_id', 3)
                        ->where('phone', 'like', '%' . $request->keyword . '%');
                });
        }

        $users = $users->paginate(10);
        return view('pages.admin.user-index', compact('users'));
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
    public function show(User $user)
    {
        return view('pages.admin.detail-user', compact('user'));
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
