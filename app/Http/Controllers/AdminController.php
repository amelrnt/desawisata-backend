<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Tempat;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {


        $users  = User::with(['role'])->where('role_id', '!=', 5)->get();
        // dd($users);
        return view('admin.admin.index', compact('users'));
    }
    public function indexd()
    {

        $tempat  = Tempat::where('user_id', Auth::user()->petugas_id)->where('status', '1')->first();
        $users  = User::where('role_id', '!=', 5)->where('desa_id', $tempat->id)->get();
        // dd($users);
        return view('desa.admin.index', compact('users'));
    }
    public function create()
    {
        $data = User::max('petugas_id');
        // dd($data);
        $huruf = "D";
        $urutan = (int)substr($data, 2, 3);
        $urutan++;
        $petugas_id = $huruf . sprintf("%03s", $urutan);
        // dd($petugas_id);


        return view('admin.admin.create', compact('petugas_id'));
    }
    public function created()
    {

        $data = User::max('petugas_id');
        // dd($data);
        $huruf = "D";
        $urutan = (int)substr($data, 2, 3);
        $urutan++;
        $petugas_id = $huruf . sprintf("%03s", $urutan);
        // dd($petugas_id);


        return view('desa.admin.create', compact('petugas_id'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validateStore($request);
        $data = $request->all();
        // dd($data);


        $name = (new User)->userAvatar($request);
        $data['image'] = $name;

        $data['password'] = bcrypt($request->password);

        User::create($data);


        Toastr::success('Membuat akun admin berhasil :)', 'Success');
        return redirect()->route('admin.index');
    }
    public function stored(Request $request)
    {
        // dd($request);
        $this->validateStore($request);
        $data = $request->all();
        // dd($data);
        $tempat  = Tempat::where('user_id', Auth::user()->petugas_id)->where('status', '1')->first();

        $name = (new User)->userAvatar($request);
        $data['image'] = $name;

        $data['password'] = bcrypt($request->password);
        $data['desa_id'] = $tempat->id;

        User::create($data);


        Toastr::success('Membuat akun admin berhasil :)', 'Success');
        return redirect()->route('admind.index');
    }


    public function edit($id)
    {
        $users = User::find($id);

        return view('admin.admin.edit',  compact('users'));
    }
    public function editd($id)
    {
        $users = User::find($id);

        return view('desa.admin.edit',  compact('users'));
    }
    public function update(Request $request, $id)
    {
        $admin = User::where('id', $id)->first();
        // dd($admin);
        // $checkgambar = $admin->image;

        $this->validateUpdate($request, $id);
        $data = $request->all();
        // dd($data);


        $user = User::find($id);
        $imageName = $user->image;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            if ($admin->image == null) {
            } else {
                unlink(public_path('images/' . $user->image));
            }
        }
        $data['image'] = $imageName;

        $userPassword = $user->password;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {

            $data['password'] = $userPassword;
        }

        $user->update($data);
        Toastr::success(' Berhasil mengubah status :)', 'Success');
        return redirect()->route('admin.index');
    }
    public function updated(Request $request, $id)
    {
        $admin = User::where('id', $id)->first();
        // dd($admin);
        // $checkgambar = $admin->image;

        $this->validateUpdate($request, $id);
        $data = $request->all();
        // dd($data);


        $user = User::find($id);
        $imageName = $user->image;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            if ($admin->image == null) {
            } else {
                unlink(public_path('images/' . $user->image));
            }
        }
        $data['image'] = $imageName;

        $userPassword = $user->password;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {

            $data['password'] = $userPassword;
        }

        $user->update($data);
        Toastr::success(' Berhasil mengubah status :)', 'Success');
        return redirect()->route('admind.index');
    }


    public function destroy($id)
    {


        if (auth()->user()->id == $id) {
            abort(401);
        }
        // $user = User::find($id);
        // $userDelete = $user->delete();
        // $delete = User::find($id);
        // $delete->delete();



        $user = User::find($id);
        $userDelete = $user->delete();

        if ($userDelete) {
            if ($user->image == null) {
            } else {
                unlink(public_path('images/' . $user->image));
            }
        }
        Toastr::success('User deleted successfully :)', 'Success');

        return redirect()->route('admin.index')->with('message', 'Data deleted successfully');
    }



    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'image' => 'required|mimes:png,jpg,jpeg|max:5000',
        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,


        ]);
    }
    public function toggleStatus($id)
    {
        $sesii = User::find($id);
        $sesii->status = !$sesii->status;
        $sesii->save();
        Toastr::info('User Status Updated :)', 'Success');
        return redirect()->back();
    }
    public function info()
    {


        $users  = User::where('role_id', 1)->get();
        // dd($users);
        return view('admin.admin.index', compact('users'));
    }
}
