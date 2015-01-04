
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['', 'Визиты', 'Просмотры'],

<?php $PHPdatabase = new PHPdatabase; $PHPdatabase->connect($arDataBase);
$day = date('Ymd'); $sql= mysql_query("SELECT * FROM phpframecounter_stat_  ORDER BY id   "); while ($valStat = mysql_fetch_array($sql)){?>
['',  <?=$valStat[_count]?>,      <?=$valStat[_count_all]?>],
<?}?>

        ]);

        var options = {
          title: 'Сводка посещений',
          hAxis: {title: '',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>


<?$sql= mysql_query("SELECT * FROM phpframecounter_stat_ WHERE _day = '$day'  ORDER BY id   "); $valStat = mysql_fetch_array($sql);?>

     
<table class="table_count">
<tr>
<td class="today">Сегодня:</td>
<td></td>
</tr>
	<tr>
		<td>
			Визиты
		</td>
		<td class="numb_count">
			<?=$valStat[_count]?>
		</td>
	</tr>
		<tr>
		<td>
			Просмотры
		</td>
		<td class="numb_count">
			<?=$valStat[_count_all]?>
		</td>
	</tr>
</table>