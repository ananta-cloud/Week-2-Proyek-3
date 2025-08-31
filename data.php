<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Nama :
    <form method="post">
        <input type="text" name="nama" id="nama" value="Bekasi Banjir">
        <button type="submit" formaction="display.php" formmethod="post">Kirim(post)</button>
        <button type="submit" formaction="display.php" formmethod="get">Kirim(get)</button>
    </form>
</body>
</html>