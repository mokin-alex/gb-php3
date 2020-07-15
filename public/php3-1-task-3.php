<?php

if (isset($_GET["path"])) {
    $path = $_GET["path"];
}

$dirItems = new DirectoryIterator(__DIR__ . '/' . $path);

foreach ($dirItems as $item) {
    if ($item->isDir()) { //для директорий делаем ссылку:
        echo "<a href=./?path=${path}/${item}>${item}</a><br>";
    } else {
        echo "${item}<br>";
    }
}