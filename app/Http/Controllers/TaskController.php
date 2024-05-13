<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class TaskController extends Controller
{
    public function index()
    {
        return view('task-show')->with('tasks', TaskModel::all());
    }

    public function edit($id)
    {
        return view('task-edit')->with('task', TaskModel::find($id));
    }

    public function update(Request $request, $id)
    {
        try {
            $task = TaskModel::findOrFail($id);
            $task->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
            return redirect('task-show')->with([
                'message' => 'Data Updated Successfully',
                'tasks', TaskModel::all(),
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function delete($id)
    {
        return view('task-delete')->with('task', TaskModel::find($id));
    }

    public function destroy($id)
    {
        try {
            $task = TaskModel::findOrFail($id);
            $task->delete();
            return redirect('task-show')->with([
                'message' => 'Data Deleted Successfully',
                'tasks', TaskModel::all(),
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function store(Request $request)
    {
        try {
            TaskModel::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect('task-show')->with([
                'message' => 'Data Add Successfully',
                'tasks', TaskModel::all(),
            ]);
        } catch (Exception $exception) {
            return $exception;
        }

    }


}
