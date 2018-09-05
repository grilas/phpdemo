option = {
    legend: {
        data:['邮件营销']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'邮件营销',
            type:'line',
            stack: '总量',
            symbol: 'none',
            itemStyle: {
                normal: {
                    areaStyle: {
                        // 区域图，纵向渐变填充
                        color :'#fdfdfd';
                    }
                }
            },
            data:[
                120, 132, 301, 134, 
                {value:90, symbol:'circle',symbolSize:5},
                230, 210
            ]
        }
    ]
};
                    