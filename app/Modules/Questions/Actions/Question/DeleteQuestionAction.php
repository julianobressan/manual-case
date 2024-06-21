<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class DeleteQuestionAction implements ActionInterface
{
    /**
     * @param Question $question
     */
    public function __construct(private readonly Question $question) {}

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->question->delete();
    }
}
