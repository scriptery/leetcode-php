<?php

class Solution {

    /**
        3133. Мінімальний кінець масиву

        Вам дано два цілих числа n і x. Ви повинні побудувати масив натуральних чисел nums розміру n, 
        де для кожного 0 <= i < n - 1 значення nums[i + 1] більше, ніж значення nums[i], і результат 
        побітової операції AND між усіма елементами цього масиву nums - це x.

        Поверніть мінімально можливе значення nums [n - 1].

     * @param Integer $n
     * @param Integer $x
     * @return Integer
     */
    function minEnd($n, $x) {
        $xBits = $this->getBits($x);
        
        $nBits = $this->getBits($n-1);

        $pos = 0;
        for ($i=0;$i<count($nBits);$i++) {
            while ($xBits[$pos] === 1) {
                $pos++;
            }
            $xBits[$pos++] = $nBits[$i];
        }

        $result = 0;
        $pow = 1;

        for ($i=0;$i<count($xBits);$i++) {
            $result += $xBits[$i]*$pow;
            $pow *= 2;
        }

        return $result;
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