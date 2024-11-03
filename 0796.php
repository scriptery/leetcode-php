<?php

class Solution {

    /**
     * #796. Обернути рядок

        Маючи два рядки s і goal, поверніть значення true тоді і тільки тоді, коли s може перетворитися на goal після деяких зсувів у s.

        Зсув в s полягає в переміщенні крайнього лівого символу s в крайню праву позицію.

        Наприклад, якщо s = "abcde", то після одного зсуву це буде "bcdea".

        https://leetcode.com/problems/rotate-string/

     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function rotateString($s, $goal) {
        
        for ($i=0;$i<strlen($s);$i++) {
            if (substr($s,$i).substr($s,0,$i) == $goal) {
                return true;
            }
        }

        return false;
    }
}