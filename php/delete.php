<?php
/**
 * @author Jan Černý
 * class delete
 */
class delete{

    /**
     * __construct function
     * @return void
     */
    public function __construct()
    {
        spl_autoload_register('Loader::load_index');
        $this->delete();
    }

    /**
     * delete function
     *
     * @return boolean
     */
    private function delete(): bool{
        $obj =  new sql_conn();
        $conn = $obj->connection("php");
        $sql = "DELETE FROM `cas`";
        if($conn->query($sql)){
            $sql = "DELETE FROM `spoj`";
            return $conn->query($sql);
        }else{
            return FALSE;
        }
    }
}
?>