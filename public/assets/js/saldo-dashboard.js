const showSaldo = document.querySelector("h5#saldo");

$.ajax({
    url: "get-saldo",
    method: "GET",
    beforeSend: () => {
        showSaldo.classList.add("d-flex", "justify-content-between");
        showSaldo.textContent = "Loading...";
        showSaldo.appendChild(showLoading());
    },
    success: (res) => {
        let saldo = formatCurrency(res.data.saldo);
        showSaldo.textContent = saldo;
    },
    error: (res) => {
        console.error(res.responseJSON.message);
    },
    complete: () => {
        showSaldo.classList.remove("d-flex", "justify-content-between");
    },
});

function formatCurrency(amount) {
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

function showLoading() {
    const spinnerDiv = document.createElement("div");
    spinnerDiv.classList.add("spinner-border", "spinner-border-sm");
    spinnerDiv.setAttribute("role", "status");

    return spinnerDiv;
}
