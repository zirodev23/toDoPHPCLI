<?php

// isset() un empty()

$tasks = [];

function addTask(&$tasks, $newTask) {
    // array_push
    if ( empty($newTask) ) {
        throw new Exception("Uzdevums nevar būt tukšs");
    }

    $tasks[] = $newTask;
}

$input = readline("Ievadiet uzdevumu: ");


try {
    addTask($tasks, $input);
    var_dump($tasks);
} catch (Exception $e) {
    // var_dump($e);
    // Handle exception // Apstrādā izņēmumu
    echo $e->getMessage();
}
