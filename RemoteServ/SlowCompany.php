<?php
$time_arr = array([2, 3, 4], [3, 2, 3], [4, 3, 2]);

$price_arr = array([5, 10, 15], [10, 5, 10], [15, 10, 5]);

$index_source = 0;
$index_target = 0;

$payload = array();
$payload ['coefficient'] = 0.0;
$payload ['date'] = date('Y-m-d');
$payload ['error'] = '';

$source = mb_strtolower($_POST["source"]);
$target = mb_strtolower($_POST["target"]);
$weight = $_POST["weight"];
if ($weight == 0){
    $weight = 0.1;
}


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
    $payload ['coefficient'] = $price_arr[$index_source][$index_target] * $weight;
    $payload ['date'] = date('Y-m-d', time() +  $time_arr[$index_source][$index_target] * 86400);
    $payload ['error'] = '';
}

echo (json_encode($payload, JSON_UNESCAPED_UNICODE));