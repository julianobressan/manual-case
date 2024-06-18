<?php

namespace App\Modules\Questions\Actions\Questions;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class AnswerQuestionAction implements ActionInterface
{
    public function __construct(private readonly Question $question, private readonly Answer $answer)
    {}

    /**
     * @throws AppException
     */
    public function execute(): void
    {;
        if ($this->answer->question_id !== $this->question->id) {
            throw new AppException('The answer do not belongs to the provided question.');
        }
    }
}
