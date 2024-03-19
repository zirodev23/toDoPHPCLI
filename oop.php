<?php

class Task {
    public $id;
    public $status;
    public $content;

    public function __construct($newId, $newStatus, $newContent) {
        $this->id = $newId;
        $this->status = $newStatus;
        $this->content = $newContent;
    }
}

// klases instances jeb class instances
$task1 = new Task(1, "done", "piecelties no rīta");
$task2 = new Task(2, "process", "aiziet uz konsultāciju");
$task3 = new Task(3, "planned", "iet gulēt");

echo $task2->content;
$task2->content = "izmainīts task2 saturs";
echo "\n";
echo $task2->content;

$tasks = [$task1, $task2, $task3];
// $tasks = ["first task", "second task"];

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