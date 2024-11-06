<?php

class Solution {

    /**
     * 3011. З'ясувати, чи можна відсортувати масив

        Вам надається масив натуральних чисел nums з індексом 0.

        За одну операцію ви можете поміняти місцями будь-які два сусідні елементи, якщо вони мають однакову кількість встановлених бітів. 
        Ви можете виконувати цю операцію будь-яку кількість разів (включаючи нуль).

        Поверніть true, якщо ви можете відсортувати масив, інакше поверніть false.

        https://leetcode.com/problems/find-if-array-can-be-sorted/

     * @param Integer[] $nums
     * @return Boolean
     */
    function canSortArray($nums) {
        $currentSegmentWeight = 0;
        $currentSegmentMinimum = PHP_INT_MAX;
        $currentSegmentMaximum = 0;

        $prevSegmentMaximum = 0;

        $nums[] = 1023;

        foreach ($nums as $number) {
            $weight = $this->HammingWeight($number);
            
            if ($weight == $currentSegmentWeight) {
                $currentSegmentMinimum = min($currentSegmentMinimum, $number);
                $currentSegmentMaximum = max($currentSegmentMaximum, $number);
            } else {
                if ($prevSegmentMaximum && ($prevSegmentMaximum > $currentSegmentMinimum) ) {
                    return false;
                }

                $prevSegmentMaximum = $currentSegmentMaximum;

                $currentSegmentWeight = $weight;
                $currentSegmentMinimum = $number;
                $currentSegmentMaximum = $number;
            }
        }

        return true;
    }

    private function HammingWeight($number) {
        $weight = 0;

        while ($number > 0) {
            $weight += $number & 1; 
            $number >>= 1;
        }

        return $weight;
    }
}