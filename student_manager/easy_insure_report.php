<?php include 'view/easy_insure_header.php'; ?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "Customers by Plan"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                showInLegend: "false",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "##0",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });


        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "Customers by Value"
            },
            subtitles: [{
                text: ""
            }],
            data: [{
                type: "pie",
                showInLegend: "false",
                legendText: "{label}",
                indexLabelFontSize: 16,
                indexLabel: "{label} - #percent%",
                yValueFormatString: "##0",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        chart2.render();

    }
</script>
<main>
    <div style="height:50px"></div>
    <table>
        <tr>
            <td>
                <div id="chartContainer" style="height: 370px; background-color:orange"></div>
            </td>
            <td>
                <div id="chartContainer2" style="height: 370px;background-color:orange"></div>
            </td>
        </tr>
    </table>

    <div style="height:100px"><br></div>
    <table>
        <tr>
            <td>
                <h2>Total Customers</h2>
            </td>
            <td>
                <h2>Total Waiting</h2>
            </td>
            <td>
                <h2>Total Monthly Premiums</h2>
            </td>
        </tr>
        <tr>
            <td class="rpttotals"><?php echo $cust; ?></td>
            <td class="rpttotals"><?php echo $wait; ?></td>
            <td class="rpttotals"><?php echo '$';
                                    echo number_format($total, 2); ?></td>
        </tr>
    </table>
</main>
<?php include 'view/easy_insure_footer.php'; ?>