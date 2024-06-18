<?php

namespace App\Modules\Questions\DataTransferObjects;

use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;

class DeleteAnswerDTO
{

    /**
     * @throws ValidationException
     */
    public function __construct(Question $question, public readonly Answer $answer)
    {
        $this->validate($question, $answer);
    }

    /**
     * @throws ValidationException
     */
    private function validate(Question $question,  Answer $answer): void
    {
        if ($answer->question_id !== $question->id) {
            throw new ValidationException([
                'question_id' => [
                    'The provided answer does not belong to the provided question.'
                ]
            ]);
        }
    }
}
