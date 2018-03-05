/*
在命令行运行:
$ dotnet run

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
- [Getting started with .NET Core on macOS](https://docs.microsoft.com/en-us/dotnet/core/tutorials/using-on-macos)
- [Get started with .NET in 10 minutes](https://www.microsoft.com/net/learn/get-started/macos)
- [Get started with .NET in 10 minutes](https://www.microsoft.com/net/learn/get-started/linux/centos)
- [C# Array.ForEach](https://www.dotnetperls.com/array-foreach)
- [Encoding.GetBytes Method (String)](https://msdn.microsoft.com/en-us/library/ds4kkd55(v=vs.110).aspx)
 */

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ZhuMing.Detective2018
{
    class Program
    {
        static void Main(string[] args)
        {
            findAnswers();
        }

        static void findAnswers() {
            /**-------------------------------------------------------------------------
            * 单元测试
            */
            // checkCondition2(new string[]{"A", "C", "A", "A", "B", "C", "A", "D", "C", "D"}); // false
            // checkCondition2(new string[]{"A", "C", "D", "A", "A", "A", "B", "D", "A", "D"}); // true

            // checkCondition3(new string[]{"A", "C", "A", "A", "B", "D", "B", "D", "A", "D"}); // false
            // checkCondition3(new string[]{"A", "A", "C", "C", "B", "C", "B", "D", "A", "D"}); // true

            // checkCondition4(new string[]{"A", "C", "A", "A", "B", "C", "B", "D", "D", "D"}); // false
            // checkCondition4(new string[]{"A", "C", "A", "C", "B", "A", "B", "D", "A", "D"}); // true

            // checkCondition5(new string[]{"A", "C", "A", "A", "B", "C", "A", "D", "C", "D"}); // false
            // checkCondition5(new string[]{"A", "C", "A", "A", "A", "A", "B", "A", "A", "D"}); // true

            // checkCondition6(new string[]{"A", "C", "A", "A", "B", "B", "A", "D", "C", "D"}); // false
            // checkCondition6(new string[]{"A", "C", "D", "A", "B", "C", "B", "D", "A", "D"}); // true

            // checkCondition7(new string[]{"A", "C", "A", "D", "B", "B", "A", "D", "C", "D"}); // false
            // checkCondition7(new string[]{"A", "C", "D", "A", "C", "C", "B", "D", "A", "D"}); // true

            // checkCondition8(new string[]{"A", "C", "A", "D", "B", "B", "A", "D", "C", "C"}); // false
            // checkCondition8(new string[]{"A", "C", "D", "A", "C", "C", "B", "D", "A", "A"}); // true

            // checkCondition9(new string[]{"A", "C", "A", "D", "B", "B", "A", "D", "C", "C"}); // false
            // checkCondition9(new string[]{"A", "C", "D", "A", "C", "C", "B", "D", "A", "A"}); // true

            // checkCondition10(new string[]{"A", "C", "A", "D", "B", "B", "A", "D", "C", "C"}); // false
            // checkCondition10(new string[]{"A", "C", "D", "A", "C", "C", "B", "D", "A", "A"}); // true

            // return;

            /**-------------------------------------------------------------------------
            * 程序代码
            */
            Console.WriteLine("findAnswers():");

            var allAnswers = new List<string[]>();
            var answers = new string[10];
            var availableAnswers = new string[] { "A", "B", "C", "D" };

            // Console.WriteLine("  availableAnswers = ", availableAnswers);

            for (var i0 = 0; i0 < 4; i0++) { // Q1
            answers[0] = availableAnswers[i0];

            for (var i1 = 0; i1 < 4; i1++) { // Q2
            answers[1] = availableAnswers[i1];

            for (var i2 = 0; i2 < 4; i2++) { // Q3
            answers[2] = availableAnswers[i2];

            for (var i3 = 0; i3 < 4; i3++) { // Q4
            answers[3] = availableAnswers[i3];

            for (var i4 = 0; i4 < 4; i4++) { // Q5
            answers[4] = availableAnswers[i4];

            for (var i5 = 0; i5 < 4; i5++) { // Q6
            answers[5] = availableAnswers[i5];

            for (var i6 = 0; i6 < 4; i6++) { // Q7
            answers[6] = availableAnswers[i6];

            for (var i7 = 0; i7 < 4; i7++) { // Q8
            answers[7] = availableAnswers[i7];

            for (var i8 = 0; i8 < 4; i8++) { // Q9
            answers[8] = availableAnswers[i8];

            for (var i9 = 0; i9 < 4; i9++) { // Q10
            answers[9] = availableAnswers[i9];

                if (checkAnswers(answers)) {
                    allAnswers.Add(answers);
                }
            }}}}}}}}}}

            Console.WriteLine("有" + allAnswers.Count + "种答案");
            // for (var i = 0; i < allAnswers.length; i++) {
            //     var answer = allAnswers[i];
            //     for (var j = 0; j < answer.length; j++) {
            //         var a = answer[j];
            //         Console.WriteLine((j + 1) + ". " + a);
            //     }
            // }
        }

        static bool checkAnswers(string[] answers)
        {
            return checkCondition2(answers)   // 第2题的限制条件
                && checkCondition3(answers)   // 第3题的限制条件
                && checkCondition4(answers)   // 第4题的限制条件
                && checkCondition5(answers)   // 第5题的限制条件
                && checkCondition6(answers)   // 第6题的限制条件
                && checkCondition7(answers)   // 第7题的限制条件
                && checkCondition8(answers)   // 第8题的限制条件
                && checkCondition9(answers);  // 第9题的限制条件
            //     && checkCondition10(answers); // 第10题的限制条件
        }

        /**
        * 检查第2题的限制条件：
        * 第2题的答案为A时，第5题答案为C，或者
        * 第2题的答案为B时，第5题答案为D，或者
        * 第2题的答案为C时，第5题答案为A，或者
        * 第2题的答案为D时，第5题答案为B。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第2题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition2(string[] answers)
        {
            var result =
                answers[1] == "A" && answers[4] == "C" ||
                answers[1] == "B" && answers[4] == "D" ||
                answers[1] == "C" && answers[4] == "A" ||
                answers[1] == "D" && answers[4] == "B";

            // Console.WriteLine("checkCondition2(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  answers[1] = {0}", answers[1]);
            // Console.WriteLine("  answers[4] = {0}", answers[4]);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第3题的限制条件：第3、6、2、4题的答案，有1个与其它3个不同，且
        * 第3题的答案为A时，不同的答案为第3题，或者
        * 第3题的答案为B时，不同的答案为第6题，或者
        * 第3题的答案为C时，不同的答案为第2题，或者
        * 第3题的答案为D时，不同的答案为第4题。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第3题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition3(string[] answers)
        {
            var answerCount = new Dictionary<string, int>();
            var answerInvolved = new String[] {
                    answers[2], // 第3题的答案
                    answers[5], // 第6题的答案
                    answers[1], // 第2题的答案
                    answers[3], // 第4题的答案
                };

            Array.ForEach(answerInvolved, a => {
                if (answerCount.ContainsKey(a)) {
                    answerCount[a] = answerCount[a] + 1;
                } else {
                    answerCount[a] = 1;
                }
            });

            var countValues = answerCount.Values;

            var min = countValues.Min();
            var max = countValues.Max();

            var result = countValues.Count == 2 &&
                min == 1 &&
                max == 3 &&
                (
                    answers[2] == "A" &&
                        answers[2] != answers[5] &&
                        answers[2] != answers[1] &&
                        answers[2] != answers[3]
                    ||
                    answers[2] == "B" &&
                        answers[5] != answers[2] &&
                        answers[5] != answers[1] &&
                        answers[5] != answers[3]
                    ||
                    answers[2] == "C" &&
                        answers[1] != answers[2] &&
                        answers[1] != answers[5] &&
                        answers[1] != answers[3]
                    ||
                    answers[2] == "D" &&
                        answers[3] != answers[2] &&
                        answers[3] != answers[5] &&
                        answers[3] != answers[1]
                );

            // Console.WriteLine("checkCondition3(answers):");
            // Console.WriteLine("  answers = [{0}]", String.Join(", ", answers));
            // Console.WriteLine("  answerInvolved = [{0}]", String.Join(", ", answerInvolved));
            // // Console.WriteLine("  answerCount = {0}", answerCount);
            // // Console.WriteLine("  countValues = {0}", countValues);
            // Console.WriteLine("  countValues.Count = {0}", countValues.Count);
            // Console.WriteLine("  min = {0}", min);
            // Console.WriteLine("  max = {0}", max);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第4题的限制条件：第4题的答案为
        * A时，第1、5题答案相同，或者
        * B时，第2、7题答案相同，或者
        * C时，第1、9题答案相同，或者
        * D时，第6、10题答案相同。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第4题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition4(string[] answers)
        {
            var result = answers[3] == "A" && answers[0] == answers[4]
                || answers[3] == "B" && answers[1] == answers[6]
                || answers[3] == "C" && answers[0] == answers[8]
                || answers[3] == "D" && answers[5] == answers[9];

            // Console.WriteLine("checkCondition4(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第5题的限制条件：第5题的答案为
        * A时，与第8题答案相同，或者
        * B时，与第4题答案相同，或者
        * C时，与第9题答案相同，或者
        * D时，与第7题答案相同。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第5题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition5(string[] answers)
        {
            var result = answers[4] == "A" && answers[4] == answers[7]
                || answers[4] == "B" && answers[4] == answers[3]
                || answers[4] == "C" && answers[4] == answers[8]
                || answers[4] == "D" && answers[4] == answers[6];

            // Console.WriteLine("checkCondition5(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

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
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第6题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition6(string[] answers)
        {
            var answerCount = new Dictionary<string, int>();
            var checks = new string[] {
                    answers[5] == "A" && answers[7] == answers[1] && answers[7] == answers[3] ? "true" : "false",
                    answers[5] == "B" && answers[7] == answers[0] && answers[7] == answers[5] ? "true" : "false",
                    answers[5] == "C" && answers[7] == answers[2] && answers[7] == answers[9] ? "true" : "false",
                    answers[5] == "D" && answers[7] == answers[4] && answers[7] == answers[8] ? "true" : "false",
                };

            Array.ForEach(checks, c => {
                if (answerCount.ContainsKey(c)) {
                    answerCount[c] = answerCount[c] + 1;
                } else {
                    answerCount[c] = 1;
                }
            });

            var result = answerCount["false"] == 3
                && answerCount["true"] == 1;

            // Console.WriteLine("checkCondition6(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  answerCount = {0}", answerCount);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第7题的限制条件：第7题的答案为
        * A时，在此10题的答案中，被选中次数最少的选项字母为A，或者
        * B时，在此10题的答案中，被选中次数最少的选项字母为B，或者
        * C时，在此10题的答案中，被选中次数最少的选项字母为C，或者
        * D时，在此10题的答案中，被选中次数最少的选项字母为D。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第7题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition7(string[] answers)
        {
            var answerCount = new Dictionary<string, int>();
            Array.ForEach(answers, a => {
                if (answerCount.ContainsKey(a)) {
                    answerCount[a] = answerCount[a] + 1;
                } else {
                    answerCount[a] = 1;
                }
            });

            var countValues = answerCount.Values;
            var minCount = countValues.Min();

            var result =
                answers[6] == "A" && answerCount["A"] == minCount ||
                answers[6] == "B" && answerCount["B"] == minCount ||
                answers[6] == "C" && answerCount["C"] == minCount ||
                answers[6] == "D" && answerCount["D"] == minCount;

            // Console.WriteLine("checkCondition7(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  minCount = {0}", minCount);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第8题的限制条件：第8题的答案为
        * A时，第1题的答案与第7题的答案在字母中不相邻，或者
        * B时，第1题的答案与第5题的答案在字母中不相邻，或者
        * C时，第1题的答案与第2题的答案在字母中不相邻，或者
        * D时，第1题的答案与第10题的答案在字母中不相邻。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第8题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition8(string[] answers)
        {
            var map = new Dictionary<string, int>() {
                    { "A", 6 },
                    { "B", 4 },
                    { "C", 1 },
                    { "D", 9 }
                };
            var otherQuestionIndex = map[answers[7]];
            var otherQuestionAnswer = answers[otherQuestionIndex];

            Encoding u7 = Encoding.UTF7;
            var ord8 = u7.GetBytes(answers[7]);
            var ordOther = u7.GetBytes(otherQuestionAnswer);

            var diff = Math.Abs(ord8[0] - ordOther[0]);

            var result = diff > 1;

            // Console.WriteLine("checkCondition8(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  otherQuestionIndex = {0}", otherQuestionIndex);
            // Console.WriteLine("  otherQuestionAnswer = {0}", otherQuestionAnswer);
            // Console.WriteLine("  ord8 = {0}", ord8[0]);
            // Console.WriteLine("  ordOther = {0}", ordOther[0]);
            // Console.WriteLine("  diff = {0}", diff);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第9题的限制条件：第9题的答案为
        * A时，“第1题与第6题答案相同”与“第6题与第5题答案相同”的真假性相反，或者
        * B时，“第1题与第6题答案相同”与“第10题与第5题答案相同”的真假性相反，或者
        * C时，“第1题与第6题答案相同”与“第2题与第5题答案相同”的真假性相反，或者
        * D时，“第1题与第6题答案相同”与“第9题与第5题答案相同”的真假性相反。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第9题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition9(string[] answers)
        {
            var map = new Dictionary<string, int>() {
                    { "A", 5 },
                    { "B", 9 },
                    { "C", 1 },
                    { "D", 8 }
                };
            var questionIndex = map[answers[8]];
            var bool1 = answers[0] == answers[5];
            var bool2 = answers[questionIndex] == answers[4];
            var result = bool1 != bool2;

            // Console.WriteLine("checkCondition9(answers):");
            // Console.WriteLine("  answers = {0}", String.Join(", ", answers));
            // Console.WriteLine("  questionIndex = {0}", questionIndex);
            // Console.WriteLine("  bool1 = {0}", bool1);
            // Console.WriteLine("  bool2 = {0}", bool2);
            // Console.WriteLine("  result = {0}", result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }

        /**
        * 检查第10题的限制条件：第10题的答案为
        * A时，此10道题中4个字母出现次数最多与最少的差为3，或者
        * B时，此10道题中4个字母出现次数最多与最少的差为2，或者
        * C时，此10道题中4个字母出现次数最多与最少的差为4，或者
        * D时，此10道题中4个字母出现次数最多与最少的差为1。
        *
        * @param string[] answers - 所有问题的可能答案
        *
        * @returns bool 如果符合第10题的限制条件，返回true；否则返回false。
        */
        static bool checkCondition10(string[] answers)
        {
            var answerCount = new Dictionary<string, int>();

            Array.ForEach(answers, a => {
                if (answerCount.ContainsKey(a)) {
                    answerCount[a] = answerCount[a] + 1;
                } else {
                    answerCount[a] = 1;
                }
            });

            var countValues = answerCount.Values;

            var minCount = countValues.Min();
            var maxCount = countValues.Max();
            if (minCount == maxCount) {
                minCount = 0;
            }

            var map = new Dictionary<string, int>() {
                    { "A", 3},
                    { "B", 2},
                    { "C", 4},
                    { "D", 1}
                };
            var expected = map[answers[9]];
            var result = maxCount - minCount == expected;

            // Console.WriteLine('checkCondition10(answers):');
            // Console.WriteLine('  answers = {0}', String.Join(", ", answers));
            // Console.WriteLine('  minCount = {0}', minCount);
            // Console.WriteLine('  maxCount = {0}', maxCount);
            // Console.WriteLine('  expected = {0}', expected);
            // Console.WriteLine('  result = {0}', result);
            // Console.WriteLine(new String('-', 80));

            return result;
        }
    }
}
