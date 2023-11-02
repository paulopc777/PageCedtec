<?php
require_once('./Modules/comands.php');
$send = new Send();
$result = $send->CharallUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <?php
        var_dump($result);

        $contador = 0;
        $resultadoDb = count($result) - 1;
        //echo "<hr>";
        //var_dump($resultadoDb);

        while ($contador <= $resultadoDb) {

            echo "
        <table border='1'>
        <tr>
            <th>" . $result[$contador][1] . "</th>
            <th>" . $result[$contador][2] . "</th>
            <th>" . $result[$contador][4] . "</th>
        </tr>
    </table>
        ";

            $contador++;
        }
        ?>
    </div>
</body>

</html>