<?php

namespace App\Modules\Questions\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
                'answer_id' => $answer->id,
                'statement' => $answer->statement,
                'order' => $answer->order,
            ];
        }
        return [
            'question_id' => $this->id,
            'numbering' => $this->numbering,
            'order' => $this->primary_order,
            'query' => $this->query,
            'answers' => $answers
        ];
    }
}
