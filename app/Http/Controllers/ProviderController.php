<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{
    public function yourTask()
    {
        $user = Auth::user();

        $task = Task::where('user_id', $user->id)->with('submissions')->get();
        return view('layouts.provider.yourTask', compact('task'));
    }

    public function showDeletedTasksForProvider()
    {
        $user = Auth::user();

        $tasks = Task::onlyTrashed()->where('user_id', auth()->id())->get();
        return view('layouts.provider.showDeleteTask', compact('tasks'));
    }

    public function penyediaView($taskId)
    {
        $task = Task::with('submissions.user')->findOrFail($taskId);

        return view('layouts.provider.viewSubmit', compact('task'));
    }

    public function updateSubmissionStatus(Request $request, $submissionId)
    {
        $submission = Submission::findOrFail($submissionId);
        $submission->status = $request->input('status');
        $submission->save();

        if ($submission->status === 'disetujui') {
            $task = $submission->task;
            $task->status_work = 'selesai';
            $task->save();
        }

        return redirect()->route('task.yourTask', $submission->task_id)
            ->with('success', 'Status tugas berhasil diperbarui.');
    }
}
