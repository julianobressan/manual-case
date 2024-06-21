<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Questions\DataTransferObjects\CreateQuestionDTO;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use Illuminate\Support\Facades\DB;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class CreateQuestionAction implements ActionInterface
{
    /**
     * @param CreateQuestionDTO $dto
     */
    public function __construct(private readonly CreateQuestionDTO $dto) {}

    /**
     * @inheritDoc
     * @throws AppException
     */
    public function execute(): Question
    {
        try {
            DB::beginTransaction();
            $order = Question::max('order') + 1;
            $question = Question::create([...(array)$this->dto, 'order' => $order]);
            foreach ($this->dto->answers as $answer) {
                Answer::create([...$answer, 'question_id' => $question->id]);
            }
            DB::commit();
            return $question;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new AppException($e->getMessage(), previous: $e);
        }
    }
}
