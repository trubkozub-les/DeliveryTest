<?php
$time_arr = array([1, 2, 3], [2, 1, 2], [3, 2, 1]);

$price_arr = array([1000, 2000, 3000], [2000, 1000, 2000], [3000, 2000, 1000]);

$index_source = 0;
$index_target = 0;

$payload = array();
$payload ['price'] = 0.0;
$payload ['period'] = 0;
$payload ['error'] = '';

$source = mb_strtolower($_POST["source"]);
$target = mb_strtolower($_POST["target"]);
$weight = $_POST["weight"];
if ($weight == 0){
   $weight = 0.1;
}

if (date('G') >= 18){
    $payload ['error'] = 'Посылки не принимаются после 18-00';
}
if (!$payload ['error']) {
    switch ($source) {
        case 'петербург':
            $index_source = 0;
            break;
        case 'москва':
            $index_source = 1;
            break;
        case 'казань':
            $index_source = 2;
            break;
        default:
            $payload ['error'] = $_POST["source"] . ' не обслуживается';
    }
}
    if (!$payload ['error']) {
        switch ($target) {
            case 'петербург':
                $index_target = 0;
                break;
            case 'москва':
                $index_target = 1;
                break;
            case 'казань':
                $index_target = 2;
                break;
            default:
                $payload ['error'] = $_POST["target"] . ' не обслуживается';
        }
    }
    if (!$payload ['error']) {
    $payload ['price'] = $price_arr[$index_source][$index_target] * $weight;
    $payload ['period'] = $time_arr[$index_source][$index_target];
    $payload ['error'] = '';
}
echo (json_encode($payload, JSON_UNESCAPED_UNICODE));