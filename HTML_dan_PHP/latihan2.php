<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <tr>
            <td>Nama</td>
            <td>NIM</td>
            <td>Umur</td>
        </tr>
            <?php
                $i = 1;
                while ($i <= 5) {
                ?>
            <tr>
                <td>Aji</td>
                <td>241511033</td>
                <td>12</td>
            </tr>
            <?php
                $i = $i + 1;
                }
            ?>
    </table>
</body>
</html>