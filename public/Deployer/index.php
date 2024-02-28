<?php
define('MAIN_DIR', "/var/www/html/salmon-breakfast");
define('MAIN_BRANCH', "main");

// - check if post is TRUE
if (isset($_POST['payload']) === FALSE) {
        echo "Invalid POST data";
        exit();
}

// - get payload.
$payload = json_decode(@$_POST['payload']);

// - check if the payload with ref exists
if (
        !isset($payload->ref) ||
        (isset($payload->ref) && !strpos($payload->ref, MAIN_BRANCH))
) {
        echo "Invalid Branch";
        exit();
}

// - commands
$commandCD = "cd " . MAIN_DIR;
$commandFetch = $commandCD . " && git fetch origin " . MAIN_BRANCH;
$commandReset = $commandCD . " && git reset --hard FETCH_HEAD";
$commandReset = $commandCD . " && npm install";
$commandReset = $commandCD . " && npm run build";

// - debug
var_dump("- RUNNING THE FOLLOWING COMMANDS -");
var_dump($commandCD);
var_dump($commandFetch);
var_dump($commandReset);

// - run commands
executeCommand($commandCD);
executeCommand($commandFetch);
var_dump(executeCommand($commandReset));

// - execute command
function executeCommand($command){
        ob_start();
        system($command);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
}
