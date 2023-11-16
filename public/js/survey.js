document.addEventListener("DOMContentLoaded", function () {
    // 1. Muat pilihan dari localStorage saat halaman dimuat
    const surveys = document.querySelectorAll('[name^="survey"]');
    surveys.forEach((survey) => {
        console.log(survey.name);
        const nilaiTersimpan = localStorage.getItem(survey.name);
        if (nilaiTersimpan) {
            document.querySelector(
                `[name="${survey.name}"][value="${nilaiTersimpan}"]`
            ).checked = true;
        }
    });

    // 2. Simpan pilihan ke localStorage saat berubah
    document.addEventListener("change", function (e) {
        if (e.target && e.target.name.startsWith("survey")) {
            localStorage.setItem(e.target.name, e.target.value);
        }
    });

    const btn = document.getElementById("submit");
    btn.addEventListener("click", () => {
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            if (key.startsWith("survey")) {
                localStorage.removeItem(key);
                // Karena kita menghapus item, kita perlu menyesuaikan indeks
                i--;
            }
        }
    });
});
