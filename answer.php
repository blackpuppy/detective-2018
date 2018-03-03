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
    return check_condition2($answers)   // 第2题的限制条件
        && check_condition3($answers)   // 第3题的限制条件
        && check_condition4($answers)   // 第4题的限制条件
        && check_condition5($answers)   // 第5题的限制条件
        && check_condition6($answers)   // 第6题的限制条件
        && check_condition7($answers)   // 第7题的限制条件
        && check_condition8($answers)   // 第8题的限制条件
        && check_condition9($answers)   // 第9题的限制条件
        && check_condition10($answers); // 第10题的限制条件
}

/**
 * 检查第2题的限制条件：
 * 第2题的答案为A时，第5题答案为C，或者
 * 第2题的答案为B时，第5题答案为D，或者
 * 第2题的答案为C时，第5题答案为A，或者
 * 第2题的答案为D时，第5题答案为B。
 * 。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第2题的限制条件，返回true；否则返回false。
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
 * 检查第3题的限制条件：第3、6、2、4题的答案，有1个与其它3个不同，且
 * 第3题的答案为A时，不同的答案为第3题，或者
 * 第3题的答案为B时，不同的答案为第6题，或者
 * 第3题的答案为C时，不同的答案为第2题，或者
 * 第3题的答案为D时，不同的答案为第4题。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第3题的限制条件，返回true；否则返回false。
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
 * 检查第4题的限制条件：第4题的答案为
 * A时，第1、5题答案相同，或者
 * B时，第2、7题答案相同，或者
 * C时，第1、9题答案相同，或者
 * D时，第6、10题答案相同。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第4题的限制条件，返回true；否则返回false。
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
 * 检查第5题的限制条件：第5题的答案为
 * A时，与第8题答案相同，或者
 * B时，与第4题答案相同，或者
 * C时，与第9题答案相同，或者
 * D时，与第7题答案相同。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第5题的限制条件，返回true；否则返回false。
 */
