<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\phpstudy\WWW\project\public/../application/index\view\index\welcome.html";i:1514900794;s:81:"E:\phpstudy\WWW\project\public/../application/index\view\public\header_layui.html";i:1514900796;s:79:"E:\phpstudy\WWW\project\public/../application/index\view\public\breadcrumb.html";i:1514900796;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>系统后台</title>
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_STATIC; ?>/pagelist.css" />
	<script   type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/layer-layui/layui-v2.2/layui.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_STATIC; ?>/lib/layer/2.1/layer.js"></script>
</head>
<script>
layui.use('element', function(){
});
</script>
<style type="text/css">
    .rulecheck{
        display: none;
    }
</style>
<body>

<style type="text/css">
.breadcrumb {
    background-color: #f5f5f5;
    padding: 0 20px;
}
.breadcrumb {
    border-bottom: 1px solid #e5e5e5;
    line-height: 39px;
    height: 39px;
    overflow: hidden;
    padding: 0 15px;
}
.breadcrumb .btn-color {
    color: #fff;
    background-color: #5eb95e;
    border-color: #5eb95e;
    float: right;
    margin-top: 5px;
}
</style>
<nav class="breadcrumb">
  <span class="layui-breadcrumb" lay-separator=">">
  <a href="#" ><i class="layui-icon " style="font-weight: 600;margin-right: 3px;">&#xe68e;</i>首页</a>
  <a><cite><?php echo $breadcrumb['0']; ?></cite></a>
  </span>
  <a href="javascript:location.replace(location.href);" class="layui-btn layui-btn-normal  layui-btn-sm btn-color" title="刷新"><i class="layui-icon" style="">&#x1002;</i></a>
</nav>
<script src="<?php echo ADMIN_STATIC; ?>/echats/echarts.js"></script>
<style type="text/css">
    .main{
        height:500px;
        border:1px solid #ccc;
        padding:10px;
       // margin-top:26px;
    }
    .title{
        text-align: center;
        margin-top:20px;
        font-size:17px;
        font-weight:600;

    }
