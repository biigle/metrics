<template>
    <span ref="root" class="metrics-pie-chart"></span>
</template>

<script>
import {use, init} from 'echarts/core';
import {TooltipComponent, LegendComponent} from 'echarts/components';
import {PieChart} from 'echarts/charts';
import {LabelLayout} from 'echarts/features';
import {SVGRenderer} from 'echarts/renderers';

use([
    TooltipComponent,
    LegendComponent,
    PieChart,
    LabelLayout,
    SVGRenderer,
]);

export default {
    props: {
        data: {
            required: true,
            type: Array,
        },
    },
    mounted() {
        const chart = init(this.$refs.root, 'dark', {renderer: 'svg'});
        chart.setOption({
            backgroundColor: 'transparent',
            tooltip: {
                trigger: 'item',
            },
            legend: {
                orient: 'vertical',
                right: 0,
                top: 'middle',
            },
            series: [
                {
                    name: 'LabelBOT events',
                    type: 'pie',
                    radius: ['35%', '70%'],
                    avoidLabelOverlap: true,
                    right: '30%',
                    data: this.data,
                    label: {
                        formatter: '{b}: {d}%',
                    },
                },
            ],
        });
    },
};
</script>

<style scoped>
.metrics-pie-chart {
    display: block;
    height: 320px;
}
</style>
