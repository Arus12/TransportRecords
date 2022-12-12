<?php
$csv = explode("\n", file_get_contents("../csvs/data.csv"));
foreach ($csv as $row) {
    if ($row != null) {
        $item = str_getcsv($row, ";");
        $data[] = [
            "spoj" => $item[0],
            "prijezd" => $item[1],
            "odjezd" => $item[2],
            "mesto" =>  $item[3]
        ];
    }
}
print(json_encode($data));
