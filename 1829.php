<?php

class Solution {

    /**
        1829. Максимальне значення XOR для кожного запиту    

        Вам надано відсортований масив nums з n натуральних чисел і натуральне число maximumBit. Ви хочете виконати наступний запит n разів:

        Знайдіть невід'ємне ціле число k < 2^maximumBit, таке, щоб nums[0] XOR nums[1] XOR ... XOR nums[nums.length-1] X XOR k було максимальним. 
        k - це відповідь на I-й запит.
        
        Видаліть останній елемент із поточного масиву nums.

        Поверніть масив answer, де answer[i] - це відповідь на i-й запит.

        https://leetcode.com/problems/maximum-xor-for-each-query/

     * @param Integer[] $nums
     * @param Integer $maximumBit
     * @return Integer[]
     */
    function getMaximumXor($nums, $maximumBit) {
        $max = pow(2, $maximumBit) - 1;
        $answer[0] = $nums[0] ^ $max;
        for ($i=1;$i<count($nums);$i++) {
            $answer[$i] = $answer[$i-1] ^ $nums[$i];
        }
        return array_reverse($answer);
    }
}