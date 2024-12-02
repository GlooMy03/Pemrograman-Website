<?php
function segitigaTerbalik($n) {
    for ($i = $n; $i >= 1; $i--) {
        // Mencetak spasi di sebelah kiri
        for ($j = $n; $j > $i; $j--) {
            echo "&nbsp;&nbsp;";
        }
        // Mencetak bintang
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        echo "<br>";
    }
}

// Menentukan tinggi segitiga
$tinggi = 5;
segitigaTerbalik($tinggi);
?>
