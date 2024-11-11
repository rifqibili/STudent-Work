<?php

namespace App\Http\Controllers;

use App\Models\KerjakanTugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KerjakanTugasController extends Controller
{
   public function applyTask($taskId)
    {
        KerjakanTugas::create([
            'task_id' => $taskId,
            'user_id'=> Auth::id(),
            'status' => 'menunggu',
        ]);

        notify()->success('');


        return redirect()->back()->with('error', 'Harap Menunggu Persetujuan Penyedia');
    }

    public function approvedBtn($Id)
    {
        $approved = KerjakanTugas::findOrFail($Id);

        $approved->update(['status' => 'disetujui']);

        $otherStatus = KerjakanTugas::where('task_id', $approved->task_id)
        ->where('id', '!=', $approved->id)
        ->where('status', 'menunggu')
        ->get();

        foreach ($otherStatus as $status) {
            $status->update(['status' => 'ditolak']);
        }


        return redirect()->back()->with('succes','Pengerja telah di Setujui');
    }

    public function unApprovedBtn($Id)
    {
        $application = KerjakanTugas::findOrFail($Id);
        $application->update(['status' => 'ditolak']);

        notify()->success('Aksi Terlaksana');


        return redirect()->back();
    }

    public function profileView ($id)
    {
        $user = User::findOrFail($id);

        return view('layouts.home.detailprofile', compact('user'));
    }

    

    
}
