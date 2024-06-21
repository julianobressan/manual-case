<?php

namespace App\Modules\Questions\Http\Resources;

use App\Modules\Products\Entities\Product;
use App\Modules\Questions\Entities\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Question $question
 * @property Question $nextQuestion
 * @property int $id
 * @property string $statement
 * @property int $order
 * @property Product[] $products
 */
class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $nextQuestionJson = [];
        if ($this->nextQuestion) {
            $answers = [];
            foreach ($this->nextQuestion->answers as $answer) {
                $answers[] = [
                    'answer_id' => $answer->id,
                    'statement' => $answer->statement,
                    'order' => $answer->order,
                    'products_to_include' => $answer->productsToInclude,
                    'products_to_exclude' => $answer->productsToExclude
                ];
            }
            $nextQuestionJson = [
                'question_id' => $this->nextQuestion->id,
                'order' => $this->nextQuestion->primary_order,
                'query' => $this->nextQuestion->query,
                'answers' => $answers

            ];
        }
        return [
            'answer_id' => $this->id,
            'statement' => $this->statement,
            'next_question' => $nextQuestionJson,
            'products_to_include' => $this->productsToInclude,
            'products_to_exclude' => $this->productsToExclude
        ];
    }
}
