<?php
/**
 * @author Jan Černý
 * class add
 */
class add{

    /**
     * __construct function
     *
     * @param string $spoj
     * @param string $prijezd
     * @param string $odjezd
     * @param string $mesto
     * @return boolean
     */
    public function __construct(string $spoj, $prijezd, $odjezd, $mesto)
    {
        spl_autoload_register('loader::load_php');
        if(intval($spoj) and strpos($prijezd, ":") and strlen($prijezd) == 5 and strpos($odjezd, ":") and strlen($odjezd) == 5 and $mesto != null and !intval($mesto)){ 
            $this->sql_add_cas($spoj, $prijezd, $odjezd, $mesto);
        }else if(intval($spoj) and $prijezd == null and $odjezd == null and $mesto == null){
            $this->sql_add_spoj($spoj);
        }else{
            return FALSE;
        }
    }

    /**
     * sql_add_cas function
     *
     * @param string $spoj
     * @param string $prijezd
     * @param string $odjezd
     * @param string $mesto
     * @return boolean
     */
    private function sql_add_cas(string $spoj, string $prijezd, string $odjezd, string $mesto):bool{
        $obj =  new sql_conn();
        $conn = $obj->connection("php");
        $prijezd = $prijezd . ":00";
        $odjezd = $odjezd . ":00";

        $sql = "SELECT `idSpoj` FROM `spoj` WHERE `cislospoje` = $spoj";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idspoj = $row["idSpoj"];
            }
            $sql = "INSERT INTO `cas` (`idCas`, `prijezd`, `odjezd`, `mesto`, `Spoj_idSpoj`) VALUES (NULL, '$prijezd', '$odjezd', '$mesto', '$idspoj')";
            $conn->query($sql);
            $conn->close();
            return TRUE;
        }else{
            $conn->close();
            return FALSE;
        }
    }

    /**
     * sql_add_spoj function
     *
     * @param string $spoj
     * @return boolean
     */
    private function sql_add_spoj(string $spoj): bool{
        $obj =  new sql_conn();
        $conn = $obj->connection("php");
        $sql = "SELECT * FROM `spoj` WHERE `cislospoje` = $spoj";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $spoje[$i] = $row["cislospoje"];
                $i++;
            }
        }
        foreach($spoje as $ac_spoj){
            if($ac_spoj == $spoj){
                return FALSE;
            }
        }
        $sql = "INSERT INTO `spoj` (`idSpoj`, `cislospoje`) VALUES (NULL, '$spoj')";
        $conn->query($sql);
        if($conn){
            $conn->close();
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
?>