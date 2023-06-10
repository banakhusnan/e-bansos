const detailButton = document.getElementsByName("detailButton");

detailButton.forEach((element) => {
    const idUser = element.dataset.id;
    element.addEventListener("click", () => {
        $.ajax({
            url: "/admin/pengguna/" + idUser,
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
        const modal = document.getElementById("detailUserModal");
        const nama = modal.querySelector("#nama");
        const role = modal.querySelector("#role");
        const alamat = modal.querySelector("#email");

        nama.textContent = data.name;
        role.textContent = data.role;
        email.textContent = data.email;

        modalBootstrap = new bootstrap.Modal(modal);
        modalBootstrap.show();
    }
});
