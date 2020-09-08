<?php 

    $Cookie_name = 'User';
    $Cookie_value = 'Joni';

    setcookie ($Cookie_name, $Cookie_value);

    $Cookie_value = 'Tejo';

    setcookie ($Cookie_name, $Cookie_value);

    echo $_COOKIE [$Cookie_name];

    setcookie ("User", "", time() - 36000);

    echo '</br>';

    var_dump($_COOKIE);

?>