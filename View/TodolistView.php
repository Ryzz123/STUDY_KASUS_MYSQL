<?php

namespace View {

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView
    {
        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }


        function showTodolist(): void
        {
            while (true) {
                $this->todolistService->showTodolist();

                echo "Menu" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. Untuk Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1") {
                    $this->addTodolist();
                } else if ($pilihan == "2") {
                    $this->removeTodolist();
                } else if ($pilihan == "x") {
                    break;
                } else {
                    echo "Pilihan Tidak Dimengerti" . PHP_EOL;
                }
            }
            echo "Sampai Jumpa Lagi" . PHP_EOL;
        }

        function addTodolist(): void
        {
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo (x untuk Batal)");

            if ($todo == "x") {
                echo "Gagal Menambah Todo" . PHP_EOL;
            } else {
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodolist(): void
        {
            echo "MENGHAPUS TODO" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x Untuk Batalkan)");

            if ($pilihan == "x") {
                echo "Batal Mnghapus Todo" . PHP_EOL;
            } else {
               $this->todolistService->removeTodolist($pilihan);
            }
        }
    }
}