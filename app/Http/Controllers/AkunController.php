<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function updateprofile(Request $request, $id)
    {

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->route('akun', ['id' => $id])->with('success', 'Akun berhasil diupdate');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('akun')->with('success', 'Password changed successfully');
    }
}
