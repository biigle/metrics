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

    /**
     * Get all LabelBOT event types.
     *
     * @return array<int, self>
     */
    public static function labelBotCases(): array
    {
        return [
            self::LabelBotChoseLabel1,
            self::LabelBotChoseLabel2,
            self::LabelBotChoseLabel3,
            self::LabelBotChoseLabelOther,
            self::LabelBotDismissed,
        ];
    }

    /**
     * Get the human-readable event type label.
     */
    public function label(): string
    {
        return match ($this) {
            self::LabelBotChoseLabel1 => 'Chose label 1',
            self::LabelBotChoseLabel2 => 'Chose label 2',
            self::LabelBotChoseLabel3 => 'Chose label 3',
            self::LabelBotChoseLabelOther => 'Chose other label',
            self::LabelBotDismissed => 'Dismissed',
        };
    }
}
