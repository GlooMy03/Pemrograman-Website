function hitungPenjumlahan() {
    // Mengambil nilai dari input
    const num1 = parseFloat(document.getElementById('num1').value);
    const num2 = parseFloat(document.getElementById('num2').value);
    
    // Memastikan kedua input adalah angka
    if (!isNaN(num1) && !isNaN(num2)) {
        const hasil = num1 + num2;
        document.getElementById('hasil').textContent = hasil;
    } else {
        document.getElementById('hasil').textContent = "Input tidak valid";
    }
}
