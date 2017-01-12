#!/usr/bin/php

<?php

require_once "LogAnalyzer.php";

$stats = [];
$stdin = fopen("php://stdin", "r");

if ($stdin) {
    $la = new LogAnalyzer();

    while (!feof($stdin)) {
        while (($line = fgets($stdin, 4096)) !== false) {
            $la->process($line);
        }
    }

    fclose($stdin);

    $stats = $la->getStats();
}

if (empty($stats)) {
    print "Empty file.\n";
} else {
    print_r($stats);
}