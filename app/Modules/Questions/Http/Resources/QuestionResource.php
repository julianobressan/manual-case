<?php

namespace App\Modules\Questions\Http\Resources;

use App\Modules\Questions\Entities\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Answer[] $answers
 * @property int $id
 * @property string $query
 * @property int $order
 */
class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $answers = [];
        foreach ($this->answers as $answer) {
            $answers[] = [
                'statement' => $answer->statement,
                'order' => $answer->order,
                'answer_id' => $answer->id,
                'next_question_id' => $answer->next_question_id,
                'products_to_include' => $answer->productsToInclude,
                'products_to_exclude' => $answer->productsToExclude
            ];
        }
        return [
            'question_id' => $this->id,
            'order' => $this->order,
            'query' => $this->query,
            'answers' => $answers
        ];
    }
}
