<?php 

    session_start ();
    require_once "DBcontroller.php";
    $Db = new DB;

    $SQL = "SELECT * FROM tblkategori ORDER BY kategori";
    $Row = $Db -> getAll ($SQL);

    if (isset ($_GET ['Log'])) {
        session_destroy ();
        header ("location:Index.php");
    }

    function Cart () {
        global $Db;
        
        $Cart = 0;

        foreach ($_SESSION as $key => $value) {
            if ($key <> 'Pelanggan' && $key <> 'idpelanggan') {
                $Id = substr ($key , 1);

                $SQL = "SELECT * FROM tblmenu WHERE idmenu = $Id";

                $Row = $Db -> getAll ($SQL);

                foreach ($Row as $R) {
                    $Cart ++;
                }
            }
        }
        return $Cart;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran SMK | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mt-4">
                <h2><a href="Index.php">Restoran SMK</a></h2>
            </div>
            <div class="col-md-9">
            <?php 
            
                if (isset ($_SESSION ['Pelanggan'])) {
                    echo '
                            <div class="float-right mt-4"><a href="?Log=Logout">Logout</a></div>
                            <div class="float-right mt-4 mr-4">Pelanggan : ' . $_SESSION ['Pelanggan'] . '</div>
                            <div class="float-right mt-4 mr-4">Cart : ( <a href="?f=Home&m=Beli"> ' . Cart () . ' </a> )</div>
                            <div class="float-right mt-4 mr-4"><a href="?f=Home&m=Histori">Histori</a></div>
                    ';
                }
                else {
                    echo '
                            <div class="float-right mt-4 mr-4"><a href="?f=Home&m=Login">Login</a></div>
                            <div class="float-right mt-4 mr-4"><a href="?f=Home&m=Daftar">Daftar</a></div>
                    ';
                }
            
            ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <h3>Kategori</h3>
                <hr>
                <?php if (!empty ($Row)) { ?>
                <ul class="nav flex-column">
                <?php foreach ($Row as $R) : ?>
                    <li class="nav-item"><a class="nav-link" href="?f=Home&m=Produk&id=<?php echo $R ['idkategori'] ?>"><?php echo $R ['kategori'] ?></a></li>
                <?php endforeach ?>
                </ul>
                <?php } ?>
            </div>
            <div class="col-md-9">
                <?php 
                
                    if (isset ($_GET ['f']) && isset ($_GET ['m'])) {
                        $F = $_GET ['f'];
                        $M = $_GET ['m'];

                        $File = $F . '/' . $M . '.php';

                        require_once $File;
                    }
                    else {
                        require_once "Home/Produk.php";
                    }
                
                ?>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <p class="text-center">2020 - copyright@smkrevit.com</p>
            </div>
        </div>
    </div>
</body>
</html>