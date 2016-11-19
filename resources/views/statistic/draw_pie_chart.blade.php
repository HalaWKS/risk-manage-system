<div style="height: 50%; margin: 0">
    <div id="pie_chart" style="height: 100%"></div>
    <script type="text/javascript" src="js/echarts.common.min.js"></script>
    <script type="text/javascript">
        var dom = document.getElementById("pie_chart");
        var myChart = echarts.init(dom);
        var app = {};
        <?php
        $type_names = [];
        $data = [];
        foreach($result as $value)
        {
            array_push($type_names, $value['type']);
            array_push($data, ['value'=>$value['all'], 'name'=>$value['type']]);
        }
        ?>
        option = null;
        option = {
            title : {
                text: '各类型风险比例',
                x: 'center'
            },
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: <?php echo json_encode($type_names) ?>
            },
            series : [
                {
                    name: '访问来源',
                    type: 'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data: <?php echo json_encode($data) ?>,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };

        app.currentIndex = -1;

        ;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    </script>
</div>