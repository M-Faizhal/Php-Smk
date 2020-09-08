<form action="" method="post" enctype="multipart/form-data">
    Pilih File Gambar :
    <input type="file" name="Upload">
    <input type="submit" name="Kirim" value="Simpan">
</form>


<?php 

    if ( isset ($_POST ['Kirim'] ) ) {
        // $File = $_FILES ['Upload'];
        
        // // var_dump($_FILES ['Upload']);

        // foreach ($File as $key => $value) {
        //     echo $key . '= ' . $value;
        //     echo '<br>';
        // }

        $Name = $_FILES ['Upload']['name'];
        $Temp = $_FILES ['Upload']['tmp_name'];

        echo $Name . '= ' . $Temp;

        move_uploaded_file ($Temp, 'Img/' . $Name);

    }

?>