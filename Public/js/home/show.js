var chart_arr = $(".chart");

// 初始化图表
var echart_arr = new Array();
for (var i = 0; i < chart_arr.length; i++) {
	var each_id = chart_arr.eq(i).attr('id');
	var myChart = echarts.init(document.getElementById(each_id));
	echart_arr.push(myChart);
	myChart.showLoading();
	var option = {
		title: {
			show: true,
			text: '班委换届投票',
	        subtext: '投票数据来自后台自动生成'
	    },
	    tooltip : {
	        trigger: 'axis',
	        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
	            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
	        }
	    },
	    grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '3%',
	        containLabel: true
	    },
	    yAxis:  {
	        type: 'value'
	    },
	    xAxis: {
	        type: 'category',
	        data: []
	    },
	    color: ['#818181'],
	    series: [
	        {
	            name: '票数',
	            type: 'bar',
	            label: {
	                normal: {
	                    show: true,
	                    position: 'insideRight',
	                }
	            },
	            data: []
	        }
	    ]
	};
	myChart.hideLoading();
	myChart.setOption(option);
}

// 异步更新
setInterval(function() {
	$.ajax({
	    url: "{:U('ajax')}",
	    data: {
	    },
	    type: 'post',
	    cache: false,
	    dataType: 'json',
		success: function(data) {
			//var data = eval(data);
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				var every_section = data[i];	// 数据
				var chart_id = chart_arr.eq(i).attr('id');	// 表格ID
				var myChart = echart_arr[i];	// 表格对应的echart对象

				var option = {
				    title: {
				        text: '班委换届投票【' + every_section.name + '】',
				    },
				    xAxis: {
				        data: []
				    },
				    series: [
				        {
				            data: []
				        }
				    ]
				};

				var totalPerson = every_section['count'];
				for (var j = 0; j < totalPerson; j++) {
					var everyPerson = every_section[j];
					var xdata = {
						value: everyPerson['name'],
						textStyle: {
							fontSize: 18
						}
					};
					option.xAxis.data.push(xdata);
					if (j < 2) {
						var seriesdata = {
							value: everyPerson['num'],
							label: {
								normal: {
									position: 'inside',
									textStyle: {
										fontSize: 18
									}
								},
								emphasis: {
									position: 'inside',
									textStyle: {
										fontSize: 18
									}
								}
							},
							itemStyle: {
								normal: {
									color: '#c23531'
								}
							}
						};
					} else {
						var seriesdata = {
							value: everyPerson['num'],
							label: {
								normal: {
									position: 'inside',
									textStyle: {
										fontSize: 18
									}
								},
								emphasis: {
									position: 'inside',
									textStyle: {
										fontSize: 18
									}
								}
							}
						};
					}
					
					option.series[0].data.push(seriesdata);
					//
				}
				myChart.setOption(option);
			}
		},
		error: function() {
			console.log("ajax错误");
		}
	});
}, 5000);