<nav>
    <ul>
        <li><a href="?menu=Kontak">Kontak</a></li>
        <li><a href="?menu=Sejarah">Sejarah</a></li>
        <li><a href="?menu=Jurusan">Jurusan</a></li>
    </ul>
</nav>

<?php 

    if ( isset ( $_GET ['menu'] ) ) {
        $Menu = $_GET ['menu'];

        require_once $Menu . '.php';
    }

?>