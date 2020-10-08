<?php 

    session_start ();
    require_once "../DBcontroller.php";
    $Db = new DB;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Restoran</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto mt-4">
                <div>
                    <h3>LOGIN RESTORAN</h3>
                </div>
                <div class="form-group">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Email :</label>
                            <input type="email" name="Email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password :</label>
                            <input type="password" name="Password" required class="form-control">
                        </div>
                        <div>
                            <input type="submit" name="Login" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 

    if (isset ($_POST ['Login'])) {
        $Email = $_POST ['Email'];
        $Password = $_POST ['Password'];

        $SQL = "SELECT * FROM tbluser WHERE email='$Email' AND password='$Password'";

        $Count = $Db -> rowCount ($SQL);

        if ($Count == 0) {
            echo "<center><h3>Email atau Password Salah</h3></center>";
        }
        else {
            $SQL = "SELECT * FROM tbluser WHERE email='$Email' AND password='$Password'";
            $Row = $Db -> getItem ($SQL);

            $_SESSION ['user'] = $Row ['email'];
            $_SESSION ['level'] = $Row ['level'];
            $_SESSION ['iduser'] = $Row ['iduser'];

            header ("location:Index.php");
        }
    }

?>