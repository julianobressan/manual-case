<?php

namespace App\Modules\Questions\Actions\Answers;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\DeleteAnswerDTO;
use App\Modules\Questions\Entities\Answer;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class DeleteAnswerAction implements ActionInterface
{
    /**
     * @param DeleteAnswerDTO $dto
     */
    public function __construct(private readonly DeleteAnswerDTO $dto) {}

    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->dto->answer->delete();
    }
}
