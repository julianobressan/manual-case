<?php

namespace App\Modules\Questions\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = [];
        foreach ($this->products as $product) {
            $products[] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'reference' => $product->reference,
            ];
        }
        $nextQuestion = null;
        if ($this->nextQuestion) {
            $answers = [];
            foreach ($this->nextQuestion->answers as $answer) {
                $answers[] = [
                    'answer_id' => $answer->id,
                    'statement' => $answer->statement,
                    'order' => $answer->order,
                ];
            }
            $nextQuestion = [
                'question_id' => $this->nextQuestion->id,
                'numbering' => $this->nextQuestion->numbering,
                'order' => $this->nextQuestion->primary_order,
                'query' => $this->nextQuestion->query,
                'answers' => $answers

            ];
        }
        return [
            'answer_id' => $this->id,
            'next_question' => $nextQuestion,
            'recommended_products' => $products
        ];
    }
}
