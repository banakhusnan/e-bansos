const detailButton = document.querySelectorAll("#detailTransactionButton");

detailButton.forEach((e) => {
    const idButton = e.dataset.id;
    e.addEventListener("click", () => {
        formSubmit(idButton);
    });
});

function formSubmit(id) {
    $.ajax({
        url: "/get-transaksi/" + id,
        method: "GET",
        success: (res) => {
            showData(res.data);
        },
        error: (res) => {
            console.log(res);
        },
    });
}

function showData(data) {
    const customerId = document.getElementById("customerId");
    const type = document.getElementById("type");
    const amount = document.getElementById("amount");
    const timeRelative = document.getElementById("timeRelative");
    const datePurchase = document.getElementById("datePurchase");
    const price = document.getElementById("price");
    const change = document.getElementById("change");
    const pay = document.getElementById("pay");
    const paymentMethod = document.getElementById("paymentMethod");

    customerId.textContent = data.customerId;
    type.textContent = data.type;
    amount.textContent = data.amount + " Pcs";
    timeRelative.textContent = data.timeRelative;
    datePurchase.textContent = data.datePurchase;
    price.textContent = formatCurrency(data.price);
    change.textContent = formatCurrency(data.change);
    pay.textContent = formatCurrency(data.pay);
    paymentMethod.textContent = data.paymentMethod + " pay";
}

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
