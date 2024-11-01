<?php

class Solution {

    /**
     * #1957. Видалити символи з рядка, щоб зробити його модним

        Модний рядок - це рядок, в якому будь-які три символи поспіль не збігаються.
        Якщо задано рядок s, видаліть з s мінімально можливу кількість символів, щоб зробити його модним.
        Поверніть остаточний рядок після видалення. Можна показати, що відповідь завжди буде унікальною.

        https://leetcode.com/problems/delete-characters-to-make-fancy-string/

     * @param String $s
     * @return String
     */
    function makeFancyString($s) {

        $result = '';
        $previousCharacter = '';
        $counter = 0;

        for($i=0;$i<strlen($s);$i++) {
            $currentCharacter = $s[$i];
            if ($currentCharacter == $previousCharacter) {
                $counter++;
            } else {
                $previousCharacter = $currentCharacter;
                $counter = 1;
            }

            if ($counter > 2) {
                continue;
            }

            $result .= $currentCharacter;
        }

        return $result;

    }
}