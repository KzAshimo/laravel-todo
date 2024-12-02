<?php

namespace App\Http\Controllers;

use App\Models\Task;  // Taskモデルをインポート
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all(); // ToDoリストを全件取得
    }

    public function store(Request $request)
    {
        $todo = Task::create($request->all());  // 新しいタスクを作成
        return response()->json($todo, 201);  // 作成したタスクを返す
    }

    public function update(Request $request, Task $todo)
    {
        $todo->update($request->all());  // タスクを更新
        return response()->json($todo);  // 更新したタスクを返す
    }

    public function destroy(Task $todo)
    {
        $todo->delete();  // タスクを削除
        return response()->json(null, 204);  // 削除成功の応答（204 No Content）
    }
}
