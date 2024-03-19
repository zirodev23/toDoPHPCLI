<?php

$tasks = [
    [
        'id' => 1,
        'status' => 'done',
        'content' => 'uzdevuma 1 saturs',
    ],
    [
        'id' => 2,
        'status' => 'progress',
        'content' => 'uzdevuma 2 saturs',
    ]
];


function showTask($inputTasks) {
    $id = readline("Ievadi uzdevuma ID: ");
    // atrast uzdevumu pēc id
    $task = findTaskById($inputTasks, $id);
    displayTask($task);
}

function findTaskById($tasks, $inputId) {
    foreach ($tasks as $task) {
        if ($task['id'] == $inputId) {
            // pārtrauc ciklu un atgriež funkcijas vērtību 
            return $task;
        }
    }
}

function displayTask($task) {
    echo "ID: {$task['id']}, CONTENT: {$task['content']}, STATUS; {$task['status']}\n";
}

$continue = 'y';
do {
    echo "UZDEVUMU PĀRVALDNIEKS\n";
    echo "Apskatīt => 1\n";
    echo "Pievienot => 2\n";
    echo "Dzēst => 3\n";
    echo "Rediģēt => 4\n";
    echo "Rādīt visus => 5\n";
    echo "Iziet => 6\n";
    $choice = readline("Izvēlies darbības numuru\n");
    
    echo "==========\n";
    switch ($choice) {
        case 1:
            showTask($tasks);        
            break;
        case 2:
            // pielāgot šo kodu asociatīvaja, masīvam
            $newContent = readline("Ievadi jaunā uzdevuma saturu: ");
            // $new = readline("Ievadiet jaunu uzdevumu\n");
            // array_push($tasks, $new);
            $lastTask = end($tasks);
            $newId = $lastTask['id'] + 1;
            $tasks[] = ['id' => $newId, 'content' => $newContent, 'status' => 'new'];
            break;
        case 3:
            $id = readline("Ievadiet dzēšamā uzdevuma indeksu\n");
            unset($tasks[$id]);
            break;
        case 4:
            echo "Rediģēšana tiks izstradāta vēlāk\n";
            break;
        case 5:
            foreach ($tasks as $task) {
                displayTask($task);
            }
            break;
        case 6:
            echo "Uz redzēšanos!";
            $continue = false;
            break;
        default:
            echo "Invalid option selected";
    }

    echo "==========\n\n";
    // $continue = readline("Turpināt?\n");
} while ($continue === 'y');
