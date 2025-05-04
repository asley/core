<?php

declare(strict_types=1);

use Gibbon\Services\BackgroundProcess;

// Trigger the retrainVectorStore script via BackgroundProcess
$process = new BackgroundProcess(__DIR__ . '/../bin/retrainVectorStore.php');
$process->run();

?>