<?php 

    if (isset ($_GET ['id'])) {
        $Id = $_GET ['id'];

        $SQL = "DELETE FROM tbluser WHERE iduser=$Id";

        $Db -> runSQL ($SQL);

        header ("location:?f=User&m=Select");
    }

?>