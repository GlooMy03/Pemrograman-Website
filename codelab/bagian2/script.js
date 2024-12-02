function validateForm() {
    // Mengambil nilai input
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    // Mengambil elemen error
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    let isValid = true;

    // Validasi nama
    if (name === '') {
        nameError.textContent = 'Nama harus diisi';
        nameError.style.display = 'block';
        isValid = false;
    } else {
        nameError.style.display = 'none';
    }

    // Validasi email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        emailError.textContent = 'Email harus diisi';
        emailError.style.display = 'block';
        isValid = false;
    } else if (!emailPattern.test(email)) {
        emailError.textContent = 'Format email tidak valid';
        emailError.style.display = 'block';
        isValid = false;
    } else {
        emailError.style.display = 'none';
    }

    // Validasi password
    if (password === '') {
        passwordError.textContent = 'Password harus diisi';
        passwordError.style.display = 'block';
        isValid = false;
    } else if (password.length < 6) {
        passwordError.textContent = 'Password harus minimal 6 karakter';
        passwordError.style.display = 'block';
        isValid = false;
    } else {
        passwordError.style.display = 'none';
    }

    // Jika valid, tampilkan pesan sukses
    if (isValid) {
        alert('Registrasi berhasil!');
    }
}
