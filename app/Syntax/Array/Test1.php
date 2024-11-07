<?php


$data = [
    1, 2, 3, 4
];

$res = array_reduce([1, 2, 3, 4], function ($pre, $cur) {
    return $pre + $cur;
}, 100);

echo '===============' . PHP_EOL;
$data = ['AAA', 'BBB', 'CCC'];

// array_reduce第二个参数是一个闭包函数，返回一个闭包函数，后进先出。
$res = array_reduce($data, function ($stack, $item) {
    return function () use ($stack, $item) {
        var_dump($item);
        if (is_null($stack)) {
            return 'stack is null:' . $item;
        }
        if ($stack instanceof Closure) {
            $stack();
            return strtolower($item);
        }
        return $item;
    };
});
echo '执行' . PHP_EOL;
var_dump($res());


// 未定义初始值，初始值是null。
$res = array_reduce([1, 2, 3], function ($stack, $item) {
    var_dump($stack);
    return $stack + $item;
});
var_dump($res);

