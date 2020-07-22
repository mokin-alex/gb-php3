<?php

$row = 8;
$col = 10;
$inputArr = [];
$outputArray = [[]];

for ($i = 0; $i < $row * $col; $i++) { // Заполним начальный массив значениями
    array_push($inputArr, $i);
}

TopSide($inputArr, 0, $row - 1, $col - 1, 0, $outputArray);

//Заполним значениями самую Верхнюю сторону двумерного массива
function TopSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, &$outputArray)
{
    if (sizeof($inputArr) == 0) {
        return;
    }
    for ($i = $positionLeft; $i <= $positionRight; $i++) {
        $outputArray[$positionTop][$i] = array_shift($inputArr); //заполняем сторону
    }
    $positionTop++;
    RightSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, $outputArray);

}
//Заполним значениями самую Правую сторону двумерного массива
function RightSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, &$outputArray)
{
    if (sizeof($inputArr) == 0) {
        return;
    }
        for ($i = $positionTop; $i <= $positionBottom; $i++) {
            $outputArray[$i][$positionRight] = array_shift($inputArr);
        }
        $positionRight--;
        BottomSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, $outputArray);
}

//Заполним значениями самую Нижнюю сторону двумерного массива
function BottomSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, &$outputArray)
{
    if (sizeof($inputArr) == 0) {
        return;
    }
        for ($i = $positionRight; $i >= $positionLeft; $i--) {
            $outputArray[$positionBottom][$i] = array_shift($inputArr);
        }
        $positionBottom--;
        LeftSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, $outputArray);
}

//Заполним значениями самую Левую сторону двумерного массива
function LeftSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, &$outputArray)
{
    if (sizeof($inputArr) == 0) {
        return;
    }
        for ($i = $positionBottom; $i >= $positionTop; $i--) {
            $outputArray[$i][$positionLeft] = array_shift($inputArr);
        }
        $positionLeft++;
        TopSide($inputArr, $positionTop, $positionBottom, $positionRight, $positionLeft, $outputArray);
        // повторим по спирали
}
echo "<h2>Значения массива по спирали: </h2>";
for ($i = 0; $i < $row; $i++) {
    for ($j = 0; $j < $col; $j++) {
        printf("%02s\n", $outputArray[$i][$j]); // добавим лидирующий 0 для выравнивания
    }
    echo "<br>";
}