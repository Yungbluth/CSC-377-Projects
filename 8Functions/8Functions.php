<?php
/**
 * 8 PHP functions requiring functions, assert, selection, repetition, and arrays,
 * The code has a few asserts and some output, which you may delete when done.
 * Write more asserts to test your code. We will have many more asserts when grading.
 * It is important for you to learn how to test your code.
 * 
 * Programmer: Matthew Yungbluth
 */


// 1) howSwedish
// ABBA is a band, they have many songs including Dancing Queen, and
// Fernando. ABBA is actually a Swedish band, so if we wanted to find
// out howSwedish a String is, we could simply find out how many times
// the String contains the substring "abba". We want to look for this
// substring in a case insensitive manner. So "abba" counts, and so
// does "aBbA". We also want to check for overlapping abba's such as
// in the String "abbAbba" that contains "abba" twice.
//
// howSwedish("ABBA a b b a") returns 1
// howSwedish("abbabba!") returns 2
function howSwedish($str) {
    $str = strtolower($str);
    $count = 0;
    for ($i = 0; $i < strlen($str)-3; $i++) {
        if ($str[$i] == 'a' && $str[$i+1] == 'b' && $str[$i+2] == 'b' && $str[$i+3] == 'a') {
            $count += 1;
        }
    }
    return $count;
}

assert ( 2 == howSwedish ( 'abbabba' ) );
assert ( 0 == howSwedish ( '' ) );
assert ( 2 == howSwedish ( 'abBAbba' ) );
assert ( 1 == howSwedish ( 'aBbabis' ) );
assert ( 3 == howSwedish ( 'abbabbAbbabidsoba' ) );



// 2)  mirrorEnds
// Complete method mirrorEnds that given a string, looks for a mirror 
// image (backwards) string at both the beginning and end of the given string. 
// In other words, zero or more characters at the very beginning of the given 
// string, and at the very end of the string in reverse order (possibly overlapping). 
// For example, "abXYZba" has the mirror end "ab". 
//
// assert("" == mirrorEnds(""));
// assert("" == mirrorEnds("abcde"));
// assert("a" == mirrorEnds("abca"));
// assert("aba" ==  mirrorEnds("aba"));
//
function mirrorEnds($str) {
    $returnstr = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == $str[strlen($str)-($i+1)]) {
            $returnstr += $str[$i];
        }
    }
    return $returnstr;
}

assert ( 'abc' == mirrorEnds ( 'abcdefcba' ) );
assert ( 'jf' == mirrorEnds ( 'jfdsDJSAsDfj' ) );
assert ( '' == mirrorEnds ( '' ) );
assert ( 'a' == mirrorEnds ( 'aAaa' ) );
assert ( 'racecar' == mirrorEnds ( 'racecar' ) );
assert ( 'ab' != mirrorEnds ( 'aBbA' ) );



// 3) isStringSorted
// Given a String, return true if the letters are in ascending order.
// Note: 'a' < 'b' and '5' < '8'
// isStringSorted("") returns true
// isStringSorted("a") returns true
// isStringSorted("abbcddef") returns true
// isStringSorted("123456") returns true
// isStringSorted("12321") returns false
function isStringSorted($str) {
    for ($i = 0; $i < strlen($str)-1; $i++) {
        if ($str[$i] > $str[$i+1]) {
            return false;
        }
    }
    return true;
}

assert ( ! isStringSorted ( 'cba' ) );
assert ( ! isStringSorted ( '321' ) );
assert ( isStringSorted ( 'abc' ) );
assert ( isStringSorted ( '123' ) );
assert ( isStringSorted ( '' ) );
assert ( isStringSorted ( 'abbcddef' ) );
assert ( ! isStringSorted ( '12321' ) );
assert ( isStringSorted ( 'a' ) );



// 4) maxBlock
// Given a string, return the length of the largest "block" in the string.
// A block is a run of adjacent chars that are the same.
// maxBlock("hoopla") returns 2
// maxBlock("abbCCCddBBBxx") returns 3
// maxBlock("") returns 0
//
function maxBlock($str) {
    if (strlen($str) <= 1) {
        return strlen($str);
    }
    $maxBlock = 0;
    $curNum = 1;
    for ($i = 1; $i < strlen($str); $i++) {
        if ($str[$i] == $str[$i-1] && $i != strlen($str) - 1) {
            $curNum += 1;
        } else {
            if ($curNum > $maxBlock) {
                $maxBlock = $curNum;
                $curNum = 0;
                if ($i == strlen($str) - 1) {
                    $maxBlock +=1 ;
                }
            }
        }
    }
    return $maxBlock;
}

assert ( 3 == maxBlock ( "abbCCCddBBBxx" ) );
assert ( 0 == maxBlock ( "" ) );
assert ( 1 == maxBlock ( "abcdefjabcdjsh" ) );
assert ( 2 == maxBlock ( "aaAAaaAA" ) );
assert ( 5 == maxBlock ( "aaaaa" ) );
assert ( 1 == maxBlock ( "a" ) );



