<?php

// $tasks = ["first task", "second task"];

// klase jeb paraugs
class Task {
    public $id;
    public $content;
    public $status;

    public function __construct($newId, $newContent, $newStatus) {
        $this->id = $newId;
        $this->content = $newContent;
        $this->status = $newStatus;
    }
}

// klases instances
$task1 = new Task(1, "pirmais uzdevums", "progress");
$task2 = new Task(2, "otrais uzdevums", "done");
$task3 = new Task(3, "trešais uzdevums", "progress");

// var_dump($task1);
// echo $task1->content;

$tasks = [$task1, $task2, $task3];


do {
    echo "UZDEVUMU PĀRVALDNIEKS\n";
    echo "Apskatīt => 1\n";
    echo "Pievienot => 2\n";
    echo "Dzēst => 3\n";
    echo "Rediģēt => 4\n";
    echo "Rādīt visus => 5\n";
    $choice = readline("Izvēlies darbības numuru\n");
    
    switch ($choice) {
        case 1:
            $id = readline("Ievadiet uzdevuma indeksu\n");
            echo "Uzdevums ar indeksu {$id}: " . $tasks[$id] . "\n";
            break;
        case 2:
            $new = readline("Ievadiet jaunu uzdevumu\n");
            array_push($tasks, $new);
            break;
        case 3:
            $id = readline("Ievadiet dzēšamā uzdevuma indeksu\n");
            unset($tasks[$id]);
            break;
        case 4:
            echo "Rediģēšana tiks izstradāta vēlāk\n";
            break;
        case 5:
            // foreach
            break;
        default:
            echo "Invalid option selected";
    }

    $continue = readline("Turpināt?\n");
} while ($continue === 'y');
