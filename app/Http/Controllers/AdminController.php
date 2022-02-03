<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyWord = $request->search;

        $dataAdmin = Admin::select('id', 'nama', 'username', 'role')
        ->when($keyWord, function($query, $keyWord){
            return $query->where('nama', 'like', "%{$keyWord}%")
                        ->orWhere('username', 'like', "%{$keyWord}%")
                        ->orWhere('role', 'like', "%{$keyWord}%");
        })
        ->orderBy('id')
        ->paginate(15);
        return view('admin.index',['data'=>$dataAdmin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username'=>'required|alpha_dash|unique:admins',
            'password'=>'required|min:4|confirmed'
        ]);

        Admin::create([
            'nama'=>$request->nama_lengkap,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=>'resepsionis',
        ]);

        return redirect()->route('admin.index')->with('status', 'store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit',['row'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'username'=>"required|alpha_dash|unique:admins,username,{$admin->id}",
            'password'=>'nullable|min:4|confirmed'
        ]);

        if ($request->password) {
            $query = [
                'nama'=>$request->nama_lengkap,
                'username'=>$request->username,
                'password'=>bcrypt($request->password),
            ];
        } else {
            $query = [
                'nama'=>$request->nama_lengkap,
                'username'=>$request->username,
            ];
        }
        $admin->update($query);
        return redirect()->route('admin.index')->with('status', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('status', 'destroy');
    }


    public function akun()
    {
        $admin = Auth::user();
        return view('admin.akun',['row'=>$admin]);

    }

    public function updateAkun(Request $request)
    {
        $admin = Auth::user();
        $request->validate([
            'nama_lengkap' => 'required',
            'username'=>"required|alpha_dash|unique:admins,username,{$admin->id}",
            'password'=>'nullable|min:4|confirmed'
        ]);

        if ($request->password) {
            $query = [
                'nama'=>$request->nama_lengkap,
                'username'=>$request->username,
                'password'=>bcrypt($request->password),
            ];
        } else {
            $query = [
                'nama'=>$request->nama_lengkap,
                'username'=>$request->username,
            ];
        }
        $admin->update($query);
        return back()->with('status', 'update');

    }
}