function check_condition5($answers)
{
    $result = $answers[4] === 'A' && $answers[4] === $answers[7]
        || $answers[4] === 'B' && $answers[4] === $answers[3]
        || $answers[4] === 'C' && $answers[4] === $answers[8]
        || $answers[4] === 'D' && $answers[4] === $answers[6];

    // echo PHP_EOL . 'check_condition5($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition5(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
// check_condition5(['A', 'C', 'A', 'A', 'A', 'A', 'B', 'A', 'A', 'D']); // true
// exit(0);

/**
 * 检查第6题的限制条件：第6题的答案为
 * A时，第8题的答案与第2、4题答案相同，或者
 * B时，第8题的答案与第1、6题答案相同，或者
 * C时，第8题的答案与第3、10题答案相同，或者
 * D时，第8题的答案与第5、9题答案相同，
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第6题的限制条件，返回true；否则返回false。
 */
function check_condition6($answers)
{
    $result =
        $answers[5] === 'A' && $answers[7] === $answers[1] && $answers[7] === $answers[3] ||
        $answers[5] === 'B' && $answers[7] === $answers[0] && $answers[7] === $answers[5] ||
        $answers[5] === 'C' && $answers[7] === $answers[2] && $answers[7] === $answers[9] ||
        $answers[5] === 'D' && $answers[7] === $answers[4] && $answers[7] === $answers[8];

    // echo PHP_EOL . 'check_condition6($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition6(['A', 'C', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'D']); // false
// check_condition6(['A', 'C', 'D', 'A', 'B', 'C', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查第7题的限制条件：第7题的答案为
 * A时，在此10题的答案中，被选中次数最少的选项字母为A，或者
 * B时，在此10题的答案中，被选中次数最少的选项字母为B，或者
 * C时，在此10题的答案中，被选中次数最少的选项字母为C，或者
 * D时，在此10题的答案中，被选中次数最少的选项字母为D。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第7题的限制条件，返回true；否则返回false。
 */
function check_condition7($answers)
{
    $answer_count = [];
    foreach ($answers as $a) {
        if (!array_key_exists($a, $answer_count)) {
            $answer_count[$a] = 1;
        } else {
            $answer_count[$a] = $answer_count[$a] + 1;
        }
    }

    $min_count = min($answer_count);

    $result =
        $answers[6] === 'A' && $answer_count['A'] === $min_count ||
        $answers[6] === 'B' && $answer_count['B'] === $min_count ||
        $answers[6] === 'C' && $answer_count['C'] === $min_count ||
        $answers[6] === 'D' && $answer_count['D'] === $min_count;

    // echo PHP_EOL . 'check_condition7($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition7(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'D']); // false
// check_condition7(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'D']); // true
// exit(0);

/**
 * 检查第8题的限制条件：第8题的答案为
 * A时，第1题的答案与第7题的答案在字母中不相邻，或者
 * B时，第1题的答案与第5题的答案在字母中不相邻，或者
 * C时，第1题的答案与第2题的答案在字母中不相邻，或者
 * D时，第1题的答案与第10题的答案在字母中不相邻。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第8题的限制条件，返回true；否则返回false。
 */
function check_condition8($answers)
{
    $map = [];
    $map['A'] = 6;
    $map['B'] = 4;
    $map['C'] = 1;
    $map['D'] = 9;

    $other_question_index = $map[$answers[7]];
    $other_question_answer = $answers[$other_question_index];

    $ord8 = ord($answers[7]);
    $ord_other = ord($other_question_answer);

    $diff = abs($ord8 - $ord_other);

    $result = $diff > 1;

    // echo PHP_EOL . 'check_condition8($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $other_question_index = ' . $other_question_index
    //     . PHP_EOL . '  $other_question_answer = ' . $other_question_answer
    //     . PHP_EOL . '  $ord8 = ' . $ord8
    //     . PHP_EOL . '  $ord_other = ' . $ord_other
    //     . PHP_EOL . '  $diff = ' . $diff
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition8(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
// check_condition8(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true
// exit(0);

/**
 * 检查第9题的限制条件：第9题的答案为
 * A时，“第1题与第6题答案相同”与“第6题与第5题答案相同”的真假性相反，或者
 * B时，“第1题与第6题答案相同”与“第10题与第5题答案相同”的真假性相反，或者
 * C时，“第1题与第6题答案相同”与“第2题与第5题答案相同”的真假性相反，或者
 * D时，“第1题与第6题答案相同”与“第9题与第5题答案相同”的真假性相反。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第9题的限制条件，返回true；否则返回false。
 */
function check_condition9($answers)
{
    $map = [];
    $map['A'] = 5;
    $map['B'] = 9;
    $map['C'] = 1;
    $map['D'] = 8;

    $question_index = $map[$answers[8]];

    $bool1 = $answers[0] === $answers[5];
    $bool2 = $answers[$question_index] === $answers[4];

    $result = $bool1 !== $bool2;

    // echo PHP_EOL . 'check_condition9($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $question_index = ' . $question_index
    //     . PHP_EOL . '  $bool1 = ' . $bool1
    //     . PHP_EOL . '  $bool2 = ' . $bool2
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition9(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
// check_condition9(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true
// exit(0);

/**
 * 检查第10题的限制条件：第10题的答案为
 * A时，此10道题中4个字母出现次数最多与最少的差为3，或者
 * B时，此10道题中4个字母出现次数最多与最少的差为2，或者
 * C时，此10道题中4个字母出现次数最多与最少的差为4，或者
 * D时，此10道题中4个字母出现次数最多与最少的差为1。
 * @param  array $answers 所有问题的可能答案
 * @return bool           如果符合第10题的限制条件，返回true；否则返回false。
 */
function check_condition10($answers)
{
    $answer_count = [];
    foreach ($answers as $a) {
        if (!array_key_exists($a, $answer_count)) {
            $answer_count[$a] = 1;
        } else {
            $answer_count[$a] = $answer_count[$a] + 1;
        }
    }

    $min_count = min($answer_count);
    $max_count = max($answer_count);
    if ($min_count === $max_count) {
        $min_count = 0;
    }

    $map = [];
    $map['A'] = 3;
    $map['B'] = 2;
    $map['C'] = 4;
    $map['D'] = 1;

    $expected = $map[$answers[9]];

    $result = $max_count - $min_count === $expected;

    // echo PHP_EOL . 'check_condition10($answers):'
    //     . PHP_EOL . '  $answers = ' . print_r($answers, true)
    //     . PHP_EOL . '  $min_count = ' . $min_count
    //     . PHP_EOL . '  $max_count = ' . $max_count
    //     . PHP_EOL . '  $expected = ' . $expected
    //     . PHP_EOL . '  $result = ' . $result
    //     . PHP_EOL . str_repeat('-', 80);

    return $result;
}

// check_condition10(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
// check_condition10(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true
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

echo '有' . count($all_answers) . '种答案'
    . PHP_EOL . '$all_answers = ' . print_r($all_answers, true);
