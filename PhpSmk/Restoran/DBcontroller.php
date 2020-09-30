<?php 

    class DB {
        
        private $Host = "127.0.0.1";
        private $User = "root";
        private $Password = "";
        private $Database = "dbrestoran";
        private $Koneksi;

        public function __construct ()
        {
            $this -> Koneksi = $this -> koneksiDB ();
        }

        public function koneksiDB ()
        {
            $Koneksi = mysqli_connect ($this -> Host, $this -> User, $this -> Password, $this -> Database);
            return $Koneksi;
        }

        public function getAll($SQL)
        {
            $Result = mysqli_query ($this -> Koneksi, $SQL);
            while ($Row = mysqli_fetch_assoc ($Result)) {
                $Data [] = $Row;
            }

            if (!empty ($Data)) {
                return $Data;
            }
        }

        public function getItem($SQL)
        {
            $Result = mysqli_query ($this -> Koneksi, $SQL);
            $Row = mysqli_fetch_assoc ($Result);
            
            return $Row;
        }

        public function rowCount($SQL)
        {
            $Result = mysqli_query ($this -> Koneksi, $SQL);
            $Count = mysqli_num_rows ($Result);
            
            return $Count;
        }

        public function runSQL($SQL)
        {
            $Result = mysqli_query ($this -> Koneksi, $SQL);
        }

        public function Pesan($Text = "")
        {
            echo $Text;
        }

    }

?>