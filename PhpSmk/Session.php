<nav>

    <ul>
        <li><a href="?menu=Isi">Isi</a></li>
        <li><a href="?menu=Hapus">Hapus</a></li>
        <li><a href="?menu=Destroy">Destroy</a></li>
    </ul>

</nav>


<?php 

    session_start ();

    var_dump($_SESSION);

    echo '<br>';

    if ( isset ($_GET ['menu'] ) ) {
        $menu = $_GET ['menu'];

        echo $menu;

        switch ($menu) {
            case 'Isi':
                IsiSession();
                break;
            case 'Hapus':
                Unset($_SESSION['User']);
                break;
            case 'Destroy':
                session_destroy();
                break;

            default:
                # code...
                break;
        }
    }

    function IsiSession () {
        $_SESSION ['User'] = 'Joni';

        $_SESSION ['Nama'] = 'Joni Rambo';

        $_SESSION ['Alamat'] = 'Sidoarjo';
    }

?>