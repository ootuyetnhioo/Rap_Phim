@extends('admin.layout.master')
<style>
    .table-responsive {
        overflow: hidden;
    }

</style>
@section('content')
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div id="columnchart_values" style="width: 900px;"></div>
@endsection
@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChartPie);
        google.charts.setOnLoadCallback(drawChartColumn);

        let orders = @json($orders);
        let arr1 = [];
        let allMonthMoney = [];
        let month = [];
        let totalMoney = 0;

        for (let i = 0; i < 12; i++) {
            for (let a = 0; a < orders.length; a++) {
                if ((orders[a]['ngay_ban'].slice(5, 7)) == i + 1) {
                    totalMoney += parseInt(orders[a]['tong_tien']);
                }
            }
            allMonthMoney[i] = totalMoney;
            totalMoney = 0;
        }
        arr1.push(["Element", "Density", {
            role: "style"
        }]);

        for (let i = 0; i < 12; i++) {
            arr1.push([(i + 1).toString(), allMonthMoney[i], 'red']);
        }
        console.log(allMonthMoney);
        console.log(orders);
        console.log(orders[5]['ngay_ban'].slice(5, 7));
        console.log(orders[5]['tong_tien']);

        function drawChartColumn() {
            var data = google.visualization.arrayToDataTable(arr1);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Doanh thu hàng tháng tính theo đồng",
                width: 1200,
                height: 800,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }

        let text = "";
        let count1 = 0;
        let sameKindOfFilms = "";
        let allMarker = "";
        let films = @json($films);
        let kindOfMovies = @json($kindOfMovies);
        let kindOfMovieCount = [];
        let kindOfMovie = [];
        for (let index = 0; index < kindOfMovies.length; index++) {
            for (let index2 = 0; index2 < films.length; index2++) {
                if (kindOfMovies[index]['id'] == films[index2]['loai_phim_id']) {
                    count1++;
                }
            }
            kindOfMovieCount[index] = count1;

            sameKindOfFilms += kindOfMovies[index]['ten'] + ': ' + count1 + " index: " + index + "<br>";
            count1 = 0;
        }

        for (let $i = 0; $i < kindOfMovies.length; $i++) {
            kindOfMovie[$i] = kindOfMovies[$i]['ten'];
        }
        let arr = [];
        arr.push(['Task', 'Hours per Day']);
        for ($i = 0; $i < films.length; $i++) {
            arr.push([kindOfMovie[$i], kindOfMovieCount[$i]]);
        }
        console.log(kindOfMovies);



        function drawChartPie() {
            let data = google.visualization.arrayToDataTable(arr);

            let options = {
                title: 'Thong ke the loai phim'
            };

            let chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
