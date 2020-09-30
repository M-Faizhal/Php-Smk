<?php 

    class DB {

        // Property
        public $Host = "127.0.0.1";
        private $User = "root";
        private $Password = "";
        private $Database = "dbrestoran";

        public function __construct ()
        {
            echo "Function Construct";
        }

        // Method
        public function selectData ()
        {
            echo 'Select Data';
        }

        public function getDatabase ()
        {
            return $this -> Database;
        }

        public function Tampil ()
        {
            $this -> selectData ();
        }

        public static function InsertData()
        {
            echo "Static Function";
        }

    }

    DB :: InsertData ();

    $Db = new DB;

    // echo '<br>';

    // $Db -> selectData ();

    // echo '<br>';

    // echo $Db -> Host;

    // echo '<br>';

    // echo $Db -> getDatabase () . '<br>';

    // $Db -> Tampil ();

?>