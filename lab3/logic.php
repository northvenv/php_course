<?php
function parseAndSolve($equation) {
    if (preg_match('/^\s*([Xx]|\d+)\s*([\+\-\*\/])\s*([Xx]|\d+)\s*=\s*(\d+)\s*$/', $equation, $matches)) {
        $op1 = $matches[1];
        $operator = $matches[2];
        $op2 = $matches[3];
        $res = (float)$matches[4];

        if (strtolower($op1) === 'x') {
            $a = (float)$op2;
            switch ($operator) {
                case '+': return $res - $a;
                case '-': return $res + $a;
                case '*': return $res / $a;
                case '/': return $res * $a;
            }
        } else {
            $a = (float)$op1;
            switch ($operator) {
                case '+': return $res - $a;
                case '-': return $a - $res;
                case '*': return $res / $a;
                case '/': return $a / $res;
            }
        }
    }
    return null;
}

function getAllEquations() {
    $equations = [
        "X + 3 = 7",
        "27 - X = 17",
        "6 / X = 2",
        "X / 8 = 6",
        "22 * X = 220",
        "X * 7 = 49",
        "10 + X = 33",
        "X + 67 = 129",
        "4 * X = 36",
        "X * 9 = 56"
    ];

    $results = [];
    foreach ($equations as $eq) {
        $results[] = [
            "equation" => $eq,
            "answer" => parseAndSolve($eq)
        ];
    }
    return $results;
}
?>
