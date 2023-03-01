<?php

namespace App\Services;

interface TodolistService
{

    public function saveTodo(string $todo, string $subjek): void;

    public function getTodolist(): array;
    public function getTodolistbyID($todoId);

    public function removeTodo(int $todoId);

    public function updateTodo(string $todo, string $subjek,  $todoId);
}
