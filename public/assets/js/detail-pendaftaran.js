const detailButton = document.getElementsByName("detailButton");

detailButton.forEach((element) => {
    const idPendaftaran = element.dataset.id;
    element.addEventListener("click", () => {
        $.ajax({
            url: "/admin/pendaftaran/" + idPendaftaran,
            method: "GET",
            success: (res) => {
                const response = res.data;

                // Fill the data to modal
                modalDetailUser(response);

                // Give attribute (onclick) when click button
                const buttonActionModal =
                    document.getElementById("toActionModal");

                // Give parameter (nama awal and id from user);
                buttonActionModal.setAttribute(
                    "onclick",
                    "persetujuanPendaftaran('" +
                        response.namaAwal +
                        "', '" +
                        response.id +
                        "')"
                );

                if (response.bansos_state == "success") {
                    buttonActionModal.setAttribute("data-bs-toggle", "");
                    buttonActionModal.setAttribute("data-bs-target", "");
                }
            },
            error: (e) => {
                console.error(e.responseJSON.message);
            },
        });
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
    const statusPendaftaran = modal.querySelector("#statusPendaftaran");
    const statusBantuan = modal.querySelector("#statusBantuan");
    const tanggalPendaftaran = modal.querySelector("#tanggalPendaftaran");
    const dataBantuan = modal.querySelector("#dataBantuan");
    const tanggalPenerimaanBantuan = modal.querySelector(
        "#tanggalPenerimaanBantuan"
    );

    namaAwal.textContent = data.namaAwal ? data.namaAwal : "-";
    namaAkhir.textContent = data.namaAkhir ? data.namaAkhir : "-";
    email.textContent = data.email;
    alamatPersonal.textContent = data.alamat ? data.alamat : "-";
    job.textContent = data.job ? data.job : "-";
    nik.textContent = data.nik ? data.nik : "-";
    date_of_birth.textContent = data.date_of_birth ? data.date_of_birth : "-";
    no_handphone.textContent = data.no_handphone ? data.no_handphone : "-";

    if (data.statusPendaftaran != null) {
        statusPendaftaran.innerHTML = `<i class='bx bxs-check-circle fs-3 text-success'></i>`;
    } else {
        statusPendaftaran.innerHTML = `<i class='bx bxs-x-circle fs-3 text-danger'></i>`;
    }

    if (data.statusBantuan === "process") {
        statusBantuan.innerHTML = `<span class="badge bg-warning">Proses</span>`;
    } else if (data.statusBantuan === "success") {
        statusBantuan.innerHTML = `<span class="badge bg-success">Berhasil</span>`;
    }

    tanggalPendaftaran.textContent = formatDate(data.tanggalPendaftaran);
    tanggalPenerimaanBantuan.textContent = formatDate(
        data.tanggalPenerimaanBantuan
    );
    dataBantuan.textContent = formatRupiah(data.dataBantuan);

    modalBootstrap = new bootstrap.Modal(modal);
    modalBootstrap.show();
}

function formatRupiah(amount) {
    // Mengubah string menjadi bilangan bulat
    const number = parseInt(amount);

    // Mengubah bilangan bulat menjadi format mata uang
    if (amount === 0) {
        const currency = "Rp 0";

        return currency;
    } else {
        const currency = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
        }).format(number);

        return currency;
    }
}

function formatDate(data) {
    let date = new Date(data);

    const month = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep",
        "Okt",
        "Nov",
        "Des",
    ];

    return (
        date.getDate() +
        " " +
        month[date.getMonth()] +
        ", " +
        date.getFullYear()
    );
}

function persetujuanPendaftaran(nama, id) {
    const checkBox = document.getElementById("setuju");
    const namaPenerima = document.getElementById("namaPenerima");

    // add nama
    namaPenerima.textContent = nama;
    checkBox.value = id;
}

const bansosState = document.getElementById("statusBansos");
bansosState.addEventListener("change", () => {
    const showBansosState = document.getElementById("showStatusBansos");
    const showBantuan = document.getElementById("showBantuan");

    if (bansosState.value === "gagal") {
        showBansosState.textContent = "Menolak";
        showBantuan.textContent = "";
    } else if (bansosState.value === "berhasil") {
        showBansosState.textContent = "Menyetujui";
        showBantuan.textContent = "dengan jumlah bantuan sebesar Rp 600.000?";
    }
});

const form = document.getElementById("formPersetujuan");
form.addEventListener("submit", (event) => {
    event.preventDefault();

    const iconButton = form.querySelector("#spinner");

    // Action
    const action = form.dataset.action;
    // Method
    const method = form.method;
    // Data Input
    const data = new FormData(form);

    $.ajax({
        url: action,
        method: method,
        data: data,
        contentType: false,
        processData: false,
        beforeSend: () => {
            iconButton.classList.add(
                "spinner-border",
                "text-light",
                "spinner-border-sm"
            );
            iconButton.setAttribute("role", "status");
        },
        success: function (response) {
            window.location.href = response.data;
            return true;
        },
        error: function (response) {
            console.error(response.responseJSON.message);
        },
        complete: function () {
            iconButton.classList.remove(
                "spinner-border",
                "text-light",
                "spinner-border-sm"
            );
        },
    });
});

const checkBox = document.getElementById("setuju");

// Give Error Message
checkBox.addEventListener("invalid", () => {
    checkBox.setCustomValidity(
        "Harap ceklist terlebih dahulu sebelum menyetujui pendaftaran"
    );
});
checkBox.addEventListener("change", () => {
    checkBox.setCustomValidity("");
});
