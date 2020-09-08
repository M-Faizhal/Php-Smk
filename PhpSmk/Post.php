<form action="" method="post">
    Email :
    <input type="Email" name="Email">
    Password :
    <input type="Password" name="Password">
    <input type="submit" name="Kirim" value="Login">
</form>

<?php 

    if ( isset ( $_POST ['Kirim'] ) ) {
        $Email = $_POST ['Email'];
        $Password = $_POST ['Password'];
    
        echo $Email;
        echo "<br>";
        echo $Password;
    }

?>