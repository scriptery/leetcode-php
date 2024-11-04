<?php

class Solution {

    /**
     * #3163. Стиснення рядка III

        Cтисніть заданий рядок, використовуючи наступний алгоритм:

        Почніть з порожнього рядка comp. Якщо рядок не є порожнім, використовуйте наступну операцію:
        Видаліть префікс максимальної довжини рядка, що складається з одного символу c, що повторюється не більше 9 разів.
        Додайте довжину префікса, а потім c для завершення.
        Поверніть рядок comp.

        https://leetcode.com/problems/string-compression-iii/
     * @param String $word
     * @return String
     */
    function compressedString($word) {
        $comp = "";
        $character = $word[0];
        $repeated = 1;
        $word .= '-';
        for ($i=1;$i<strlen($word);$i++) {
            if ($word[$i] == $character) {
                $repeated++;
            } else {
                while ($repeated > 0) {
                    $toWrite = min(9, $repeated);
                    $comp .= $toWrite.$character;
                    $repeated -= $toWrite;
                }
                $character = $word[$i];
                $repeated = 1;
            }
        }
        
        return $comp;
    }
}