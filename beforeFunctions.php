<?php

$tasks = ["first task", "second task"];
// echo $inputTasks;
function showTask($inputTasks) {
    $id = readline("Ievadiet uzdevuma indeksu\n");
    echo "Uzdevums ar indeksu {$id}: " . $inputTasks[$id] . "\n";
}

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
            showTask($tasks);
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