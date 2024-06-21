<?php

namespace App\Modules\Questions\Actions\Answer;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\UpdateAnswerDTO;
use App\Modules\Questions\Entities\Answer;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class UpdateAnswerAction implements ActionInterface
{
    /**
     * @param UpdateAnswerDTO $dto
     * @param Answer $answer
     */
    public function __construct(private readonly UpdateAnswerDTO $dto, private readonly Answer $answer) {}

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->answer->statement = $this->dto->statement;
        $this->answer->next_question_id = $this->dto->next_question_id;
        // TODO: Needs to update order and next_question as well
        $this->answer->save();
    }
}
