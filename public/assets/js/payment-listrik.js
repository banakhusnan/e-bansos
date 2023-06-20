const nominal = document.querySelectorAll("#nominal");
let totalNominal = 0;
let selectedCard = null;

function selectCard(card, value) {
    if (selectedCard) {
        selectedCard.children[0].classList.remove("bg-secondary", "text-white");
    }
    selectedCard = card;
    selectedCard.children[0].classList.add("bg-secondary", "text-white");

    const formatter = switchToRupiah(value);

    const inputTotalNominal = document.getElementById("totalNominal");
    inputTotalNominal.textContent = formatter;
}

function switchToRupiah(number) {
    const nominalInput = document.querySelector('[name="nominal"]');
    nominalInput.value = number;

    let rupiah = number.toString();
    let thousandSeparator = ".";
    let rupiahSymbol = "Rp ";

    rupiah = rupiah.replace(/\D/g, "");
    rupiah = rupiah.replace(
        /(\d)(?=(\d{3})+(?!\d))/g,
        `$1${thousandSeparator}`
    );

    return rupiahSymbol + rupiah;
}
