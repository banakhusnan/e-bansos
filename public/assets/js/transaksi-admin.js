const detailButton = document.querySelectorAll("#detailTransactionButton");

detailButton.forEach((e) => {
    const idButton = e.dataset.id;
    e.addEventListener("click", () => {
        formSubmit(idButton);
    });
});

function formSubmit(id) {
    $.ajax({
        url: "transaksi/" + id,
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
    const namaPelanggan = document.getElementById("namaPelanggan");
    const customerId = document.getElementById("customerId");
    const type = document.getElementById("type");
    const amount = document.getElementById("amount");
    const timeRelative = document.getElementById("timeRelative");
    const datePurchase = document.getElementById("datePurchase");
    const price = document.getElementById("price");
    const change = document.getElementById("change");
    const pay = document.getElementById("pay");
    const paymentMethod = document.getElementById("paymentMethod");

    if (data.type === "Listrik") {
        setImage(
            "https://ifoxsoft.com/wp-content/uploads/2022/10/Logo-Listrik-Pintar-PNG-%E2%80%93-ifoxsoft.com_.webp"
        );
    } else if (data.type === "Air") {
        setImage(
            "https://img.antaranews.com/cache/800x533/2017/07/20170703logo-pdam-001ilustrasi1.jpg"
        );
    } else if (data.type === "Internet") {
        setImage("https://indihome.co.id/images/logo_indiHome.png");
    }

    namaPelanggan.textContent = data.name;
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

function setImage(url) {
    const image = document.getElementById("image");
    image.setAttribute("src", url);
    image.setAttribute("width", "100%");
}
