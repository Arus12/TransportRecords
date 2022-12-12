<?php

/**
 * @author Jan Černý
 * class create_csv
 */
class create_csv
{
    /**
     * __construct function
     * @return void
     */
    public function __construct()
    {
        $this->create_csv();
    }

    /**
     * create_csv function
     *
     * @return void
     */
    private function create_csv()
    {
        $obj =  new sql_conn();
        $conn = $obj->connection("load");
        $sql = "SELECT `prijezd`, `odjezd`, `mesto`, `Spoj_idSpoj` FROM `cas` ORDER BY odjezd;";
        $result = $conn->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = [
                    "id_spoj" => $row["Spoj_idSpoj"],
                    "prijezd" => $row["prijezd"],
                    "odjezd" => $row["odjezd"],
                    "mesto" =>  $row["mesto"]
                ];
            }
        }
        $i = 0;
        $csv = [];
        if (!is_null($data)) {
            foreach ($data as $dat) {
                foreach ($dat as $id) {
                    if (intval($id) and !strpos($id, ":")) {
                        $sql = "SELECT `cislospoje` FROM `spoj` WHERE `idSpoj` = $id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $dat["id_spoj"] = $row["cislospoje"];
                                $csv[$i] = $dat;
                                $i++;
                            }
                        } else {
                            $csv[$i] = "";
                        }
                    }
                }
            }
        } else {
        }
        if (file_exists("csvs/data.csv")) {
            $f = fopen("csvs/data.csv", 'w');
            foreach ($csv as $info) {
                fputcsv($f, $info, ";");
            }
            fclose($f);
        } else {
            file_put_contents("csvs/data.csv", null);
            $f = fopen("csvs/data.csv", 'w');
            fputcsv($f, $csv);
        }
    }
}
