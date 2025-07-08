import {Events} from './import.js';
import EventsApi from './api/events.js';

Events.on('labelbot.chose_label_1', () => EventsApi.save({type: 'labelbot_chose_label_1'}));
Events.on('labelbot.chose_label_2', () => EventsApi.save({type: 'labelbot_chose_label_2'}));
Events.on('labelbot.chose_label_3', () => EventsApi.save({type: 'labelbot_chose_label_3'}));
Events.on('labelbot.chose_label_other', () => EventsApi.save({type: 'labelbot_chose_label_other'}));
Events.on('labelbot.dismissed', () => EventsApi.save({type: 'labelbot_dismissed'}));
