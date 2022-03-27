<?php
include 'DeliveryComp.php';
include 'SlowCompConnect.php';
include 'FastCompConnect.php';
include 'ParcelFabric.php';
include 'Settings.php';

$parcel_fabric = new ParcelFabric();
$td_data = array();
if ($_GET['company'] === 'slow' || $_GET['company'] === 'all') {
    $table_row['source'] =  $_GET['destination1'];
    $table_row['destination'] = $_GET['source1'];
    $table_row['company'] = 'Медленная';
    $table_row['weight']= floatval($_GET['weight1']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;

    $table_row['source'] =  $_GET['destination2'];
    $table_row['destination'] = $_GET['source2'];
    $table_row['company'] = 'Медленная';
    $table_row['weight']= floatval($_GET['weight2']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;

    $table_row['source'] =  $_GET['destination3'];
    $table_row['destination'] = $_GET['source3'];
    $table_row['company'] = 'Медленная';
    $table_row['weight']= floatval($_GET['weight3']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;
}

if ($_GET['company'] === 'fast' || $_GET['company'] === 'all') {

    $table_row['source'] =  $_GET['destination1'];
    $table_row['destination'] = $_GET['source1'];
    $table_row['company'] = 'Быстрая';
    $table_row['weight']= floatval($_GET['weight1']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;

    $table_row['source'] =  $_GET['destination2'];
    $table_row['destination'] = $_GET['source2'];
    $table_row['company'] = 'Быстрая';
    $table_row['weight']= floatval($_GET['weight2']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;

    $table_row['source'] =  $_GET['destination3'];
    $table_row['destination'] = $_GET['source3'];
    $table_row['company'] = 'Быстрая';
    $table_row['weight']= floatval($_GET['weight3']);
    $table_row['date'] = '';
    $table_row['price'] = '';
    $table_row['error'] = '';

    $td_data[] = $table_row;
}

foreach ($td_data as &$row){
    $parcel = $parcel_fabric->makeParcel($row['company']);
    $parcel->setSource($row["source"]);
    $parcel->setTarget($row["destination"]);
    $parcel->setWeight($row["weight"]);
    $parcel->makeRequest();
    $row["date"] = $parcel->getDate();
    $row["price"] = $parcel->getPrice();
    $row["error"] = $parcel->getError();
}
unset($row);

include 'Form.php';
show_table($td_data);

function show_table($data){
    echo ("<div>
    <table border = \"1\">
        <tr>
            <th>Откуда</th>
            <th>Куда</th>
            <th>Компания</th>
            <th>Дата доставки</th>
            <th>Стоимость</th>
            <th>Ошибка</th>
        </tr>");
    foreach ($data as $row) {
        echo("<tr>
            <td>".$row['source']."</td>
            <td>".$row['destination']."</td>
            <td>".$row['company']."</td>
            <td>".$row['date']."</td>
            <td>".$row['price']."</td>
            <td>".$row['error']."</td>
            </tr>");
    }
    echo ("</table>
</div>");
}


