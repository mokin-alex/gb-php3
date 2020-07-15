<?php
require_once "ChkBraces.php";

$braces = $_GET['braces'];
if (ChkBraces::check($braces)) {
    echo "OK";
} else {
    echo "ERR";
}

