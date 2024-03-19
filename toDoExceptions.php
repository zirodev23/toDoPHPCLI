<?php

// izveidot funkcionalitāti addTask

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
    echo "ID: {$task['id']}, CONTENT: {$task['content']}, STATUS: {$task['status']}\n";
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
                // pielāgot šo kodu asociatīvaja, masīvam
                $new = readline("Ievadiet jaunu uzdevumu\n");
                // array_push($tasks, ['id' => 100, 'status' => 'new', 'content' => $new]);
                $lastTask = end($tasks);
                $newId = $lastTask['id'] + 1;

                $tasks[] = [
                    'id' => $newId,
                    'status' => 'new',
                    'content' => $new
                ];

                break;
            case 3:
                $id = readline("Ievadiet dzēšamā uzdevuma indeksu\n");
                unset($tasks[$id]);
                break;
            case 4:
                echo "Rediģēšana tiks izstradāta vēlāk\n";
                // function edit(&$tasks){
                    $id = readline("Ievadi uzdevuma ID kur tu grib kaut ko mainit : \n");
                    $task = findTaskById($tasks, $id);
                    if (!isset($task)) {
                        throw new Exception("Uzdevums nevar būt tukšs");
                    }
                    displayTask($task);
                
                    $newContent = readline("ievadit jaunu contentu : ");
                    // pārbaudīt ar empty 
                
                    $task['content'] = $newContent;

                    displayTask($task);

                    // $tasks[]= [
                    //     'id'=> 1,
                    //     'content'=>$newContent,
                    //     'status'=>'new'
                    // ];
                // }
                break;
            case 5:
                foreach($tasks as $task) {
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
    } catch (Exception $e) {
        echo $e->getMessage();
    }
 
 
    echo "==========\n\n";
    // $continue = readline("Turpināt?\n");
} while ($continue === 'y');