<?php

class Solution {

    /**
     * 2275. Найбільша комбінація з побітовим AND більше нуля

        Побітове значення AND масиву nums дорівнює побітовому значенню AND всіх цілих чисел у nums.

        Наприклад, для nums = [1, 5, 3] побітове значення AND дорівнює 1 & 5 & 3 = 1.
        Крім того, для nums = [7] побітове значення AND дорівнює 7.

        Вам надається масив натуральних чисел candidates. 
        Обчисліть побітове значення AND для кожної комбінації candidates. 

        Кожне число в candidates може використовуватися тільки один раз в кожній комбінації.

        Поверніть розмір найбільшої комбінації candidates з побітовим значенням AND більше 0.

        https://leetcode.com/problems/largest-combination-with-bitwise-and-greater-than-zero/

     * @param Integer[] $candidates
     * @return Integer
     */
    function largestCombination($candidates) {
        $bitsCounter = [];
        foreach ($candidates as $number) {
            $bits = $this->getSetBits($number);
            foreach ($bits as $pos) {
                $bitsCounter[$pos]++;
            }
        }
        return max($bitsCounter);
    }

    private function getSetBits($number) {
        $bits = [];
        $pos = 0;
        while ($number > 0) {
            if ($number & 1) {
                $bits[] = $pos;
            }
            $pos++;
            $number >>= 1;
        }
        return $bits;
    }
}