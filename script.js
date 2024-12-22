// Tunggu hingga DOM selesai dimuat
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registration-form');
    const tableBody = document.getElementById('registrants-table');

    // Event: Penanganan pengiriman formulir
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Mencegah pengiriman form secara default

        // Ambil nilai input dari form
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const membership = document.querySelector('input[name="membership"]:checked');
        const interests = Array.from(document.querySelectorAll('input[name="interests[]"]:checked')).map(el => el.value);
        const dob = document.getElementById('dob').value;

        // Validasi input
        if (!name || !email || !membership || !dob) {
            alert('Mohon isi semua data yang wajib.');
            return;
        }

        // Tambahkan data baru ke tabel
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${name}</td>
            <td>${email}</td>
            <td>${membership.value}</td>
            <td>${interests.join(', ')}</td>
            <td>${dob}</td>
        `;
        tableBody.appendChild(newRow);

        // Reset form setelah berhasil ditambahkan
        form.reset();
    });

    // Event: Validasi input email secara langsung
    form.addEventListener('input', (event) => {
        const target = event.target;
        if (target.id === 'email' && !target.value.includes('@')) {
            target.setCustomValidity('Mohon masukkan email yang valid.');
        } else {
            target.setCustomValidity('');
        }
    });

    // Event tambahan: Gaya dinamis pada tombol submit
    const submitButton = document.getElementById('submit-button');
    submitButton.addEventListener('mouseover', () => {
        submitButton.style.backgroundColor = '#002d62';
    });
    submitButton.addEventListener('mouseout', () => {
        submitButton.style.backgroundColor = '#034694';
    });
});
