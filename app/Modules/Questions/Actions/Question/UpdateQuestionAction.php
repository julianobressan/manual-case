<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\UpdateQuestionDTO;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class UpdateQuestionAction implements ActionInterface
{
    /**
     * @param UpdateQuestionDTO $dto
     */
    public function __construct(private readonly UpdateQuestionDTO $dto) {}

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->dto->question->query = $this->dto->query;
        $this->dto->question->save();
    }
}
