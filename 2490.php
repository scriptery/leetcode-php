<?php

class Solution {

    /**
     * #2490. Закільцоване речення

        Речення - це список слів, розділених одним пробілом, без початкових та кінцевих пробілів.

        Наприклад, "Hello World", "HELLO", "hello world hello world" - це все речення.
        Слова складаються тільки з великих і малих англійських літер. Великі та малі англійські літери вважаються різними.

        Речення є закільцованним, якщо:

        Останній символ слова дорівнює першому символу наступного слова.
        Останній символ останнього слова дорівнює першому символу першого слова.
        Наприклад, "leetcode exercises sound delightful", "eetcode", "leetcode eats soul" - все це закільцованні речення.
        Однак "Leetcode is cool", "happy Leetcode", "Leetcode" i "I like Leetcode" не є закільцованними реченнями.

        Якщо речення є закільцованним, поверніть значення true. В іншому випадку поверніть значення false.

        https://leetcode.com/problems/circular-sentence/

     * @param String $sentence
     * @return Boolean
     */
    function isCircularSentence($sentence) {
        
        $words = explode(' ', $sentence);

        for ($i=0; $i<count($words); $i++) {
            $nextWord = $words[$i+1] ?? $words[0];
            if (substr($words[$i], -1) !== substr($nextWord, 0, 1)) {
                return false;
            }
        }

        return true;

    }
}