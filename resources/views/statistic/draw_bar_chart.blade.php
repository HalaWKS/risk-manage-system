<div style="height: 50%; margin: 0">
    <div id="bar_chart" style="height: 100%"></div>
    <script type="text/javascript" src="js/echarts.common.min.js"></script>
    <script type="text/javascript">
        var dom = document.getElementById("bar_chart");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
                <?php
                $dataAxis_php = [];
                $data_php = [];
                $max = 0;
                foreach($result as $value)
                {
                    array_push($dataAxis_php, $value['type'].":$value[all]");
                    array_push($data_php, $value['all']);
                    if($max < $value['all'])
                    {
                        $max = $value['all'];
                    }
                }
                ?>
        var dataAxis = <?php echo json_encode($dataAxis_php) ?>;
        var data = <?php echo json_encode($data_php) ?>;

        var yMax = <?php echo json_encode(($max + 5)) ?>;;
        var dataShadow = [];

//        for (var i = 0; i < data.length; i++) {
//            dataShadow.push(yMax);
//        }
        var begin = <?php echo json_encode($begin)?>;
        var end   = <?php echo json_encode($end  )?>;
        option = {
            title: {
                text: '各类型风险',
                subtext: begin + ' ~ ' + end,
            },
            xAxis: {
                data: dataAxis,
                axisLabel: {
                    inside: true,
                    textStyle: {
                        color: '#000'
                    }
                },
                axisTick: {
                    show: false
                },
                axisLine: {
                    show: false
                },
                z: 10
            },
            yAxis: {
                axisLine: {
                    show: false
                },
                axisTick: {
                    show: false
                },
                axisLabel: {
                    textStyle: {
                        color: '#999'
                    }
                }
            },
            dataZoom: [
                {
                    type: 'inside'
                }
            ],
            series: [
                { // For shadow
                    type: 'bar',
                    itemStyle: {
                        normal: {color: 'rgba(0,0,0,0.05)'}
                    },
                    barGap:'-100%',
                    barCategoryGap:'40%',
                    data: dataShadow
                },
                {
                    type: 'bar',
                    itemStyle: {
                        normal: {
                            color: new echarts.graphic.LinearGradient(
                                    0, 0, 0, 1,
                                    [
                                        {offset: 0, color: '#83bff6'},
                                        {offset: 0.5, color: '#188df0'},
                                        {offset: 1, color: '#188df0'}
                                    ]
                            )
                        },
                        emphasis: {
                            color: new echarts.graphic.LinearGradient(
                                    0, 0, 0, 1,
                                    [
                                        {offset: 0, color: '#2378f7'},
                                        {offset: 0.7, color: '#2378f7'},
                                        {offset: 1, color: '#83bff6'}
                                    ]
                            )
                        }
                    },
                    data: data
                }
            ]
        };

        // Enable data zoom when user click bar.
        var zoomSize = 6;
        myChart.on('click', function (params) {
            console.log(dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)]);
            myChart.dispatchAction({
                type: 'dataZoom',
                startValue: dataAxis[Math.max(params.dataIndex - zoomSize / 2, 0)],
                endValue: dataAxis[Math.min(params.dataIndex + zoomSize / 2, data.length - 1)]
            });
        });;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    </script>
</div>