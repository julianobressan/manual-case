<?php

namespace App\Modules\Questions\Actions\Answer;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\CreateAnswerProductIncludeDTO;
use App\Modules\Questions\Entities\Answer;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class CreateAnswerProductIncludeAction implements ActionInterface
{
    /**
     * @param CreateAnswerProductIncludeDTO $dto
     */
    public function __construct(private readonly CreateAnswerProductIncludeDTO $dto) {}

    /**
     * @inheritDoc
     */
    public function execute(): Answer
    {
        $this->dto->answer->productsToInclude()->attach($this->dto->product_id, ['exclude' => false]);
        $this->dto->answer->refresh();
        return $this->dto->answer;
    }
}
