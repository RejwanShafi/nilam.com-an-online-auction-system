<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        DB::table('users')->where('user_id', $id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}