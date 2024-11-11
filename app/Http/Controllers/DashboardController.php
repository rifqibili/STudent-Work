<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KerjakanTugas;
use App\Models\Submission;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class DashboardController extends Controller
{
    public function dashboardCount ()
    {
        $user = Auth::user();

        $userCount = User::count('id');
        $taskCount = Task::count('id');
        $categoryCount = Kategori::count('id');
        $workerCount = User::where('role','pembuat')->count();
        $taskById = Task::where('user_id', $user->id)->count();
        $taskApprove = Submission::where('user_id',$user->id)->where('status' ,'disetujui')->count();
        $taskDone = Task::where('user_id', auth()->id())->where('status_work', 'selesai')->count();
            
        return view('layouts.dashboard.dashboard', compact('userCount','taskCount','categoryCount','workerCount','taskById','taskApprove','taskDone'));
    }

    public function navAccount(){
        $user = Auth::user();
        return view('layouts.dashboard.nav',compact('user'));
    }

    public function tableUser ()
    {
        $userTables = User::all();
        return view('layouts.dashboard.tableUser', compact('userTables'));
    }

    public function profile ()
    {
        $user = Auth::user(); 
        return view('layouts.profile.profile', compact('user'));
    }

    public function tableTask()
    {
        $taskTables = Task::all();
        return view('layouts.dashboard.tableTask', compact('taskTables'));
    }

    public function tableKategori(){
        $kategoriTables = Kategori::all();
        return view('layouts.dashboard.tabelKategori', compact('kategoriTables'));
    }

    

    
}
