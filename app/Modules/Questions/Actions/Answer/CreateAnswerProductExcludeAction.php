<?php

namespace App\Modules\Questions\Actions\Answer;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\DataTransferObjects\CreateAnswerProductExcludeDTO;
use App\Modules\Questions\Entities\Answer;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class CreateAnswerProductExcludeAction implements ActionInterface
{
    /**
     * @param CreateAnswerProductExcludeDTO $dto
     */
    public function __construct(private readonly CreateAnswerProductExcludeDTO $dto) {}

    /**
     * @inheritDoc
     */
    public function execute(): Answer
    {
        $this->dto->answer->productsToInclude()->attach($this->dto->product_id, ['exclude' => true]);
        $this->dto->answer->refresh();
        return $this->dto->answer;
    }
}
