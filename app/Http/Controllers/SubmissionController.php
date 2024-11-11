<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function submitForm($id)
    {
        $task = Task::findOrFail($id);
        return view('layouts.submitTask.submitForm', compact('task'));
    }
    public function submitTask(Request $request, $taskId)
{
    $task = Task::find($taskId);
    if (!$task) {
        return redirect()->back()->with('error','Task not found.');
    }

    $request->validate([
        'description' => 'nullable|string',
        'file_tugas' => 'required|file',
    ]);

    $submission = new Submission();
    $submission->task_id = $taskId;
    $submission->user_id = Auth::id();
    $submission->deskripsi = $request->deskripsi;

    if ($request->hasFile('file_tugas')) {
        $file = $request->file('file_tugas');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->move('storage/file/submit', $filename);
        $submission->file_tugas = $filename;
    }

    $submission->save();

    return redirect()->route('task.collectAssignment')->with('success', 'Tugas telah berhasil dikirim ke penyedia.');
}


    public function updateStatus(Request $request, $submissionId)
    {
        $submission = Submission::findOrFail($submissionId);
        $submission->status = $request->input('status');
        $submission->save();


        return redirect()->route('task.yourTask')->with('success', 'Status tugas berhasil diperbarui.');
    }

   
}
