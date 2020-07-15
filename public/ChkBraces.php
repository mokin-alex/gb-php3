<?php

//Проверить баланс скобок в выражении, игнорируя любые внуренние символы. В решении по возможности испольщовать SplStack

class ChkBraces
{

    public static function check(string $str): bool
    {
        $braceList = ['(' => ')', '[' => ']', '{' => '}'];
        $braceListInvert = [')' => '(', ']' => '[', '}' => '{']; //массив для поиска пары
        $length = strlen($str);
        $stack = new SplStack(); //в задании предложено использовать SPL стек.
        for ($i = 0; $i < $length; $i++) {
            $char = $str[$i]; //
            if (isset($braceList[$char])) { //попалась открывающая скобка
                $stack->push($braceList[$char]);
            } else if (isset($braceListInvert[$char])) { //попалась закрывающая скобка
                if ($stack->isEmpty()){ return false;} //если ни одной открывающей скобки до этого не было
                $lastBrace = $stack->pop();
                if ($char != $lastBrace) { //это не пара для открытой скобки
                    return false;
                }
            }
        }
        if ($stack->isEmpty()) { //проверка если в стеке не осталась открывающих скобок.
            return true;
        } else {
            return false;
        }
    }
}
