document.addEventListener("DOMContentLoaded", function () {
    // 1. Muat pilihan dari localStorage saat halaman dimuat
    const surveys = document.querySelectorAll('[name^="survey"]');
    surveys.forEach((survey) => {

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

    const submitButton = document.getElementById("submit");
    submitButton.addEventListener("click", function () {
        // Menghapus semua items local storage dengan nama yang dimulai dari "survey"
        for (let key in localStorage) {
            if (key.startsWith("survey")) {
                localStorage.removeItem(key);
            }
        }
    });
});
