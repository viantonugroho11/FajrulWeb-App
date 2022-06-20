<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class AdminControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(Auth::user()->role == 1){
                $kategori = Admin::select('*');
            }else{
                $kategori = Admin::orwhere('role_id','=',2)
                ->orwhere('role_id','=',3)
                ->orwhere('role_id','=',4)
                ->select('*');
            }
            return DataTables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //form delete
                    $formdelete = '<form action="' . route('kategori-artikel.destroy', $row->id) . '" method="POST">' . csrf_field() . method_field("DELETE") . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')"><i class="fa fa-trash"></i> Hapus</button></form>';
                    //form edit
                    $formedit = '<a href="' . route('kategori-artikel.edit', $row->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    $btn = $formedit . '
                        <br/>
                        ' . $formdelete . '';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.manage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $admin = Admin::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role,
        ]);
        if($admin){
            return redirect()->route('manage.index')->with('success','Data berhasil ditambahkan');
        }else{
            return redirect()->route('manage.index')->with('error','Data gagal ditambahkan');
        }
        // $data = $request->all();
        // $data['password'] = bcrypt($data['password']);
        // $data['uuid'] = Uuid::uuid4();
        // $data['slug'] = Str::slug($data['name']);
        // $data['status'] = 1;
        // $data['role_id'] = $request->role;
        // $data['created_by'] = Auth::user()->id;
        // $data['updated_by'] = Auth::user()->id;
        // Admin::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.manage.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        $admin = Admin::find($id);
        $admin->update([
            'name' => $request->nama,
        ]);
        if($request->password){
            $admin->update([
                'password' => bcrypt($request->password),
            ]);
        }
        if($request->role){
            $admin->update([
                'role_id' => $request->role,
            ]);
        }

        if($admin){
            return redirect()->route('manage.index')->with('success','Data berhasil diubah');
        }else{
            return redirect()->route('manage.index')->with('error','Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
