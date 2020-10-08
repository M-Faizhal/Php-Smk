<?php

    $JumlahData = $Db -> rowCount ("SELECT iduser FROM tbluser");
    $Banyak = 4;

    $Halaman = ceil ($JumlahData / $Banyak);

    if (isset ($_GET ['p'])) {
        $p = $_GET ['p'];
        $Mulai = ($p * $Banyak) - $Banyak;
        //   0 = (1 * 3) - 3
    }
    else {
        $Mulai = 0;
    }

    $SQL = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $Mulai, $Banyak";
    $Row = $Db -> getAll($SQL);

    $No = 1 + $Mulai;
?>
<div class="float-left mr-4">
    <a class="btn btn-primary" href="?f=User&m=Insert" role="button">TAMBAH DATA</a>
</div>
<h3>User</h3>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Row as $r) : ?>
        <?php 
        
            if ($r ['aktif'] == 1) {
                $Status = "Aktif";
            }
            else {
                $Status = "Banned";
            }
    
        ?>
        <tr>
            <td><?php echo $No++?></td>
            <td><?php echo $r['user']?></td>
            <td><?php echo $r['email']?></td>
            <td><?php echo $r['level']?></td>
            <td><a href="?f=User&m=Delete&id=<?php echo $r['iduser']?>">Delete</a></td>
            <td><a href="?f=User&m=Update&id=<?php echo $r['iduser']?>"><?php echo $Status; ?></a></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>

<?php 

    for ($i = 1; $i <=  $Halaman; $i++) { 
        echo '<a href="?f=User&m=Select&p=' . $i . '">' . $i . '</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>