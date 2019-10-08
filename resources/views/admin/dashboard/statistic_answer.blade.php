<script type="text/javascript">
    var analytics = <?php echo $designation;?>
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawchart);
    function drawchart(){
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
            title:'No of Premium and Free Users',
            colors: ['blue','yellow', 'blue'],
        };
        var chart = new google.visualization.BarChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
    }
    var analytics2 = <?php echo $date;?>
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawchart2);
    function drawchart2(){
        var data = google.visualization.arrayToDataTable(analytics2);
        var options = {
            title:'No of Vistors on Date',
            colors: ['red','yellow', 'blue'],
        };
        var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
        chart.draw(data, options);
    }
</script>
{{--<script>--}}
{{--var color = Chart.helpers.color;--}}
{{--var barChartData = {--}}
{{--labels: ['<?php--}}
{{--if(!empty($date_arr)){--}}
{{--implode($date_arr,"','");--}}
{{--}?>'],--}}
{{--datasets:[{--}}
{{--type: 'bar',--}}
{{--label: 'Visitor',--}}
{{--backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),--}}
{{--borderColor: window.chartColors.red,--}}
{{--data: [--}}
{{--<?php--}}
{{--if(!empty($int_visit)){--}}
{{--echo implode($int_visit,',');--}}
{{--}--}}
{{--?>],--}}
{{--}, {--}}
{{--type: 'bar',--}}
{{--label: "All User",--}}
{{--data: [<?php--}}
{{--if(!empty($all_arr)){--}}
{{--echo implode($all_arr,',');--}}
{{--}--}}
{{--?>],--}}
{{--backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),--}}
{{--borderColor: window.chartColors.blue,--}}
{{--}, {--}}
{{--type: 'bar',--}}
{{--label: "Free User",--}}
{{--data: [<?php--}}
{{--if(!empty($free_arr)){--}}
{{--echo implode($free_arr,',');--}}
{{--}--}}
{{--?>],--}}
{{--backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),--}}
{{--borderColor: window.chartColors.green,--}}
{{--},--}}
{{--{--}}
{{--type: 'bar',--}}
{{--label: "premium User",--}}
{{--data: [<?php--}}
{{--if(!empty($premium_arr)){--}}
{{--echo implode($premium_arr,',');--}}
{{--}--}}
{{--?>],--}}
{{--backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),--}}
{{--borderColor: window.chartColors.green,--}}
{{--}--}}
{{--]--}}
{{--};--}}
{{--var ctx = document.getElementById("canvas1").getContext("2d");--}}
{{--window.myBar = new Chart(ctx, {--}}
{{--type: 'bar',--}}
{{--data: barChartData,--}}
{{--options: {--}}
{{--responsive: true,--}}
{{--title: {--}}
{{--display: true,--}}
{{--text: 'Chart.js Combo Bar Line Chart'--}}
{{--},--}}
{{--}--}}
{{--});--}}
{{--/*    var ctx = document.getElementById("myChart").getContext('2d');*/--}}
{{--</script>--}}