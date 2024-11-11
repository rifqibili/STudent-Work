<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToworkerController extends Controller
{
    public function upgradeForm()
    {
        $user = Auth::user();
        return view('layouts.permohonan.toWorker', compact('user'));
    }

    public function submitUpgradeRequet(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'keahlian' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($user && $user instanceof User) {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->keahlian = $validatedData['keahlian'];
            $user->linkedin = $validatedData['linkedin'];
            $user->status = 'menunggu'; 
            $user->save(); 

            notify()->success('Permintaan Telah Terkirim');


            return redirect()->route('dashboard')->with('status', 'Permintaan perubahan peran telah dikirim.');
        } else {
            return redirect()->back()->with('error','Pengguna tidak ditemukan atau tidak valid.');
        }
    }

    public function showUpgradeRequest()
    {
        $requests = User::where('status', 'menunggu')->get();
        return view('layouts.permohonan.applyToWorker', compact('requests'));
    }

    public function approveRequest($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('dashboard')->with('error','Pengguna tidak ditemukan.');
        }
    
        $user->update([
            'status' => 'disetujui',
            'role' => 'pembuat',
        ]);

        notify()->success('Sudah di Tingkatkan Jadi Pengerja');

    
        return redirect()->route('dashboard')->with('success', 'Permintaan berhasil disetujui.');
    }
    

    public function rejectedRequest($id)
    {
        $request = User::find($id);
        $request->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Permintaan Telah ditolak');
    }

    
}
