import {Events} from './import.js';
import EventsApi from './api/events.js';

Events.on('labelbot.chose_label_1', () => EventsApi.save({type: 'labelbot_chose_label_1'}));
Events.on('labelbot.chose_label_2', () => EventsApi.save({type: 'labelbot_chose_label_2'}));
Events.on('labelbot.chose_label_3', () => EventsApi.save({type: 'labelbot_chose_label_3'}));
Events.on('labelbot.chose_label_other', () => EventsApi.save({type: 'labelbot_chose_label_other'}));
Events.on('labelbot.dismissed', () => EventsApi.save({type: 'labelbot_dismissed'}));

Events.on('ask-biigle.asked_question', () => EventsApi.save({type: 'ask_biigle_asked_question'}));
Events.on('ask-biigle.reported_answer', () => EventsApi.save({type: 'ask_biigle_reported_answer'}));
