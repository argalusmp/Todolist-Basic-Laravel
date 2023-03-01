<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TodolistController extends Controller
{

    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    public function todoList(Request $request)
    {
        $todolist = $this->todolistService->getTodolist();
        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");
        $subjek = $request->input('subjek');

        if (empty($todo)) {
            $todolist = $this->todolistService->getTodolist();
            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }

        $this->todolistService->saveTodo($todo, $subjek);

        return redirect()->action([TodolistController::class, 'todoList']);
    }

    public function removeTodo(Request $request, int $todoId): RedirectResponse
    {
        $this->todolistService->removeTodo($todoId);
        return redirect()->action([TodolistController::class, 'todoList'])->with('delete-success', 'Delete Todo Successfull!');
    }

    public function updateTodo(Request $request, Todolist $id)
    {

        $credentials = $request->validate([
            'subjek' => 'required',
            'todo' => 'required|min:5'
        ]);
        $todo = $credentials['todo'];
        $subjek = $credentials['subjek'];
        $this->todolistService->updateTodo($todo, $subjek, $id);

        return redirect('/todolist')->with('update-success', 'Update Successfull!');
    }

    public function edit(Todolist $id)
    {
        echo json_encode($this->todolistService->getTodolistbyID($id));
    }
}
