let totalNominal = 0;
let selectedCard = null;

function selectCardElectricity(card, value) {
    // Selected
    if (selectedCard) {
        selectedCard.children[0].classList.remove("bg-secondary", "text-white");
    }
    selectedCard = card;
    selectedCard.children[0].classList.add("bg-secondary", "text-white");

    // Tambah nilai pada tag input
    const nominalInput = document.querySelector('[name="nominalElectricity"]');
    nominalInput.value = value;

    // Tambah format Rupiah
    const formatter = switchToRupiah(value);

    // Tampilkan nominal
    const inputTotalNominal = document.getElementById(
        "totalNominalElectricity"
    );
    inputTotalNominal.textContent = formatter;
}

function selectCardWater(card, value) {
    // Selected
    if (selectedCard) {
        selectedCard.children[0].classList.remove("bg-secondary", "text-white");
    }
    selectedCard = card;
    selectedCard.children[0].classList.add("bg-secondary", "text-white");

    // Tambah nilai pada tag input
    const nominalInput = document.querySelector('[name="nominalWater"]');
    nominalInput.value = value;

    // Tambah format Rupiah
    const formatter = switchToRupiah(value);

    // Tampilkan nominal
    const inputTotalNominal = document.getElementById("totalNominalWater");
    inputTotalNominal.textContent = formatter;
}

function switchToRupiah(number) {
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
