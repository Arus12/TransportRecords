<?php
/**
 * @author Jan Černý
 * sql_conn class
 */
class sql_conn
{
    /**
     * connection function
     *
     * @param string $file
     */
    public function connection(string $file)
    {
        $conn = mysqli_connect($this->foreach(0,$file), $this->foreach(1,$file), $this->foreach(2,$file), $this->foreach(3,$file));
        if (!$conn) {
            return FALSE;
        } else {
            return $conn;
        }
    }

    /**
     * foreach function
     *
     * @param integer $i
     * @param string $file
     * @return string
     */
    public function foreach(int $i, string $file):string
    {
        if($file == "php"){
            $raw_data = parse_ini_file("../utils/config.ini");
            die($raw_data);
        }else if($file == "load"){
            $raw_data = parse_ini_file("utils/config.ini");
        }
        $o = 0;
        foreach ($raw_data as $value) {
            if ($i == $o) {
                return $value;
            } elseif ($i == $o) {
                return $value;
            } elseif ($i == $o) {
                return $value;
            } elseif ($i == $o) {
                return $value;
            }
            $o++;
        }
    }
}
