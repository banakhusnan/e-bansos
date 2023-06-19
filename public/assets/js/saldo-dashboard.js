$.ajax({
    url: "get-saldo",
    method: "GET",
    success: (res) => {
        const showSaldo = document.querySelector("h5#saldo");
        let saldo = formatCurrency(res.data.saldo);
        showSaldo.textContent = saldo;
    },
    error: (res) => {},
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
