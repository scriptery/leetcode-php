<?php

class Solution {

    /**
        3097. Найкоротший підмасив з OR ≥ K II

        Вам заданий масив nums з невід'ємних цілих чисел і ціле число k.

        Масив називається спеціальним, якщо побітове значення OR для всіх його елементів дорівнює як мінімум k.

        Поверніть довжину найкоротшого спеціального непорожнього підмасиву nums або поверніть -1,
        якщо спеціального підмасиву не існує.

        https://leetcode.com/problems/shortest-subarray-with-or-at-least-k-ii/

     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minimumSubarrayLength($nums, $k) {
        if (max($nums)>=$k) {
            return 1;
        }

        $left = 0;
        $right = 0;
        $answer = PHP_INT_MAX;

        $or = $nums[0];
        $counts = $this->getBits($nums[0]);

        while ( ($left < count($nums)) && ($right < count($nums)) ) {
            if ($or < $k) {
                $right++;
                $or = $or | $nums[$right];
                $bits = $this->getBits($nums[$right]);
                foreach ($bits as $i=>$bit) {
                    $counts[$i] += $bit;
                }
            } else {
                $answer = min($answer, $right - $left + 1);
                $bits = $this->getBits($nums[$left]);
                foreach ($bits as $i=>$bit) {
                    $counts[$i] -= $bit;
                }                
                $or = 0;
                foreach ($counts as $i=>$bit) {
                    if ($bit) {
                        $or += pow(2, $i);
                    }
                }
                $left++;
            }
        }

        if ($answer == PHP_INT_MAX) {
            return -1;
        }

        return $answer;
    }

    private function getBits($num) {
        $bits = [];
        while ($num > 0) {
            $bits[] = $num & 1;
            $num >>= 1;
        }
        return $bits;
    }
}