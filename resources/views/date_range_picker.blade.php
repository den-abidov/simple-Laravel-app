<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Таблица</title>
</head>
<body>
<main>
    <h1 class="mt-3 text-center">Выбор даты</h1>

    <!-- HTML для Data Range Picker -->
    <div class="container">
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 50%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
    </div>

    <br/>
    <div class="container">
        <p>Дата начала : {{ $start_date }}</p>
        <p>Дата конца : {{ $end_date }}</p>
    </div>


    <!-- JS for Date Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">

        "use strict";
        //const axios = require('axios');

        // работа с Date Range Picker

        $(function() {


            let start = moment().subtract(29, "days");
            let end = moment();
            let dateFormat = "DD MMMM";//"YYYY-MM-D";

            let startDate = start.format(dateFormat);
            let endDate = end.format(dateFormat);
            $("#reportrange span").html(startDate + " - " + endDate);

            function cb(start, end)
            {
                // отформатированные значения
                let startDate = start.format(dateFormat);
                let endDate = end.format(dateFormat);
                $("#reportrange span").html(startDate + " - " + endDate);
                console.log("Начальная дата : "+startDate);
                console.log("Конечная дата : "+endDate);
                // window.location.href = '/date-range-picker?start_date='+startDate+'&end_date='+endDate;
                sendAxiosRequest();
            }

            $("#reportrange").daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    "Сегодня": [moment(), moment()],
                    "Вчера": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Последние 7 дней": [moment().subtract(6, "days"), moment()],
                    "Последние 30 дней": [moment().subtract(29, "days"), moment()],
                    "Этот месяц": [moment().startOf("month"), moment().endOf("month")],
                    "Прошлый месяц": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                }
            }, cb);

            cb(start, end);


        });
        function sendAxiosRequest()
        {
            axios.post('/date-selected')
                .then(function (response)
                {
                    // handle success
                    console.log(response);
                    console.log("Axios: Запрос успешно отправлен.");
                    //window.location.href = '/date-range-picker?start_date='+startDate+'&end_date='+endDate;
                })
                .catch(function (error)
                {
                    // handle error
                    console.log(error);
                })
                .then(function ()
                {
                    // always executed
                });
        }
    </script>
</main>
</body>
</html>
