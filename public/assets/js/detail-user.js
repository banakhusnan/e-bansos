const detailButton = document.getElementById("detailButton");
const idUser = detailButton.dataset.id;

detailButton.addEventListener("click", () => {
    $.ajax({
        url: "/admin/pengguna/" + idUser,
        method: "GET",
        success: (res) => {
            const response = res.data;
            modalDetailUser(response);
            console.log(response);
        },
        error: (e) => {
            console.log(e);
        },
    });
});

function modalDetailUser(data) {
    const modal = document.getElementById("detailUserModal");
    const nama = modal.querySelector("#nama");
    const role = modal.querySelector("#role");
    const alamat = modal.querySelector("#alamat");
    const namaAwal = modal.querySelector("#namaAwal");
    const namaAkhir = modal.querySelector("#namaAkhir");
    const email = modal.querySelector("#email");
    const alamatPersonal = modal.querySelector("#alamatPersonal");
    const job = modal.querySelector("#job");
    const nik = modal.querySelector("#nik");
    const date_of_birth = modal.querySelector("#date_of_birth");
    const no_handphone = modal.querySelector("#no_handphone");

    nama.textContent = data.name;
    role.textContent = data.role;
    alamat.textContent = data.alamat ? data.alamat : "-";
    namaAwal.textContent = data.namaAwal ? data.namaAwal : "-";
    namaAkhir.textContent = data.namaAkhir ? data.namaAkhir : "-";
    email.textContent = data.email;
    alamatPersonal.textContent = data.alamat ? data.alamat : "-";
    job.textContent = data.job ? data.job : "-";
    nik.textContent = data.nik ? data.nik : "-";
    date_of_birth.textContent = data.date_of_birth ? data.date_of_birth : "-";
    no_handphone.textContent = data.no_handphone ? data.no_handphone : "-";

    modalBs = new bootstrap.Modal(modal);
    modalBs.show();
}
