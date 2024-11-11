<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KerjakanTugas;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $tasks = Task::where('status_work', 'menunggu')->get();
        $kategoris = Kategori::paginate('8');
        return view('layouts.home.home', compact('tasks', 'kategoris'));
    }

    public function allTask($kategoriId = null)
    {
        $tasks = Task::all();
        $kategoris = Kategori::all();

        if ($kategoriId) {
            $taskCount = Task::select('kategori_id', DB::raw('count(*) as total'))
                ->groupBy('kategori_id')
                ->get();
        } else {
            $taskCount = Task::count();
        }

        return view('layouts.home.allTask', compact('tasks', 'kategoris', 'taskCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('layouts.crudTask.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = 'storage/gambar/task/';
        $gambar = [];

        foreach (['gambar1', 'gambar2', 'gambar3'] as $key) {
            if ($request->file($key)) {
                $file = $request->file($key);
                $name = $file->getClientOriginalName();
                $file->move($path, $name);
                $gambar[$key] = $name;
            }
        }

        Task::create([
            'id' => $request->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar1' => $gambar['gambar1'] ?? null,
            'gambar2' => $gambar['gambar2'] ?? null,
            'gambar3' => $gambar['gambar3'] ?? null,
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'ketentuan' => $request->ketentuan,
        ]);

        return redirect()->route('home')->with('success','Data Berhasil Di Tambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find($id);
        $applications = KerjakanTugas::where('task_id', $id)->get();
        return view('layouts.home.detailTask', compact('task', 'applications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $kategoris = Kategori::all();
        return view('layouts.crudTask.update', compact('task', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Task::findOrFail($id);

        if ($request->file('gambar1')) {
            $file = $request->file('gambar1');
            unlink('storage/gambar/task/' . $update->gambar1);
            $name = $file->getClientOriginalName();
            $path = 'storage/gambar/task';
            $file->move($path, $name);
            $update['gambar1'] = $name;
        }

        if ($request->file('gambar2')) {
            $file = $request->file('gambar2');
            unlink('storage/gambar/task/' . $update->gambar2);
            $name = $file->getClientOriginalName();
            $path = 'storage/gambar/task';
            $file->move($path, $name);
            $update['gambar2'] = $name;
        }

        if ($request->file('gambar3')) {
            $file = $request->file('gambar3');
            unlink('storage/gambar/task/' . $update->gambar3);
            $name = $file->getClientOriginalName();
            $path = 'storage/gambar/task';
            $file->move($path, $name);
            $update['gambar3'] = $name;
        }

        $update->judul = $request->judul;
        $update->deskripsi = $request->deskripsi;
        $update->ketentuan = $request->ketentuan;

        $update->save();


        return redirect()->route('dashboard.table.task')->with('success','Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    public function collectAssignment()
    {
        $user = Auth::user();

        $task = KerjakanTugas::where('user_id', $user->id)->where('status', 'disetujui')->get();
        return view('layouts.worker.collectAssignment', compact('task'));
    }

    public function showDeletedTasks()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('layouts.trash.deletedTask', compact('tasks'));
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);
        $task->restore();
        return redirect()->back()->with('success', 'Tugas Berhasil di Pulihkan.');
    }

    public function forceDelete($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);

        if ($task) {
            $gambar1Path = 'storage/gambar/task/' . $task->gambar1;
            $gambar2Path = 'storage/gambar/task/' . $task->gambar2;
            $gambar3Path = 'storage/gambar/task/' . $task->gambar3;

            if (is_file($gambar1Path)) {
                unlink($gambar1Path);
            }

            if (is_file($gambar2Path)) {
                unlink($gambar2Path);
            }

            if (is_file($gambar3Path)) {
                unlink($gambar3Path);
            }
        }

        $task->forceDelete();
        return redirect()->back()->with('success', 'Tugas Telah di Hapus Permanen.');
    }

    public function forceDeleteAll()
    {
        $deletedTasks = Task::onlyTrashed()->get();


        foreach ($deletedTasks as $task) {
            if ($task) {
                $gambar1Path = 'storage/gambar/task/' . $task->gambar1;
                $gambar2Path = 'storage/gambar/task/' . $task->gambar2;
                $gambar3Path = 'storage/gambar/task/' . $task->gambar3;

                if (is_file($gambar1Path)) {
                    unlink($gambar1Path);
                }

                if (is_file($gambar2Path)) {
                    unlink($gambar2Path);
                }

                if (is_file($gambar3Path)) {
                    unlink($gambar3Path);
                }

                $task->forceDelete();
            }

            return redirect()->back();
        }
    }
}
