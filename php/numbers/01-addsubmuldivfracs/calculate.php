<?php

$operation = $_POST['operation'];

$fractions = $_POST['frac'];

switch ($operation) {
    case 'add':
        $result = addFractions($fractions);
        break;
    case 'subtract':
        $result = subtractFractions($fractions);
        break;
    case 'multiply':
        $result = multiplyFractions($fractions);
        break;
    case 'divide':
        $result = divideFractions($fractions);
        break;
}

echo $result['numerator'] . " / " . $result['denominator'];

function addFractions($fractions)
{
    $result = [];
    if(checkDenominators($fractions)) {
        // lets just add the tops
        $result['numerator'] = $fractions['1']['numerator'] + $fractions['2']['numerator'];
        $result['denominator'] = $fractions['1']['denominator'];
        return $result;
    } else {
        //echo "Bottoms not equal";
        $lcm = lcm($fractions['1']['denominator'], $fractions['2']['denominator']);
        $tmp = [];
        $tmp['1']['numerator'] = ($lcm/$fractions['1']['denominator']) * $fractions['1']['numerator'];
        $tmp['2']['numerator'] = ($lcm/$fractions['2']['denominator']) * $fractions['2']['numerator'];
        $result['numerator'] = $tmp['1']['numerator'] + $tmp['2']['numerator'];
        $result['denominator'] = $lcm;
        return $result;
    }

}

function subtractFractions($fractions)
{
    $result = [];
    if(checkDenominators($fractions)) {
        // lets just add the tops
        $result['numerator'] = $fractions['1']['numerator'] - $fractions['2']['numerator'];
        $result['denominator'] = $fractions['1']['denominator'];
        return $result;
    } else {
        //echo "Bottoms not equal";
        $lcm = lcm($fractions['1']['denominator'], $fractions['2']['denominator']);
        $tmp = [];
        $tmp['1']['numerator'] = ($lcm/$fractions['1']['denominator']) * $fractions['1']['numerator'];
        $tmp['2']['numerator'] = ($lcm/$fractions['2']['denominator']) * $fractions['2']['numerator'];
        $result['numerator'] = $tmp['1']['numerator'] - $tmp['2']['numerator'];
        $result['denominator'] = $lcm;
        return $result;
    }
}

function multiplyFractions($fractions)
{
    $result['numerator'] = $fractions['1']['numerator'] * $fractions['2']['numerator'];
    $result['denominator'] = $fractions['1']['denominator'] * $fractions['2']['denominator'];
    return $result;
}

function divideFractions($fractions)
{
    $result['numerator'] = $fractions['1']['numerator'] * $fractions['2']['denominator'];
    $result['denominator'] = $fractions['1']['denominator'] * $fractions['2']['numerator'];
    return $result;
}

function checkDenominators($fractions)
{
    if($fractions['1']['denominator'] === $fractions['2']['denominator']) {
       return true;
    } else {
        return false;
    }
}

function lcm($a, $b)
{
    // lcm(a, b) = a * b / gcd(a, b)

    return $a * $b / gcd($a, $b);
}

function gcd($a, $b)
{
    // Everything divides 0
    if ($a == 0)
        return $b;
    if ($b == 0)
        return $a;

    // base case
    if($a == $b)
        return $a ;

    // a is greater
    if($a > $b)
        return gcd( $a-$b , $b ) ;

    // b is greater
    return gcd( $a , $b-$a ) ;
}
