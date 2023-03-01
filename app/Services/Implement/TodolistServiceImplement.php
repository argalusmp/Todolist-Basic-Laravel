<?php

namespace App\Services\Implement;

use App\Models\Todolist;
use App\Services\TodolistService;
use Illuminate\Support\Facades\DB;

class TodolistServiceImplement implements TodolistService
{

    public function saveTodo(string $todo, string $subjek): void
    {

        DB::insert('INSERT INTO `todolists`(subjek,todo,user_id) VALUES (?,?,?)', [$subjek, $todo, auth()->user()->id]);
    }

    public function getTodolist(): array
    {
        $query = DB::select('SELECT * FROM `todolists` WHERE user_id = :id', ['id' => auth()->user()->id]);
        return $query;
    }

    public function getTodolistbyID($todoId)
    {
        $todo = DB::table('todolists')->where('id', '=', $todoId)->first();

        return $todo;
    }

    public function removeTodo(int $todoId)
    {
        $query = DB::delete('DELETE FROM `todolists` WHERE id = :todoId', ['todoId' => $todoId]);
        return $query;
    }

    public function updateTodo(string $todo, string $subjek,  $todoId)
    {

        Todolist::where('id', $todoId)
            ->update([
                'subjek' => $subjek,
                'todo' => $todo
            ]);
    }
}
