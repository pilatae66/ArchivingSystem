<?php
define('MAIN_DIR', "/var/www/laravel/public");
define('ROOT', "/var/www/laravel");
define('MAIN_BRANCH', "main");

// - check if post is TRUE
// if (isset($_POST['payload']) === FALSE) {
//         echo "Invalid POST data";
//         exit();
// }

// // - get payload.
// $payload = json_decode(@$_POST['payload']);

// // - check if the payload with ref exists
// if (
//         !isset($payload->ref) ||
//         (isset($payload->ref) && !strpos($payload->ref, MAIN_BRANCH))
// ) {
//         echo "Invalid Branch";
//         exit();
// }

// - commands
$commandCD = "cd " . MAIN_DIR;
$commandRootCD = "cd " . ROOT;
$commandFetch = $commandCD . " && git fetch origin " . MAIN_BRANCH;
$commandReset = $commandCD . " && git reset --hard FETCH_HEAD";
$commandMigration = $commandRootCD . " && php artisan migrate";

// - debug
var_dump("- RUNNING THE FOLLOWING COMMANDS -");
var_dump($commandCD);
var_dump($commandFetch);
var_dump($commandReset);
var_dump($commandMigration);

// - run commands
executeCommand($commandCD);
executeCommand($commandFetch);
var_dump(executeCommand($commandReset));
var_dump(executeCommand($commandMigration));

// - execute command
function executeCommand($command){
        ob_start();
        system($command);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
}
