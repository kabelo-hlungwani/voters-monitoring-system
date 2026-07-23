<?php
$chartLabels = (isset($partyCodes) && is_array($partyCodes)) ? $partyCodes : array();
$chartValues = (isset($voteTotals) && is_array($voteTotals)) ? $voteTotals : array();
?>

<section class="mx-auto max-w-7xl px-4 pb-14">
    <h2 class="vms-title text-2xl font-bold text-[#0b2a66] sm:text-3xl">Vote Statistics</h2>

    <div class="mt-6 grid gap-6 lg:grid-cols-2">
        <article class="vms-shadow rounded-2xl border border-blue-100 bg-white p-5">
            <h3 class="text-sm font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Bar Distribution</h3>
            <div class="chart-canvas mt-4">
                <canvas id="chartjs_bar"></canvas>
            </div>
        </article>

        <article class="vms-shadow rounded-2xl border border-blue-100 bg-white p-5">
            <h3 class="text-sm font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Pie Share</h3>
            <div id="piechart" class="chart-canvas mt-4"></div>
        </article>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    (function () {
        var labels = <?php echo json_encode($chartLabels); ?>;
        var values = <?php echo json_encode($chartValues); ?>;

        if (labels.length > 0 && document.getElementById('chartjs_bar')) {
            var ctx = document.getElementById('chartjs_bar').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        backgroundColor: ['#1a56d6', '#2563eb', '#0ea5e9', '#38bdf8', '#0b2a66', '#123f9f', '#60a5fa'],
                        data: values
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { display: false }
                }
            });
        }

        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(function drawChart() {
            if (!document.getElementById('piechart')) {
                return;
            }

            var rows = [['Party', 'Votes']];
            for (var i = 0; i < labels.length; i += 1) {
                rows.push([labels[i], Number(values[i])]);
            }

            if (rows.length === 1) {
                rows.push(['No Data', 1]);
            }

            var data = google.visualization.arrayToDataTable(rows);
            var options = {
                pieHole: 0.25,
                colors: ['#1a56d6', '#2563eb', '#0ea5e9', '#38bdf8', '#0b2a66', '#123f9f', '#60a5fa'],
                backgroundColor: 'transparent',
                legend: { textStyle: { color: '#1e3a8a', fontSize: 12 } }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        });
    })();
</script>
