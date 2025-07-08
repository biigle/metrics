<?php


namespace Biigle\Modules\Metrics\Enums;

enum EventType: string
{
    /**
     * The user chose/confirmed the first label suggested by LabelBOT.
     */
    case LabelBotChoseLabel1 = 'labelbot_chose_label_1';

    /**
     * The user chose the second label suggested by LabelBOT.
     */
    case LabelBotChoseLabel2 = 'labelbot_chose_label_2';

    /**
     * The user chose the third label suggested by LabelBOT.
     */
    case LabelBotChoseLabel3 = 'labelbot_chose_label_3';

    /**
     * The user chose none of the first three labels suggested by LabelBOT but chose a
     * different label via the typeahead,
     */
    case LabelBotChoseLabelOther = 'labelbot_chose_label_other';

    /**
     * The user deleted the new annotation from the LabelBOT popup, supposedly because
     * none of the LabelBOT suggestions were correct.
     */
    case LabelBotDismissed = 'labelbot_dismissed';
}
