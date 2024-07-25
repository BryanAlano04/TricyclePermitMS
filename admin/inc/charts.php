<main>
    <div class="head-title">
        <div class="left">
            <h1>Charts</h1>
        </div>
    </div>
        <li>
            <div class="chart-container">
                <canvas id="barChart1"></canvas>
            </div>
        </li>
        <li>
            <div class="chart-container">
                <canvas id="barChart2"></canvas>
            </div>
        </li>
        <li>
            <div class="chart-container">
                <canvas id="lineChart"></canvas>
            </div>
        </li>
        <li>
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>
        </li>
</main>

<script>
    // Updated weekly data for bar charts
    const barChartData1 = {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        datasets: [{
            label: 'Approved Permits',
            backgroundColor: 'rgba(219, 80, 74, 0.2)', // --red with opacity
            borderColor: 'rgba(219, 80, 74, 1)', // --red
            borderWidth: 1,
            data: [20, 15, 10, 20], // example data
        }]
    };

    const barChartData2 = {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        datasets: [{
            label: 'Pending Permits',
            backgroundColor: 'rgba(254, 206, 38, 0.2)', // --yellow with opacity
            borderColor: 'rgba(254, 206, 38, 1)', // --yellow
            borderWidth: 1,
            data: [5, 10, 8, 15], // example data
        }]
    };

    // Updated daily data for line chart
    const lineChartData = {
        labels: Array.from({length: 31}, (_, i) => i + 1), // Days 1 to 31
        datasets: [{
            label: 'Total Revenue',
            backgroundColor: 'rgba(60, 145, 230, 0.2)', // --blue with opacity
            borderColor: 'rgba(60, 145, 230, 1)',
            data: Array.from({length: 31}, () => Math.floor(Math.random() * 100)), // example data
            fill: false,
        }]
    };

    // Pie chart data
    const pieChartData = {
        labels: ['Red Permit (57%)', 'Green Permit (43%)'],
        datasets: [{
            label: 'Permit Distribution',
            data: [57, 43],
            backgroundColor: [
                'rgba(219, 80, 74, 0.6)', // --red with opacity
                'rgba(60, 179, 113, 0.6)' // --green with opacity
            ],
            borderColor: [
                'rgba(219, 80, 74, 1)', // --red
                'rgba(60, 179, 113, 1)' // --green
            ],
            borderWidth: 1
        }]
    };

    window.onload = function() {
        // Bar charts
        const ctx1 = document.getElementById('barChart1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: barChartData1,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: '#000',
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: '#000',
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: '#000',
                        }
                    }]
                }
            }
        });

        const ctx2 = document.getElementById('barChart2').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: barChartData2,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: '#000',
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: '#000',
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: '#000',
                        }
                    }]
                }
            }
        });

        // Line chart
        const ctx3 = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: lineChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: '#000',
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: '#000',
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: '#000',
                        }
                    }]
                }
            }
        });

        // Pie chart
        const ctx4 = document.getElementById('pieChart').getContext('2d');
        new Chart(ctx4, {
            type: 'pie',
            data: pieChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                    labels: {
                        fontColor: '#000',
                    }
                }
            }
        });
    };
</script>
