<?php
function segitigaSamaSisi($n) {
    for ($i = 1; $i <= $n; $i++) {
        // Mencetak spasi di sebelah kiri
        for ($j = $i; $j < $n; $j++) {
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
segitigaSamaSisi($tinggi);
?>
