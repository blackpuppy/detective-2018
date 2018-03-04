/*
在命令行运行:
$ node answer.js

所有答案可能性:     1,048,576
经过第2题的限制条件:   262,144
 */

findAnswers();

function findAnswers() {
    /**-------------------------------------------------------------------------
     * 单元测试
     */
    // checkCondition2(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
    // checkCondition2(['A', 'C', 'D', 'A', 'A', 'A', 'B', 'D', 'A', 'D']); // true

    // return;

    /**-------------------------------------------------------------------------
     * 程序代码
     */
    console.log('findAnswers():');

    var allAnswers = [],
        answers = new Array(10),
        availableAnswers = ['A', 'B', 'C', 'D'];

    // console.log('  availableAnswers = ', availableAnswers);

    for (i0 = 0; i0 < 4; i0++) { // Q1
    answers[0] = availableAnswers[i0];

    for (i1 = 0; i1 < 4; i1++) { // Q2
    answers[1] = availableAnswers[i1];

    for (i2 = 0; i2 < 4; i2++) { // Q3
    answers[2] = availableAnswers[i2];

    for (i3 = 0; i3 < 4; i3++) { // Q4
    answers[3] = availableAnswers[i3];

    for (i4 = 0; i4 < 4; i4++) { // Q5
    answers[4] = availableAnswers[i4];

    for (i5 = 0; i5 < 4; i5++) { // Q6
    answers[5] = availableAnswers[i5];

    for (i6 = 0; i6 < 4; i6++) { // Q7
    answers[6] = availableAnswers[i6];

    for (i7 = 0; i7 < 4; i7++) { // Q8
    answers[7] = availableAnswers[i7];

    for (i8 = 0; i8 < 4; i8++) { // Q9
    answers[8] = availableAnswers[i8];

    for (i9 = 0; i9 < 4; i9++) { // Q10
    answers[9] = availableAnswers[i9];

        // console.log('in loop:');
        // console.log('  answers = ', answers);

        if (checkAnswers(answers)) {
            allAnswers.push(answers);
        }
        // break 9;
    }}}}}}}}}}

    console.log('有' + allAnswers.length + '种答案');
    // for (var i = 0; i < allAnswers.length; i++) {
    //     var answer = allAnswers[i];
    //     for (var j = 0; j < answer.length; j++) {
    //         var a = answer[j];
    //         console.log((j + 1) + ". a");
    //     }
    // }

    // console.log('  answers = ', answers);
}

/**
 * 检查答案是否符合所有问题的限制条件。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合所有条件，返回true；否则返回false。
 */
function checkAnswers(answers)
{
    return checkCondition2(answers);  // 第2题的限制条件
        && checkCondition3(answers)   // 第3题的限制条件
        // && checkCondition4(answers)   // 第4题的限制条件
        // && checkCondition5(answers)   // 第5题的限制条件
        // && checkCondition6(answers)   // 第6题的限制条件
        // && checkCondition7(answers)   // 第7题的限制条件
        // && checkCondition8(answers)   // 第8题的限制条件
        // && checkCondition9(answers)   // 第9题的限制条件
        // && checkCondition10(answers); // 第10题的限制条件
}

/**
 * 检查第2题的限制条件：
 * 第2题的答案为A时，第5题答案为C，或者
 * 第2题的答案为B时，第5题答案为D，或者
 * 第2题的答案为C时，第5题答案为A，或者
 * 第2题的答案为D时，第5题答案为B。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第2题的限制条件，返回true；否则返回false。
 */
function checkCondition2($answers)
{
    $result =
        $answers[1] === 'A' && $answers[4] === 'C' ||
        $answers[1] === 'B' && $answers[4] === 'D' ||
        $answers[1] === 'C' && $answers[4] === 'A' ||
        $answers[1] === 'D' && $answers[4] === 'B';

    // console.log('checkCondition2($answers):');
    // console.log('  $answers = ', $answers);
    // console.log('  $result = ', $result);
    // console.log(new Array(80).fill('-').join(''));

    return $result;
}
