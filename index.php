<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Klub Sepakbola Chelsea</title>
    <link rel="stylesheet" href="styles.css">
    <script defer src="scripts.js"></script>
</head>
<body>
    <header>
        <h1>Pendaftaran Klub Sepakbola Chelsea</h1>
    </header>

    <main>
        <section id="form-section">
            <h2>Formulir Pendaftaran</h2>
            <form id="registration-form" action="submit.php" method="POST">
                <label for="name">Nama Lengkap:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="membership-type">Tipe Keanggotaan:</label><br>
                <input type="radio" id="regular" name="membership" value="Regular" required>
                <label for="regular">Regular</label><br>
                <input type="radio" id="premium" name="membership" value="Premium">
                <label for="premium">Premium</label><br><br>

                <label for="interests">Minat:</label><br>
                <input type="checkbox" id="news" name="interests[]" value="Berita Klub">
                <label for="news">Berita Klub</label><br>
                <input type="checkbox" id="events" name="interests[]" value="Acara Klub">
                <label for="events">Acara Klub</label><br>
                <input type="checkbox" id="merchandise" name="interests[]" value="Merchandise">
                <label for="merchandise">Merchandise</label><br><br>

                <label for="dob">Tanggal Lahir:</label>
                <input type="date" id="dob" name="dob" required><br><br>

                <button type="submit" id="submit-button">Daftar</button>
            </form>
        </section>

        <section id="table-section">
            <h2>Data Pendaftar</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tipe Keanggotaan</th>
                        <th>Minat</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody id="registrants-table">
                    <!-- Data dari server akan ditampilkan di sini -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Klub Sepakbola Chelsea. Semua Hak Dilindungi.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registration-form');
            const tableBody = document.getElementById('registrants-table');

            // Event handling: Penanganan pengiriman form
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                // Validasi input form
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const membership = document.querySelector('input[name="membership"]:checked');
                const interests = Array.from(document.querySelectorAll('input[name="interests[]"]:checked')).map(el => el.value);
                const dob = document.getElementById('dob').value;

                if (!name || !email || !membership || !dob) {
                    alert('Mohon isi semua data yang wajib.');
                    return;
                }

                // Menambahkan data baru ke tabel
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${name}</td>
                    <td>${email}</td>
                    <td>${membership.value}</td>
                    <td>${interests.join(', ')}</td>
                    <td>${dob}</td>
                `;
                tableBody.appendChild(newRow);

                // Reset form setelah berhasil
                form.reset();
            });

            // Event handling: Validasi input email
            form.addEventListener('input', (event) => {
                const target = event.target;
                if (target.id === 'email' && !target.value.includes('@')) {
                    target.setCustomValidity('Mohon masukkan email yang valid.');
                } else {
                    target.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>
