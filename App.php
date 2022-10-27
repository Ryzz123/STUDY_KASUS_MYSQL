<?php
require_once __DIR__ . '/Entity/Todolist.php';
require_once __DIR__ . '/Helper/InputHelper.php';
require_once __DIR__ . '/Repository/TodolistRepository.php';
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once __DIR__ . '/Config/Database.php';

echo "Aplikasi Todolist" . PHP_EOL;

use Repository\TodolistRepositoryImpl;
use service\TodolistServiceImpl;
use View\TodolistView;

$connection = \Config\Database::getConnection();
$todoListRepository = new TodolistRepositoryImpl($connection);
$todoListService = new TodolistServiceImpl($todoListRepository);
$todoListView = new TodolistView($todoListService);

$todoListView->showTodolist();