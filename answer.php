<?php

/*
在命令行运行:
$ php -f answer.php
 */

/**-----------------------------------------------------------------------------
 * 函数
 */

/**
 * 检查答案。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合所有条件，返回true；否则返回false。
 */
function check_answers($answers)
{
    return check_condition2($answers)  // 问题2的限制条件
        && check_condition3($answers)  // 问题3的限制条件
        && check_condition4($answers)  // 问题4的限制条件
        && check_condition5($answers)  // 问题5的限制条件
        && check_condition6($answers); // 问题6的限制条件
}

/**
 * 检查问题2的限制条件：
 * 第2题的答案为A时，第5题答案为C，或者
 * 第2题的答案为B时，第5题答案为D，或者
 * 第2题的答案为C时，第5题答案为A，或者
 * 第2题的答案为D时，第5题答案为B。
 * 。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合问题2的限制条件，返回true；否则返回false。
 */
function check_condition2($answers)
{
    $result =
        $answers[1] === 'A' && $answers[4] === 'C' ||
        $answers[1] === 'B' && $answers[4] === 'D' ||
        $answers[1] === 'C' && $answers[4] === 'A' ||
        $answers[1] === 'D' && $answers[4] === 'B';

    // echo PHP_EOL . 'check_condition2($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition2(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
// check_condition2(['A', 'C', 'D', 'A', 'A', 'A', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查问题3的限制条件：第3、6、2、4题的答案，有1个与其它3个不同，且
 * 第3题的答案为A时，不同的答案为第3题，或者
 * 第3题的答案为B时，不同的答案为第6题，或者
 * 第3题的答案为C时，不同的答案为第2题，或者
 * 第3题的答案为D时，不同的答案为第4题。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合问题3的限制条件，返回true；否则返回false。
 */
function check_condition3($answers)
{
    $answer_involved = [
        $answers[2], // 第3题的答案
        $answers[5], // 第6题的答案
        $answers[1], // 第2题的答案
        $answers[3], // 第4题的答案
    ];

    $answer_count = [];
    foreach ($answer_involved as $a) {
        if (!array_key_exists($a, $answer_count)) {
            $answer_count[$a] = 1;
        } else {
            $answer_count[$a] = $answer_count[$a] + 1;
        }
    }
    $count_values = array_values($answer_count);

    $result = count($answer_count) === 2
        && min($count_values) === 1
        && max($count_values) === 3;

    // echo PHP_EOL . 'check_condition3($answers):'
    //     . PHP_EOL . '  $answer_involved = ' . print_r($answer_involved, true)
    //     . PHP_EOL . '  $answer_count = ' . print_r($answer_count, true)
    //     . PHP_EOL . '  $count_values = ' . print_r($count_values, true)
    //     . PHP_EOL . '  count($answer_count) = ' . count($answer_count)
    //     . PHP_EOL . '  min($count_values) = ' . min($count_values)
    //     . PHP_EOL . '  max($count_values) = ' . max($count_values)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    $result = $result && (
        $answers[2] === 'A' &&
            $answers[2] !== $answers[5] &&
            $answers[2] !== $answers[1] &&
            $answers[2] !== $answers[3]
        ||
        $answers[2] === 'B' &&
            $answers[5] !== $answers[2] &&
            $answers[5] !== $answers[1] &&
            $answers[5] !== $answers[3]
        ||
        $answers[2] === 'C' &&
            $answers[1] !== $answers[2] &&
            $answers[1] !== $answers[5] &&
            $answers[1] !== $answers[3]
        ||
        $answers[2] === 'D' &&
            $answers[3] !== $answers[2] &&
            $answers[3] !== $answers[5] &&
            $answers[3] !== $answers[1]
    );

    // echo PHP_EOL . 'check_condition3($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition3(['A', 'C', 'A', 'A', 'B', 'D', 'B', 'D', 'A', 'D']); // false
// check_condition3(['A', 'A', 'C', 'C', 'B', 'C', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查问题4的限制条件：第4题的答案为
 * A时，第1、5题答案相同，或者
 * B时，第2、7题答案相同，或者
 * C时，第1、9题答案相同，或者
 * D时，第6、10题答案相同。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合问题4的限制条件，返回true；否则返回false。
 */
function check_condition4($answers)
{
    $result = $answers[3] === 'A' && $answers[0] === $answers[4]
        || $answers[3] === 'B' && $answers[1] === $answers[6]
        || $answers[3] === 'C' && $answers[0] === $answers[8]
        || $answers[3] === 'D' && $answers[5] === $answers[9];

    // echo PHP_EOL . 'check_condition4($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition4(['A', 'C', 'A', 'A', 'B', 'C', 'B', 'D', 'D', 'D']); // false
// check_condition4(['A', 'C', 'A', 'C', 'B', 'A', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查问题5的限制条件：第5题的答案
 * 与第8题答案相同，或者
 * 与第4题答案相同，或者
 * 与第9题答案相同，或者
 * 与第7题答案相同。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合问题5的限制条件，返回true；否则返回false。
 */
function check_condition5($answers)
{
    $result = $answers[4] === $answers[7]
        || $answers[4] === $answers[3]
        || $answers[4] === $answers[8]
        || $answers[4] === $answers[6];

    // echo PHP_EOL . 'check_condition5($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition5(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
// check_condition5(['A', 'C', 'A', 'A', 'B', 'A', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查问题6的限制条件：第8题的答案
 * 与第2、4题答案相同，或者
 * 与第1、6题答案相同，或者
 * 与第3、10题答案相同，或者
 * 与第5、9题答案相同，
 * 并且只有一项成立。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合问题5的限制条件，返回true；否则返回false。
 */
function check_condition6($answers)
{
    $values = [
        $answers[7] === $answers[1] && $answers[7] === $answers[3] ? 'true' : 'false',
        $answers[7] === $answers[0] && $answers[7] === $answers[5] ? 'true' : 'false',
        $answers[7] === $answers[2] && $answers[7] === $answers[9] ? 'true' : 'false',
        $answers[7] === $answers[4] && $answers[7] === $answers[8] ? 'true' : 'false',
    ];

    $value_count = [];
    foreach ($values as $v) {
        if (!array_key_exists($v, $value_count)) {
            $value_count[$v] = 1;
        } else {
            $value_count[$v] = $value_count[$v] + 1;
        }
    }

    $result = $value_count['false'] === 3
        && $value_count['true'] === 1;

    // echo PHP_EOL . 'check_condition6($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $values = ' . print_r($values, true)
    //     . PHP_EOL . '  $value_count = ' . print_r($value_count, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition6(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
// check_condition6(['A', 'C', 'D', 'A', 'B', 'A', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**-----------------------------------------------------------------------------
 * 全局代码
 */

$answers = array_fill(0, 10, '');;
$available_answers = ['A', 'B', 'C', 'D'];
$all_answers = [];

for ($i0 = 0; $i0 < 4; $i0++) { // Q1
$answers[0] = $available_answers[$i0];

for ($i1 = 0; $i1 < 4; $i1++) { // Q2
$answers[1] = $available_answers[$i1];

for ($i2 = 0; $i2 < 4; $i2++) { // Q3
$answers[2] = $available_answers[$i2];

for ($i3 = 0; $i3 < 4; $i3++) { // Q4
$answers[3] = $available_answers[$i3];

for ($i4 = 0; $i4 < 4; $i4++) { // Q5
$answers[4] = $available_answers[$i4];

for ($i5 = 0; $i5 < 4; $i5++) { // Q6
$answers[5] = $available_answers[$i5];

for ($i6 = 0; $i6 < 4; $i6++) { // Q7
$answers[6] = $available_answers[$i6];

for ($i7 = 0; $i7 < 4; $i7++) { // Q8
$answers[7] = $available_answers[$i7];

for ($i8 = 0; $i8 < 4; $i8++) { // Q9
$answers[8] = $available_answers[$i8];

for ($i9 = 0; $i9 < 4; $i9++) { // Q10
$answers[9] = $available_answers[$i9];

    // echo 'in loop:'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true);

    if (check_answers($answers)) {
        $all_answers[] = $answers;
    }
    // break 9;
}}}}}}}}}}

echo '有' . count($all_answers) . '种答案';
// echo '$all_answers = ' . print_r($all_answers, true);
