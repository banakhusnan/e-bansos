const detailButton = document.getElementsByName("detailButton");

detailButton.forEach((element) => {
    const idPendaftaran = element.dataset.id;
    element.addEventListener("click", () => {
        $.ajax({
            url: "/admin/pendaftaran/" + idPendaftaran,
            method: "GET",
            success: (res) => {
                const response = res.data;
                modalDetailUser(response);
            },
            error: (e) => {
                console.error(e.responseJSON.message);
            },
        });
    });

    function modalDetailUser(data) {
        const modal = document.getElementById("detailPendaftaranModal");
        const namaAwal = modal.querySelector("#namaAwal");
        const namaAkhir = modal.querySelector("#namaAkhir");
        const email = modal.querySelector("#email");
        const alamatPersonal = modal.querySelector("#alamatPersonal");
        const job = modal.querySelector("#job");
        const nik = modal.querySelector("#nik");
        const date_of_birth = modal.querySelector("#date_of_birth");
        const no_handphone = modal.querySelector("#no_handphone");

        namaAwal.textContent = data.namaAwal ? data.namaAwal : "-";
        namaAkhir.textContent = data.namaAkhir ? data.namaAkhir : "-";
        email.textContent = data.email;
        alamatPersonal.textContent = data.alamat ? data.alamat : "-";
        job.textContent = data.job ? data.job : "-";
        nik.textContent = data.nik ? data.nik : "-";
        date_of_birth.textContent = data.date_of_birth
            ? data.date_of_birth
            : "-";
        no_handphone.textContent = data.no_handphone ? data.no_handphone : "-";

        modalBootstrap = new bootstrap.Modal(modal);
        modalBootstrap.show();
    }
});
