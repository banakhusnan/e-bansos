$.ajax({
    url: "/admin/chart",
    method: "GET",
    // dataType: 'json',
    success: (res) => {
        chart(res);
    },
    error: () => {},
});

function chart(data) {
    let cardColor = config.colors.white;
    let headingColor = config.colors.headingColor;
    let axisColor = config.colors.axisColor;
    let borderColor = config.colors.borderColor;

    const chartOrderStatistics = document.querySelector("#statisticsChart"),
        orderChartConfig = {
            chart: {
                height: 165,
                width: 130,
                type: "donut",
            },
            labels: data,
            series: [85, 15, 50],
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
                        size: "75%",
                        labels: {
                            show: true,
                            value: {
                                fontSize: "1.5rem",
                                fontFamily: "Public Sans",
                                color: headingColor,
                                offsetY: -15,
                                formatter: function (val) {
                                    return parseInt(val) + "%";
                                },
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: "Public Sans",
                            },
                            total: {
                                show: true,
                                fontSize: "0.8125rem",
                                color: axisColor,
                                // label: "Weekly",
                                formatter: function (w) {
                                    return "38%";
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
