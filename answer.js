/*
在命令行运行:
$ node answer.js

所有答案可能性:     1,048,576
经过第2题的限制条件:   262,144
经过第3题的限制条件:    12,288
经过第4题的限制条件:     3,072
经过第5题的限制条件:       448
经过第6题的限制条件:        40
经过第7题的限制条件:        17
经过第8题的限制条件:         8
经过第9题的限制条件:         5
经过第10题的限制条件:        1

参考:
- http://2ality.com/2013/11/initializing-arrays.html
 */

findAnswers();

function findAnswers() {
    /**-------------------------------------------------------------------------
     * 单元测试
     */
    // checkCondition2(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
    // checkCondition2(['A', 'C', 'D', 'A', 'A', 'A', 'B', 'D', 'A', 'D']); // true

    // checkCondition3(['A', 'C', 'A', 'A', 'B', 'D', 'B', 'D', 'A', 'D']); // false
    // checkCondition3(['A', 'A', 'C', 'C', 'B', 'C', 'B', 'D', 'A', 'D']); // true

    // checkCondition4(['A', 'C', 'A', 'A', 'B', 'C', 'B', 'D', 'D', 'D']); // false
    // checkCondition4(['A', 'C', 'A', 'C', 'B', 'A', 'B', 'D', 'A', 'D']); // true

    // checkCondition5(['A', 'C', 'A', 'A', 'B', 'C', 'A', 'D', 'C', 'D']); // false
    // checkCondition5(['A', 'C', 'A', 'A', 'A', 'A', 'B', 'A', 'A', 'D']); // true

    // checkCondition6(['A', 'C', 'A', 'A', 'B', 'B', 'A', 'D', 'C', 'D']); // false
    // checkCondition6(['A', 'C', 'D', 'A', 'B', 'C', 'B', 'D', 'A', 'D']); // true

    // checkCondition7(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'D']); // false
    // checkCondition7(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'D']); // true

    // checkCondition8(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
    // checkCondition8(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true

    // checkCondition9(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
    // checkCondition9(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true

    // checkCondition10(['A', 'C', 'A', 'D', 'B', 'B', 'A', 'D', 'C', 'C']); // false
    // checkCondition10(['A', 'C', 'D', 'A', 'C', 'C', 'B', 'D', 'A', 'A']); // true

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

        if (checkAnswers(answers)) {
            allAnswers.push(answers.slice(0));
        }
    }}}}}}}}}}

    console.log('有' + allAnswers.length + '种答案');
    for (var i = 0; i < allAnswers.length; i++) {
        var answer = allAnswers[i];
        for (var j = 0; j < answer.length; j++) {
            var a = answer[j];
            console.log((j + 1) + '. ' + a);
        }
    }
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
    return checkCondition2(answers)   // 第2题的限制条件
        && checkCondition3(answers)   // 第3题的限制条件
        && checkCondition4(answers)   // 第4题的限制条件
        && checkCondition5(answers)   // 第5题的限制条件
        && checkCondition6(answers)   // 第6题的限制条件
        && checkCondition7(answers)   // 第7题的限制条件
        && checkCondition8(answers)   // 第8题的限制条件
        && checkCondition9(answers)   // 第9题的限制条件
        && checkCondition10(answers); // 第10题的限制条件
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
function checkCondition2(answers)
{
    result =
        answers[1] === 'A' && answers[4] === 'C' ||
        answers[1] === 'B' && answers[4] === 'D' ||
        answers[1] === 'C' && answers[4] === 'A' ||
        answers[1] === 'D' && answers[4] === 'B';

    // console.log('checkCondition2(answers):');
    // console.log('  answers = ', answers);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第3题的限制条件：第3、6、2、4题的答案，有1个与其它3个不同，且
 * 第3题的答案为A时，不同的答案为第3题，或者
 * 第3题的答案为B时，不同的答案为第6题，或者
 * 第3题的答案为C时，不同的答案为第2题，或者
 * 第3题的答案为D时，不同的答案为第4题。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第3题的限制条件，返回true；否则返回false。
 */
function checkCondition3(answers)
{
    var answerCount = [],
        answerInvolved = [
            answers[2], // 第3题的答案
            answers[5], // 第6题的答案
            answers[1], // 第2题的答案
            answers[3], // 第4题的答案
        ];

    answerInvolved.map(function (a) {
        if (a in answerCount) {
            answerCount[a] = answerCount[a] + 1;
        } else {
            answerCount[a] = 1;
        }
    });

    var countValues = [];
    for (var key in answerCount) {
        if (answerCount.hasOwnProperty(key)) {
            countValues.push(answerCount[key]);
        }
    }

    var min = Math.min(...countValues),
        max = Math.max(...countValues);

    var result = countValues.length === 2 &&
        min === 1 &&
        max === 3 &&
        (
            answers[2] === 'A' &&
                answers[2] !== answers[5] &&
                answers[2] !== answers[1] &&
                answers[2] !== answers[3]
            ||
            answers[2] === 'B' &&
                answers[5] !== answers[2] &&
                answers[5] !== answers[1] &&
                answers[5] !== answers[3]
            ||
            answers[2] === 'C' &&
                answers[1] !== answers[2] &&
                answers[1] !== answers[5] &&
                answers[1] !== answers[3]
            ||
            answers[2] === 'D' &&
                answers[3] !== answers[2] &&
                answers[3] !== answers[5] &&
                answers[3] !== answers[1]
        );

    // console.log('checkCondition3(answers):');
    // console.log('  answers = ', answers);
    // console.log('  answerInvolved = ', answerInvolved);
    // console.log('  answerCount = ', answerCount);
    // console.log('  countValues = ', countValues);
    // console.log('  countValues.length = ', countValues.length);
    // console.log('  min = ', min);
    // console.log('  max = ', max);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第4题的限制条件：第4题的答案为
 * A时，第1、5题答案相同，或者
 * B时，第2、7题答案相同，或者
 * C时，第1、9题答案相同，或者
 * D时，第6、10题答案相同。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第4题的限制条件，返回true；否则返回false。
 */
function checkCondition4(answers)
{
    var result = answers[3] === 'A' && answers[0] === answers[4]
        || answers[3] === 'B' && answers[1] === answers[6]
        || answers[3] === 'C' && answers[0] === answers[8]
        || answers[3] === 'D' && answers[5] === answers[9];

    // console.log('checkCondition4(answers):');
    // console.log('  answers = ', answers);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第5题的限制条件：第5题的答案为
 * A时，与第8题答案相同，或者
 * B时，与第4题答案相同，或者
 * C时，与第9题答案相同，或者
 * D时，与第7题答案相同。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第5题的限制条件，返回true；否则返回false。
 */
function checkCondition5(answers)
{
    result = answers[4] === 'A' && answers[4] === answers[7]
        || answers[4] === 'B' && answers[4] === answers[3]
        || answers[4] === 'C' && answers[4] === answers[8]
        || answers[4] === 'D' && answers[4] === answers[6];

    // console.log('checkCondition5(answers):');
    // console.log('  answers = ', answers);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第6题的限制条件：第6题的答案为
 * A时，第8题的答案与第2、4题答案相同，或者
 * B时，第8题的答案与第1、6题答案相同，或者
 * C时，第8题的答案与第3、10题答案相同，或者
 * D时，第8题的答案与第5、9题答案相同，
 * 并且只有一种成立。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第6题的限制条件，返回true；否则返回false。
 */
function checkCondition6(answers)
{
    var answerCount = [],
        checks = [
            answers[5] === 'A' && answers[7] === answers[1] && answers[7] === answers[3] ? 'true' : 'false',
            answers[5] === 'B' && answers[7] === answers[0] && answers[7] === answers[5] ? 'true' : 'false',
            answers[5] === 'C' && answers[7] === answers[2] && answers[7] === answers[9] ? 'true' : 'false',
            answers[5] === 'D' && answers[7] === answers[4] && answers[7] === answers[8] ? 'true' : 'false',
        ];

    checks.map(function (c) {
        if (c in answerCount) {
            answerCount[c] = answerCount[c] + 1;
        } else {
            answerCount[c] = 1;
        }
    });

    result = answerCount['false'] === 3
        && answerCount['true'] === 1;

    // console.log('checkCondition6(answers):');
    // console.log('  answers = ', answers);
    // console.log('  answerCount = ', answerCount);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第7题的限制条件：第7题的答案为
 * A时，在此10题的答案中，被选中次数最少的选项字母为A，或者
 * B时，在此10题的答案中，被选中次数最少的选项字母为B，或者
 * C时，在此10题的答案中，被选中次数最少的选项字母为C，或者
 * D时，在此10题的答案中，被选中次数最少的选项字母为D。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第7题的限制条件，返回true；否则返回false。
 */
function checkCondition7(answers)
{
    var answerCount = [];
    answers.map(function (a) {
        if (a in answerCount) {
            answerCount[a] = answerCount[a] + 1;
        } else {
            answerCount[a] = 1;
        }
    });

    var countValues = [];
    for (var key in answerCount) {
        if (answerCount.hasOwnProperty(key)) {
            countValues.push(answerCount[key]);
        }
    }

    var minCount = Math.min(...countValues);

    result =
        answers[6] === 'A' && answerCount['A'] === minCount ||
        answers[6] === 'B' && answerCount['B'] === minCount ||
        answers[6] === 'C' && answerCount['C'] === minCount ||
        answers[6] === 'D' && answerCount['D'] === minCount;

    // console.log('checkCondition7(answers):');
    // console.log('  answers = ', answers);
    // console.log('  minCount = ', minCount);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第8题的限制条件：第8题的答案为
 * A时，第1题的答案与第7题的答案在字母中不相邻，或者
 * B时，第1题的答案与第5题的答案在字母中不相邻，或者
 * C时，第1题的答案与第2题的答案在字母中不相邻，或者
 * D时，第1题的答案与第10题的答案在字母中不相邻。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第8题的限制条件，返回true；否则返回false。
 */
function checkCondition8(answers)
{
    var map = {
            'A': 6,
            'B': 4,
            'C': 1,
            'D': 9,
        },
        otherQuestionIndex = map[answers[7]],
        otherQuestionAnswer = answers[otherQuestionIndex];

    ord8 = answers[7].charCodeAt(0);
    ordOther = otherQuestionAnswer.charCodeAt(0);

    diff = Math.abs(ord8 - ordOther);

    result = diff > 1;

    // console.log('checkCondition8(answers):');
    // console.log('  answers = ', answers);
    // console.log('  otherQuestionIndex = ', otherQuestionIndex);
    // console.log('  otherQuestionAnswer = ', otherQuestionAnswer);
    // console.log('  ord8 = ', ord8);
    // console.log('  ordOther = ', ordOther);
    // console.log('  diff = ', diff);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第9题的限制条件：第9题的答案为
 * A时，“第1题与第6题答案相同”与“第6题与第5题答案相同”的真假性相反，或者
 * B时，“第1题与第6题答案相同”与“第10题与第5题答案相同”的真假性相反，或者
 * C时，“第1题与第6题答案相同”与“第2题与第5题答案相同”的真假性相反，或者
 * D时，“第1题与第6题答案相同”与“第9题与第5题答案相同”的真假性相反。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第9题的限制条件，返回true；否则返回false。
 */
function checkCondition9(answers)
{
    var map = {
            'A': 5,
            'B': 9,
            'C': 1,
            'D': 8,
        },
        questionIndex = map[answers[8]],
        bool1 = answers[0] === answers[5],
        bool2 = answers[questionIndex] === answers[4],
        result = bool1 !== bool2;

    // console.log('checkCondition9(answers):');
    // console.log('  answers = ', answers);
    // console.log('  questionIndex = ', questionIndex);
    // console.log('  bool1 = ', bool1);
    // console.log('  bool2 = ', bool2);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}

/**
 * 检查第10题的限制条件：第10题的答案为
 * A时，此10道题中4个字母出现次数最多与最少的差为3，或者
 * B时，此10道题中4个字母出现次数最多与最少的差为2，或者
 * C时，此10道题中4个字母出现次数最多与最少的差为4，或者
 * D时，此10道题中4个字母出现次数最多与最少的差为1。
 *
 * @param  {Object} answers - 所有问题的可能答案
 *
 * @returns {Boolean} 如果符合第10题的限制条件，返回true；否则返回false。
 */
function checkCondition10(answers)
{
    var answerCount = [],
        countValues = [];

    answers.map(function (a) {
        if (a in answerCount) {
            answerCount[a] = answerCount[a] + 1;
        } else {
            answerCount[a] = 1;
        }
    });

    for (var key in answerCount) {
        if (answerCount.hasOwnProperty(key)) {
            countValues.push(answerCount[key]);
        }
    }

    var minCount = Math.min(...countValues);
        maxCount = Math.max(...countValues);
    if (minCount === maxCount) {
        minCount = 0;
    }

    var map = {
            'A': 3,
            'B': 2,
            'C': 4,
            'D': 1,
        },
        expected = map[answers[9]],
        result = maxCount - minCount === expected;

    // console.log('checkCondition10(answers):');
    // console.log('  answers = ', answers);
    // console.log('  minCount = ', minCount);
    // console.log('  maxCount = ', maxCount);
    // console.log('  expected = ', expected);
    // console.log('  result = ', result);
    // console.log(new Array(80).fill('-').join(''));

    return result;
}
