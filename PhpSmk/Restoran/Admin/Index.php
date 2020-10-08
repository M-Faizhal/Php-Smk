<?php 

    session_start ();
    require_once "../DBcontroller.php";
    $Db = new DB;

    if (!isset ($_SESSION ['user'])) {
        header ("location:Login.php");
    }
    if (isset ($_GET ['Log'])) {
        session_destroy();
        header ("location:Index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Restoran</h2>
            </div>
            <div class="col-md-9">
                <div class="float-right mt-4"><a href="?Log=Logout">Logout</a></div>
                <div class="float-right mt-4 mr-4">User : <a href="?f=User&m=Updateuser&id=<?php echo $_SESSION ['iduser'] ?>"><?php echo $_SESSION ['user'] ?></a></div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="?f=Kategori&m=Select">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=Menu&m=Select">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=Pelanggan&m=Select">Pelanggan</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=Order&m=Select">Order</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=OrderDetail&m=Select">Order Detail</a></li>
                    <li class="nav-item"><a class="nav-link" href="?f=User&m=Select">User</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <?php 
                
                    if (isset ($_GET ['f']) && isset ($_GET ['m'])) {
                        $f = $_GET ['f'];
                        $m = $_GET ['m'];

                        $file = '../' . $f . '/' . $m . '.php';

                        require_once $file;
                    }
                
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-center">2020 - copyright@smkrevit.com</p>
            </div>
        </div>
    </div>
</body>
</html>