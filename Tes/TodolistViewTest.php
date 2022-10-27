<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../View/TodolistView.php";
require_once __DIR__. '/../Helper/InputHelper.php';

use \Entity\Todolist;
use \Repository\TodolistRepositoryImpl;
use \service\TodolistServiceImpl;
use \View\TodolistView;

function testViewShowTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    $todoListService->addTodolist("Belajar PHP");
    $todoListService->addTodolist("Belajar PHP OOP");
    $todoListService->addTodolist("Belajar PHP DATABASE");

    $todoListView->showTodolist();
}

function testViewAddTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    $todoListService->addTodolist("Belajar PHP");
    $todoListService->addTodolist("Belajar PHP OOP");
    $todoListService->addTodolist("Belajar PHP DATABASE");
    $todoListService->showTodolist();

    $todoListView->addTodolist();

    $todoListService->showTodolist();

    $todoListView->addTodolist();

    $todoListService->showTodolist();
}

function testViewRemoveTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodolistServiceImpl($todoListRepository);
    $todoListView = new TodolistView($todoListService);

    $todoListService->addTodolist("Belajar PHP");
    $todoListService->addTodolist("Belajar PHP OOP");
    $todoListService->addTodolist("Belajar PHP DATABASE");
    $todoListService->showTodolist();

    $todoListView->removeTodolist();

    $todoListService->showTodolist();

    $todoListView->removeTodolist();

    $todoListService->showTodolist();
}

testViewRemoveTodoList();