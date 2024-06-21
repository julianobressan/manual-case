<?php

namespace App\Modules\Questions\Actions\Answer;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\CreateAnswerDTO;
use App\Modules\Questions\Entities\Answer;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class CreateAnswerAction implements ActionInterface
{
    /**
     * @param CreateAnswerDTO $dto
     */
    public function __construct(private readonly CreateAnswerDTO $dto) {}

    /**
     * @inheritDoc
     */
    public function execute(): Answer
    {
        $order = Answer::where('question_id', $this->dto->question_id)->max('order') + 1;
        return Answer::create([...(array)$this->dto, 'order' => $order]);
    }
}
