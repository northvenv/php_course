<?php
function evaluateExpression($expr) {
    $expr = str_replace(' ', '', $expr);
    $expr = str_ireplace('pi', M_PI, $expr);
    $expr = str_replace('e', M_E, $expr);
    if ($expr === '') return 0;

    while (preg_match('/\(([^()]+)\)/', $expr, $matches)) {
        $res = evaluateExpression($matches[1]);
        $expr = str_replace($matches[0], $res, $expr);
    }

    while (preg_match('/sqrt\(([^()]+)\)/', $expr, $matches)) {
        $res = sqrt(evaluateExpression($matches[1]));
        $expr = str_replace($matches[0], $res, $expr);
    }
    while (preg_match('/log\(([^()]+)\)/', $expr, $matches)) {
        $val = evaluateExpression($matches[1]);
        $res = ($val > 0) ? log($val) : "Ошибка";
        if ($res === "Ошибка") return "Ошибка (log <= 0)";
        $expr = str_replace($matches[0], $res, $expr);
    }

    $precedence = [
        ['+', '-'],
        ['*', '/'],
        ['^']
    ];

    foreach ($precedence as $ops) {
        $searchFromEnd = !in_array('^', $ops);
        if ($searchFromEnd) {
            for ($i = strlen($expr) - 1; $i >= 0; $i--) {
                $char = $expr[$i];
                if (in_array($char, $ops)) {
                    $left = substr($expr, 0, $i);
                    $right = substr($expr, $i + 1);
                    if ($char === '-' && $left === '') continue; 
                    switch ($char) {
                        case '+': return evaluateExpression($left) + evaluateExpression($right);
                        case '-': return evaluateExpression($left) - evaluateExpression($right);
                        case '*': return evaluateExpression($left) * evaluateExpression($right);
                        case '/': 
                            $r = evaluateExpression($right);
                            return ($r == 0) ? "Ошибка (на 0)" : evaluateExpression($left) / $r;
                    }
                }
            }
        } else {
            for ($i = 0; $i < strlen($expr); $i++) {
                $char = $expr[$i];
                if (in_array($char, $ops)) {
                    $left = substr($expr, 0, $i);
                    $right = substr($expr, $i + 1);
                    if ($char === '^') return pow(evaluateExpression($left), evaluateExpression($right));
            }
            }
        }
    }

    if ($expr[0] === '-') {
        return -evaluateExpression(substr($expr, 1));
    }

    return is_numeric($expr) ? (float)$expr : "Ошибка";
}
?>
