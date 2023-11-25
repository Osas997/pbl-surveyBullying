// Mengambil elemen dengan id 'date'
const dateElement = document.getElementById("date");

// Membuat objek Date yang merepresentasikan tanggal hari ini
const today = new Date();

// Mendapatkan informasi tanggal, bulan, dan tahun
const day = today.getDate();
const month = today.getMonth() + 1; // Perlu ditambah 1 karena indeks bulan dimulai dari 0
const year = today.getFullYear();

// Mendapatkan informasi hari dalam format lokal (contoh: "Senin", "Selasa", dll.)
const options = { weekday: "long" };
const dayInIndonesian = today.toLocaleDateString("id-ID", options);

// Format tanggal dan hari sebagai string (misalnya, "Senin, 01/01/2023")
const formattedDate = `${dayInIndonesian}, ${day}/${month}/${year}`;

// Menetapkan teks pada elemen dengan id 'date'
dateElement.textContent = formattedDate;
