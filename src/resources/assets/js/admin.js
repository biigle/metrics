import {createApp} from 'vue';
import PieChart from './components/pieChart.vue';

const root = document.getElementById('metrics-labelbot-events');

if (root) {
    createApp({
        components: {
            pieChart: PieChart,
        },
        data() {
            return {
                data: biigle.$require('metrics.labelBotEventData'),
            };
        },
    }).mount(root);
}