// 5) isArraySorted
// Given an array , return true if the element are in ascending order.
// Note: 'abe' < 'ben' and 5 > 3
// Precondition $arr has all the same type of elements
function isArraySorted($arr) {
    for ($i = 0; $i < sizeof($arr)-1; $i++) {
        if ($arr[$i] > $arr[$i+1]) {
            return false;
        }
    }
    return true;
}

assert ( isArraySorted ( array (
    1,
    2,
    2,
    99 ) ) );

assert ( ! isArraySorted ( array (
    5,
    2,
    2,
    99 ) ) );
assert ( isArraySorted ( array (
    "a",
    "b",
    "c",
    "t" ) ) );
assert ( isArraySorted ( array () ) );
assert ( ! isArraySorted ( array (
    "z",
    "a", ) ) );
assert ( isArraySorted ( array (
    1) ) );

    
// 6) numberOfPairs
// Return the number of times a pair occurs in array. A pair is any two String values that are equal (case
// sensitive) in consecutive array elements. The array may be empty or have only one element. In both of
// these cases, return 0.
//
// numberOfPairs( array('a', 'b', 'c') ) returns 0
// numberOfPairs( array('a', 'a', 'a') ) returns 2
// assert(2 == numberOfPairs( array('a', 'a', 'b', 'b' ) ) );
// numberOfPairs( array ( ) ) returns 0
// numberOfPairs( array ('a') ) returns 0
// Precondition: $arr has all the same type of elements
function numberOfPairs($arr) {
    $pairs = 0;
    for ($i = 0; $i < sizeof($arr)-1; $i++) {
        for ($j = $i+1; $j < sizeof($arr); $j++) {
            if ($arr[$i] == $arr[$j]) {
                $pairs += 1;
                break;
            }
        }
    }
    return $pairs;
}

assert(2 == numberOfPairs( array('a', 'a', 'b', 'b' ) ) );
assert(0 == numberOfPairs( array('a', 'b', 'c', 'd' ) ) );
assert(2 == numberOfPairs( array(1, 1, 2, 2 ) ) );
assert(2 == numberOfPairs( array('a', 'a', 'a' ) ) );
assert(0 == numberOfPairs( array() ) );
assert(0 == numberOfPairs( array(1) ) );
assert(1 == numberOfPairs( array('a', 'a' ) ) );
assert(4 == numberOfPairs( array('a', 'a', 'a', 'b', 'b', 'b' ) ) );



// 7) frequency
// Given an  array of integers in the range of 0..10 (like quiz scores), 
// return an array of 11 integers where the first value (at index 0) is the
// number of 0s in the array argument, the second value (at index 1) is the number 
// of ones in the array and the 11th value (at index 10) is the number of 
// tens in the array. The following assertions must pass.
//
// Precondition: $arr has valid ints in the range of 0..10
function frequency($arr) {
    $returnArr = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    for ($i = 0; $i < sizeof($arr); $i++) {
        $returnArr[$arr[$i]] += 1;
    }
    return $returnArr;
}

$arr = frequency ( array (
    1,
    1,
    4,
    4,
    4,
    9,
    9,
    9,
    9,
    10,
    0,
    0,
    0,
    0,
    0 ) );

assert(5 == $arr[0]);
assert(1 == $arr[10]);
assert(0 == $arr[2]);
assert(0 != $arr[1]);
// Use print_r to show all array elements




// 8) shiftNTimes
// Modify array so it is "left shifted" n times -- so shiftNTimes(array(6, 2, 5, 3), 1) 
// changes the array argument to (2, 5, 3, 6) and shiftNTimes(array(6, 2, 5, 3), 2) 
// changes the array argument to (5, 3, 6, 2). You must modify the array argument by 
// changing the parameter array inside method shiftNTimes. A change to the 
// parameter inside the method shiftNTimes changes the argument if the 
// argument is passed by reference, that means it is preceded by an ampersand &
//
// shiftNTimes( array(1, 2, 3, 4, 5, 6, 7), 3 ) modifies array to ( 4, 5, 6, 7, 1, 2, 3 )
// shiftNTimes( array(1, 2, 3), 5) modifies array to (3, 1, 2)
// shiftNTimes( array(3), 5) modifies array to (3)
//
function shiftNTimes(& $array, $numShifts) {
    if (sizeof($array) <= 1) {
        return;
    }
    if ($numShifts == 0) {
        return;
    } else {
        $firstEle = $array[0];
        for ($i = 0; $i < sizeof($array)-1; $i++) {
            $array[$i] = $array[$i+1];
        }
        $array[sizeof($array)-1] = $firstEle;
        shiftNTimes($array, $numShifts-1);
    }
}


$arr = array (
    1,
    2,
    3,
    4 );
shiftNTimes ( $arr, 2 );
assert(3 == $arr[0]);
assert(4 == $arr[1]);
$arr = array (
    "a",
    "b",
    "c",
    "d" );
shiftNTimes ( $arr, 1);
assert("b" == $arr[0]);
assert("a" == $arr[3]);
$arr = array (
    1,
    2,
    3,
    4 );
shiftNTimes ( $arr, 0);
assert(1 == $arr[0]);
$arr = array (
    1);
shiftNTimes ( $arr, 5);
assert(1 == $arr[0]);
$arr = array();
shiftNTimes ( $arr, 10);
assert($arr == array());

?>
