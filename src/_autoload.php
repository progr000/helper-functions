<?php
$files = glob(__DIR__ . '/helper-*.php');
if ($files) {
    foreach ($files as $file) {
        require_once $file;
    }
    unset($file);
}
unset($files);
