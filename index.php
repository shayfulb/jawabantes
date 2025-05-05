<html>
<head>
    <title>Konversi Angka</title>
</head>
<body>
    <h2>Masukkan Angka</h2>
    <form method="POST" action="">
        <input type="number" name="angka" required>
        <button type="submit">Konversi</button>
    </form>

    <?php
	if ($_POST)
	{
		require_once 'konversi.php';
        $angka = intval($_POST['angka']);
        $konversi = new Konversi($angka);
        echo "<h3>Output:</h3>";
        echo "<p>" . $konversi->ubah() . "</p>";

	}
    ?>
</body>
</html>