$.post({
    url: location.origin + '/Web/api',
    success: function (res) {
        let data = $.parseJSON(res)

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: data.statistik.tahun,
                datasets: [{
                    label: 'Data Stunting Tahun',
                    data: data.statistik,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }, {
                    label: 'Data Stunting Tahun',
                    data: data.statistik,
                    backgroundColor: [
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 3,
                    pointStyle: 'rectRot',
                    pointRadius: 5,
                    pointBorderColor: 'rgb(0, 0, 0)',
                    type: 'line'
                }]
            },
            options: {
                responsive: true,
                parsing: {
                    xAxisKey: 'tahun',
                    yAxisKey: 'jumlah'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                animations: {
                    y: {
                        easing: 'easeInOutElastic',
                        from: (ctx) => {
                            if (ctx.type === 'data') {
                                if (ctx.mode === 'default' && !ctx.dropped) {
                                    ctx.dropped = true;
                                    return 0;
                                }
                            }
                        }
                    }
                },
            }
        })

        function clickHandler(click) {
            const points = myChart.getElementsAtEventForMode(click, 'nearest', {
                intersect: true
            }, true)
            if (points.length) {
                const firstPoint = points[0]
                const label = myChart.data.labels[firstPoint.index]
                const value = myChart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index]

                $.post({
                    url: location.origin + '/web/api',
                    data: {
                        id: value.tahun
                    },
                    success: function (result) {
                        let hasil = $.parseJSON(result)
                        const newDataset = {
                            label: 'Jumlah Stunting Perdesa',
                            data: hasil.desa,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(54, 162, 235, 0.5)',
                                'rgba(255, 206, 86, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(153, 102, 255, 0.5)',
                                'rgba(255, 159, 64, 0.5)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWith: 1
                        }
                        const newDataset2 = {
                            label: 'Jumlah Stunting Perdesa',
                            data: hasil.desa,
                            backgroundColor: [
                                'rgba(0, 0, 0, 0.5)'
                            ],
                            borderColor: [
                                'rgba(0, 0, 0, 1)',
                            ],
                            borderWith: 1,
                            type: 'line'
                        }
                        if (value.nik !== undefined) {
                            myChart.data.datasets.splice(1, 1)
                            myChart.data.datasets.pop()
                            myChart.data.datasets.push(newDataset)
                            myChart.data.datasets.push(newDataset2)
                        } else {
                            // myChart.reset()
                            location.reload()
                        }
                        myChart.update()
                    }
                })

            }
        }
        ctx.onclick = clickHandler

    },
    error: function () {
        // alert("gagal")
    }
})