</style>
    
  
    <div id="count" class="main"></div>
    <div class="title">当月每天工单数量与ICCID开卡对比图</div>
    <div id="main" class="main" style="margin-top:10px;"></div>
    <!-- <div id="mainMap" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
    <div id="mix1" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
    <div id="zero" style="height:500px;border:1px solid #ccc;padding:10px;"></div> -->
    <script type="text/javascript">
    require.config({
        paths: {
            echarts: '<?php echo ADMIN_STATIC; ?>/echats'
        }
    });
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            // 'echarts/chart/map',
            // 'echarts/chart/pie',
        ],
        function (ec) {
             //--- 折柱 ---
            var myChart = ec.init(document.getElementById('main'));
            myChart.setOption({
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['工单数量','ICCID数']
                },
                toolbox: {
                    show : true,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : [<?php echo $rdata['date']; ?>]
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                        splitArea : {show : true}
                    }
                ],
                series : [
                    {
                        name:'工单数量',
                        type:'bar',
                        data:[<?php echo $rdata['ocount']; ?>]
                    },
                    {
                        name:'ICCID数',
                        type:'bar',
                        data:[<?php echo $rdata['oicount']; ?>]
                    }
                ]
            });
            //---统计个数---
            var myCount = ec.init(document.getElementById('count'));
            myCount.setOption({
                title: {
                    x: 'center',
                    text: '今日工单录入数量对比图',
                    //subtext: '所有数汇总据',
                    //link: 'http://echarts.baidu.com/doc/example.html'
                },
                tooltip: {
                    trigger: 'item'
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataView: {show: true, readOnly: false},
                        restore: {show: true},
                        saveAsImage: {show: true}
                    }
                },
                calculable: true,
                grid: {
                    borderWidth: 0,
                    y: 80,
                    y2: 60
                },
                xAxis: [
                    {
                        type: 'category',
                        show: false,
                        data: [<?php echo $udata['real_name']; ?>]
                    }
                ],
                yAxis: [
                    {
                        type: 'value',
                        show: false
                    }
                ],
                series: [
                    {
                        name: '工单数量',
                        type: 'bar',
                        itemStyle: {
                            normal: {
                                color: function(params) {
                                    // build a color map as your need.
                                    var colorList = [
                                      '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                                       '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                                       '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0',
                                       '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
                                       '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
                                       '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0',
                                    ];
                                    return colorList[params.dataIndex]
                                },
                                label: {
                                    show: true,
                                    position: 'top',
                                    formatter: '{b}\n{c}'
                                }
                            }
                        },
                        data: [<?php echo $udata['count']; ?>],
                       
                    }
                ]
            });
            // --- 地图 ---
            // var myChart2 = ec.init(document.getElementById('mainMap'));
            // myChart2.setOption({
            //     tooltip : {
            //         trigger: 'item',
            //         formatter: '{b}'
            //     },
            //     series : [
            //         {
            //             name: '中国',
            //             type: 'map',
            //             mapType: 'china',
            //             selectedMode : 'multiple',
            //             itemStyle:{
            //                 normal:{label:{show:true}},
            //                 emphasis:{label:{show:true}}
            //             },
            //             data:[
            //                 {name:'广东',selected:true}
            //             ]
            //         }
            //     ]
            // });

            // //混合图形
            // var mix1 = ec.init(document.getElementById('mix1'));
            // mix1.setOption({
            //     tooltip : {
            //         trigger: 'axis'
            //     },
            //     toolbox: {
            //         show : true,
            //         feature : {
            //             mark : {show: true},
            //             dataView : {show: true, readOnly: false},
            //             magicType: {show: true, type: ['line', 'bar']},
            //             restore : {show: true},
            //             saveAsImage : {show: true}
            //         }
            //     },
            //     calculable : true,
            //     legend: {
            //         data:['蒸发量','降水量','平均温度']
            //     },
            //     xAxis : [
            //         {
            //             type : 'category',
            //             data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
            //         }
            //     ],
            //     yAxis : [
            //         {
            //             type : 'value',
            //             name : '水量',
            //             axisLabel : {
            //                 formatter: '{value} ml'
            //             }
            //         },
            //         {
            //             type : 'value',
            //             name : '温度',
            //             axisLabel : {
            //                 formatter: '{value} °C'
            //             }
            //         }
            //     ],
            //     series : [

            //         {
            //             name:'蒸发量',
            //             type:'bar',
            //             data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
            //         },
            //         {
            //             name:'降水量',
            //             type:'bar',
            //             data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            //         },
            //         {
            //             name:'平均温度',
            //             type:'line',
            //             yAxisIndex: 1,
            //             data:[2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            //         }
            //     ]
            // });
            //  //圆形图形
            // var zero = ec.init(document.getElementById('zero'));
            // zero.setOption({
            //     title : {
            //         text: '某站点用户访问来源',
            //         subtext: '纯属虚构',
            //         x:'center'
            //     },
            //     tooltip : {
            //         trigger: 'item',
            //         formatter: "{a} <br/>{b} : {c} ({d}%)"
            //     },
            //     legend: {
            //         orient : 'vertical',
            //         x : 'left',
            //         data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
            //     },
            //     toolbox: {
            //         show : true,
            //         feature : {
            //             mark : {show: true},
            //             dataView : {show: true, readOnly: false},
            //             magicType : {
            //                 show: true, 
            //                 type: ['pie', 'funnel'],
            //                 option: {
            //                     funnel: {
            //                         x: '25%',
            //                         width: '50%',
            //                         funnelAlign: 'left',
            //                         max: 1548
            //                     }
            //                 }
            //             },
            //             restore : {show: true},
            //             saveAsImage : {show: true}
            //         }
            //     },
            //     calculable : true,
            //     series : [
            //         {
            //             name:'访问来源',
            //             type:'pie',
            //             radius : '55%',
            //             center: ['50%', '60%'],
            //             data:[
            //                 {value:335, name:'直接访问'},
            //                 {value:310, name:'邮件营销'},
            //                 {value:234, name:'联盟广告'},
            //                 {value:135, name:'视频广告'},
            //                 {value:1548, name:'搜索引擎'}
            //             ]
            //         }
            //     ]
            // });

        }
    );
    </script>
</body>
</html>