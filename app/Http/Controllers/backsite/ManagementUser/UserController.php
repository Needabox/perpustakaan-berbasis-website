<?php

namespace App\Http\Controllers\backsite\ManagementUser;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('*');
            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function($users){
                    return view('pages.backsite.management-user.user.datatables.action', compact('users'));
                })
                ->editColumn('created_at', function ($users) {
                    return $users->created_at ? with(new \Carbon\Carbon($users->created_at))->format('d/m/Y H:i:s') : 'N/A';
                })
                ->editColumn('user_type', function ($users) {
                    if ($users->user_type == 1) {
                        return 'Admin';
                    } else if ($users->user_type == 2) {
                        return 'User';
                    } else {
                        return 'Unknown';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.backsite.management-user.user.index');
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
        $request->validate([
            'name' => 'required',
            'user_type' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->user_type = $request->user_type;
        $user->email = $request->email;
        $user->password = bcrypt($request->email);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully');
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
        $user = User::find($id);

        return view('pages.backsite.management-user.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->user_type = $request->user_type;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
