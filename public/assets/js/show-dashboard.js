$.ajax({
    url: "/admin/chart",
    method: "GET",
    success: (res) => {
        showDataStatisctic(res.data.donut);
        donutChart(res.data.donut);
        areaChart(res.data.area);
        showDataAreaChart(res.data.area);

        const totalUsers = document.getElementById("totalUsers");
        const totalRegistered = document.getElementById("totalRegistered");
        const totalTransaction = document.getElementById("totalTransaction");
        totalUsers.textContent = res.data.totalUsers;
        totalRegistered.textContent = res.data.totalRegistered;
        totalTransaction.textContent = res.data.totalTransaction;
    },
    error: () => {},
});

function areaChart(data) {
    borderColor = config.colors.borderColor;

    const incomeChartEl = document.querySelector("#bantuanChart"),
        incomeChartConfig = {
            chart: {
                stacked: true,
                type: "bar",
            },
            labels: ["Mei", "Juni", "juli", "Agustus"],
            series: [
                {
                    data: [
                        {
                            x: "ok",
                            y: data.monthlyTotals[5],
                        },
                        {
                            x: "ok",
                            y: data.monthlyTotals[6],
                            fillColor: "#696cff",
                        },
                        {
                            x: "ok",
                            y: data.monthlyTotals[7],
                        },
                        {
                            x: "ok",
                            y: data.monthlyTotals[8],
                        },
                    ],
                },
            ],
            legend: {
                show: false,
            },
            plotOptions: {
                bar: {
                    distributed: true,
                    labels: {
                        show: false,
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
        };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
        const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
        incomeChart.render();
    }
}

function donutChart(data) {
    let cardColor = config.colors.white;
    let headingColor = config.colors.headingColor;
    let axisColor = config.colors.axisColor;

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
            series: data.amount,
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
                                    const totalData = data.amount.reduce(
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

function showDataAreaChart(data) {
    const totalBansosFund = document.getElementById("totalBansosFund");
    const approvedTotal = document.getElementById("approvedTotal");

    totalBansosFund.textContent = formatRupiah(data.totalBansosFund);
    approvedTotal.textContent = data.approvedTotal;
}

function formatCurrency(money) {
    return (money / 1000).toLocaleString("en-US") + "K";
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
