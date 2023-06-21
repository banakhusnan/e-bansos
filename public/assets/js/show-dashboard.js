$.ajax({
    url: "/admin/chart",
    method: "GET",
    success: (res) => {
        console.log(res.data);
        showDataStatisctic(res.data);
        chart(res.data);
    },
    error: () => {},
});

function chart(data) {
    let cardColor = config.colors.white;
    let headingColor = config.colors.headingColor;
    let axisColor = config.colors.axisColor;

    // Ubah tipe data string menjadi integer
    let amounts = [];
    data.amount.forEach((i) => amounts.push(parseInt(i)));

    // Mengubah bahasa
    const translatedArray = data.typePayment.map((element) => {
        switch (element) {
            case "electricity":
                return "listrik";
            case "water":
                return "air";
            default:
                return element;
        }
    });

    const chartOrderStatistics = document.querySelector("#statisticsChart"),
        orderChartConfig = {
            chart: {
                height: 165,
                width: 130,
                type: "donut",
            },
            labels: translatedArray,
            series: amounts,
            colors: [
                config.colors.warning,
                config.colors.primary,
                config.colors.danger,
            ],
            stroke: {
                width: 5,
                colors: cardColor,
            },
            dataLabels: {
                enabled: false,
                formatter: function (val, opt) {
                    return parseInt(val) + "%";
                },
            },
            legend: {
                show: false,
            },
            grid: {
                padding: {
                    top: 0,
                    bottom: 0,
                    right: 15,
                },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "65%",
                        labels: {
                            show: true,
                            value: {
                                fontSize: "1rem",
                                fontFamily: "Public Sans",
                                color: headingColor,
                                offsetY: -15,
                                formatter: function (val) {
                                    const totalData = amounts.reduce(
                                        (a, b) => a + b,
                                        0
                                    );
                                    const result = (val / totalData) * 100;
                                    return result.toFixed(2) + "%";
                                },
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: "Public Sans",
                            },
                            total: {
                                show: true,
                                fontSize: "0.9rem",
                                color: axisColor,
                                formatter: function (w) {
                                    return "100%";
                                },
                            },
                        },
                    },
                },
            },
        };
    if (
        typeof chartOrderStatistics !== undefined &&
        chartOrderStatistics !== null
    ) {
        const statisticsChart = new ApexCharts(
            chartOrderStatistics,
            orderChartConfig
        );
        statisticsChart.render();
    }
}

function showDataStatisctic(data) {
    const totalOrders = document.getElementById("totalOrders");
    const totalSales = document.getElementById("totalSales");
    const totalPriceElectricity = document.getElementById(
        "totalPriceElectricity"
    );
    const totalPriceWater = document.getElementById("totalPriceWater");
    const totalPriceInternet = document.getElementById("totalPriceInternet");

    // Jumlahkan semua data pada index array
    let amount = null;
    data.amount.forEach((data) => {
        amount += parseInt(data);
    });

    totalOrders.textContent = amount;
    totalSales.textContent = data.totalSales;
    totalPriceElectricity.textContent = formatCurrency(
        data.totalPriceElectricity
    );
    totalPriceWater.textContent = formatCurrency(data.totalPriceWater);
    totalPriceInternet.textContent = formatCurrency(data.totalPriceInternet);
}

function formatCurrency(money) {
    return (money / 1000).toLocaleString("en-US") + "K";
}
