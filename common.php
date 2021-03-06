<?php

$folder = __DIR__ . '/private_session_folder_unique_name';
$installed = file_exists(__DIR__ . '/.installed');

if (!$installed) {
    $folderCreated = mkdir($folder, 0700);

    if (!$folderCreated) {
        exit('You already have a folder that should be privately used for storing sessions, exited.');
    }

    if (file_put_contents(__DIR__ . '/.installed', '') === false) {
        exit('Unable to touch .installed file, exited.');
    }
}

session_save_path($folder);
