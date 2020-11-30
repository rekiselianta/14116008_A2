<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1</title>
</head>

<body>
    <?php
    function faktorial($bil)
    {
        if ($bil == 0) {
            return 1;
        } else {
            return $bil * faktorial($bil - 1);
        }
    }
    ?>
    <h2>Faktorial</h2>
    <form method="post">
        <label>Bilangan: </label>
        <input type="number" name="bilangan" min="0">
        <button type="submit" name="kirim">submit</button>
    </form><br>
    <?php
    if (isset($_POST['kirim'])) {
        $bil = $_POST['bilangan'];
        echo "faktorial(" . $bil . ") : " . faktorial($bil);
    }
    ?>
</body>

</html>