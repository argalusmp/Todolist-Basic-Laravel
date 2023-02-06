<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            "user" => "admin",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Admin",
                    "subjek" => "Nyapu"
                ],
                [
                    "id" => "2",
                    "todo" => "Admin2",
                    "subjek" => "Nyapu"
                ]
            ]
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("Admin")
            ->assertSeeText("2")
            ->assertSeeText("Admin2");
    }

    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => "admin"
        ])->post("/todolist", [])
            ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "admin"
        ])->post("/todolist", [
            "todo" => "Admin",
            "subjek" => "Nyapu"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "admin",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Admin",
                    "subjek" => "Nyapu"

                ],
                [
                    "id" => "2",
                    "todo" => "Admin2",
                    "subjek" => "Nyapu"
                ]
            ]
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");
    }
}
