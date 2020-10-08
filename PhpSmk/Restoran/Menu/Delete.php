<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "DELETE FROM tblmenu WHERE idmenu=$Id";

        $Db -> runSQL ($SQL);

        header ("location:?f=Menu&m=Select");
    }

?>