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

function varDumpTasks($tasks) {
    echo "==== sākam izvadīt visus uzdevumus =====\n\n";
    var_dump($tasks);
    echo "==== beidzam izvadīt visus uzdevumus =====\n\n";
}



$id = 1; // pēc tam var prasīt lietotājam ar readline
$taskFound; //glabāsies atrastais uzdevums jeb $task

// atrast un saglabāt $taskFound mainīgajā elementu, kuram id ir 1
foreach ($tasks as $task) {
    // ejam cauri katram uzdevumam un to,
    // kuram ir id = 1 saglabājam kā $taskFound
    if ($task['id'] == $id) {
        $taskFound = $task;
    }
}

varDumpTasks($tasks);

echo "==== izmainam un izvadam taskFound mainīgā saturu ===== \n\n";

// !!! šī rinda neizmaina oriģinālā $tasks masīva elementus
// $taskFound['content'] = "izmainīts saturs 1.uzdevumam";

// lai izmainītu elementu $tasks masīvā, tiem jāpiekļūst ar indeksu;
$tasks[0]['content'] = "izmainīts saturs 1.uzdevumam";
// echo $taskFound['content'] . "\n\n";
echo "==========\n\n";

varDumpTasks($tasks);


$id = readline("Ievadiet rediģējamā uzdevuma ID: ");

function findTaskIndexById($tasks, $id) {
    foreach ($tasks as $index => $task) {
        if ($task['id'] == $id) {
            return $index;
        }
    }
}

$index = findTaskIndexById($tasks, $id);
echo "===== atrastais index: {$index} =====\n\n";


$newContent = readline("Ievadiet jaunu saturu: ");
$tasks[$index]['content'] = $newContent;

varDumpTasks($tasks);



