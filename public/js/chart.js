const totalResponKorban =
    korbanSangatTinggi + korbanTinggi + korbanSedang + korbanRendah;
const totalResponPelaku =
    pelakuSangatTinggi + pelakuTinggi + pelakuSedang + pelakuRendah;

if (totalResponKorban != 0 || totalResponPelaku != 0) {
    const persenKorbanSangatTinggi =
        (korbanSangatTinggi / totalResponKorban) * 100;
    const persenKorbanTinggi = (korbanTinggi / totalResponKorban) * 100;
    const persenKorbanSedang = (korbanSedang / totalResponKorban) * 100;
    const persenKorbanRendah = (korbanRendah / totalResponKorban) * 100;

    const persenPelakuSangatTinggi =
        (pelakuSangatTinggi / totalResponPelaku) * 100;
    const persenPelakuTinggi = (pelakuTinggi / totalResponPelaku) * 100;
    const persenPelakuSedang = (pelakuSedang / totalResponPelaku) * 100;
    const persenPelakuRendah = (pelakuRendah / totalResponPelaku) * 100;

    window.addEventListener("load", function () {
        const getChartOptions = () => {
            return {
                series: [
                    persenKorbanSangatTinggi,
                    persenKorbanTinggi,
                    persenKorbanSedang,
                    persenKorbanRendah,
                ],
                colors: ["#ef4444", "#f97316", "#facc15", "#22c55e"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25,
                        },
                    },
                },
                labels: ["Sangat Tinggi", "Tinggi", "Sedang", "Rendah"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%";
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%";
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            };
        };
        if (
            document.getElementById("pie-chart") &&
            typeof ApexCharts !== "undefined"
        ) {
            const chart = new ApexCharts(
                document.getElementById("pie-chart"),
                getChartOptions()
            );
            chart.render();
        }
    });

    window.addEventListener("load", function () {
        const getChartOptions = () => {
            return {
                series: [
                    persenPelakuSangatTinggi,
                    persenPelakuTinggi,
                    persenPelakuSedang,
                    persenPelakuRendah,
                ],
                colors: ["#ef4444", "#f97316", "#facc15", "#22c55e"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25,
                        },
                    },
                },
                labels: ["Sangat Tinggi", "Tinggi", "Sedang", "Rendah"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%";
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function (value) {
                            return value + "%";
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            };
        };

        if (
            document.getElementById("pie-chart1") &&
            typeof ApexCharts !== "undefined"
        ) {
            const chart = new ApexCharts(
                document.getElementById("pie-chart1"),
                getChartOptions()
            );
            chart.render();
        }
    });

    window.addEventListener("load", function () {
        let dataTinggi = [];
        tipePelaku.forEach((element) => {
            dataTinggi.push(element.jawaban_count);
        });
        const options = {
            colors: ["#FDBA8C"],
            series: [
                {
                    name: "Tinggi",
                    color: "#f87171",
                    data: dataTinggi.map((value, index) => ({
                        x: `Soal ${index + 1}`, // Menggunakan data soal yang sesuai
                        y: value,
                    })),
                },
            ],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14,
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass:
                            "text-xs font-normal fill-gray-500 dark:fill-gray-400",
                    },
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        };

        if (
            document.getElementById("column-chart") &&
            typeof ApexCharts !== "undefined"
        ) {
            const chart = new ApexCharts(
                document.getElementById("column-chart"),
                options
            );
            chart.render();
        }
    });
    // ApexCharts options and config
} else {
    const chart = document.getElementById("pie-chart");
    const chart2 = document.getElementById("pie-chart1");
    const chart3 = document.getElementById("column-chart");

    chart.innerHTML = "Belum Ada Data";
    chart2.innerHTML = "Belum Ada Data";
    chart3.innerHTML = "Belum Ada Data";
}
