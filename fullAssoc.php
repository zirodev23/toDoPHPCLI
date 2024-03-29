<?php

// testa dati
// multi-dimensional arrays

$tasks = [
    1 => [
        'status' => 'done',
        'priority' => 2,
        'content' => 'konsultācija 15:10'
    ],
    2 => [
        'status' => 'inprogress',
        'priority' => 5,
        'content'=> 'nopirkt zobu birsti'
    ]
];

function showTask($inputTasks) {
    $id = readline("Ievadi uzdevuma ID: ");
    $task = $inputTasks[$id];
    displayTask($id, $task);
}

function addTask(&$inputTasks) {
    $new = readline("Ievadiet jaunu uzdevumu\n");
    // array_push($tasks, ['id' => 100, 'status' => 'new', 'content' => $new]);
    end($inputTasks);
    $lastKey = key($inputTasks);
    reset($inputTasks);

    // print_r($lastTask);
    $newId = $lastKey + 1;

    $inputTasks[$newId] = [
        'status' => 'new',
        'priority' => 5,
        'content' => $new
    ];
}

function editTask(&$inputTasks) {
    $id = readline("Ievadi uzdevuma ID, kuru vēlies mainīt: ");
    if (!isset($inputTasks[$id])) {
        throw new Exception("Uzdevums nav atrasts\n");
    }

    $newContent = readline("Ievadīt jaunu saturu: ");            
    if (empty($newContent)) {
        throw new Exception("Saturs nav ievadīts\n");
    }

    $inputTasks[$id]['content'] = $newContent;
}

function displayTask($id, $task) {
    echo "ID: {$id}, CONTENT: {$task['content']}, STATUS: {$task['status']}\n";
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
    try {
        switch ($choice) {
            case 1:
                showTask($tasks);        
                break;
            case 2:
                addTask($tasks);
                break;
            case 3:
                $id = readline("Ievadiet dzēšamā uzdevuma indeksu\n");
                unset($tasks[$id]);
                break;
            case 4:
                editTask($tasks);
                break;
            case 5:
                foreach($tasks as $id => $task) {
                    displayTask($id, $task);
                }
                break;
            case 6:
                echo "Uz redzēšanos!";
                $continue = false;
                break;
            default:
                echo "Invalid option selected";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
 
 
    echo "==========\n\n";
    // $continue = readline("Turpināt?\n");
} while ($continue === 'y');