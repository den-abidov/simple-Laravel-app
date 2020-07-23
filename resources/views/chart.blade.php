<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Таблица</title>
</head>
<body>
<main>
    <h1 class="mt-3 text-center">Таблица</h1>

    <!-- Chart's container -->
    <div id="chart1" style="height: 300px;"></div>
    <br/>
    <div id="chart2" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart1 = new Chartisan({
            el: '#chart1',
            url: "@chart('kits_chart')",
            hooks: new ChartisanHooks()
                .legend()
                .colors()
                .datasets(['line', 'line', 'line'])
                .tooltip(),
        });

        const chart2 = new Chartisan({
            el: '#chart2',
            url: "@chart('kits_chart')",
            hooks: new ChartisanHooks()
                .legend()
                .colors()
                .datasets(['line', 'line', 'line'])
                .tooltip(),
        });
    </script>
</main>
</body>
</html>
