<template>
    <pie-chart v-bind:data="data"></pie-chart>
</template>

<script>
import PieChart from './pieChart.vue';

export default {
    components: {
        pieChart: PieChart,
    },
    data() {
        return {
            data: biigle.$require('metrics.labelBotEventData'),
        };
    },
};
</script>
