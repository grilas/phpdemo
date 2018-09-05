option = {
    xAxis: {
        type: 'category',
        boundaryGap: false,
        //data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
    },
    yAxis: {
        type: 'value',
        show:false
    },
    series: [{
        data: [80, 75, 60, 90, 100, 90, 79,78,90,73,99],
        type: 'line',
        itemStyle:{color:'#2cb58e'},
        symbolSize:8,
        lineStyle: {color:'#2cb58e'},
        areaStyle: {
            color: {
                type: 'linear',
                x: 0,
                y: 0,
                x2: 0,
                y2: 1,
                colorStops: [{
                    offset: 0, color: '#9cffe3' // 0% 处的颜色
                }, {
                    offset: 1, color: '#2cb58e' // 100% 处的颜色
                }],
                globalCoord: false // 缺省为 false
            } 
            
        },
        
    }]
};