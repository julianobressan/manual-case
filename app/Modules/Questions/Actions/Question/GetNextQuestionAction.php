<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\QuestionResource;
use App\Modules\Users\Entities\User;

class GetNextQuestionAction implements ActionInterface
{
    public function execute(): array
    {
        $user = User::find(1);
        $nextQuestion = null;
        if (!$user->answers->count()) {
            $nextQuestion = Question::where('order', 1)->get()->first();
        }
        $lastAnswer = $user->answers->last();
        if ($lastAnswer) {
            $nextQuestion = $lastAnswer->nextQuestion;
        }
        return [
            'complete' => !$nextQuestion,
            'question' => $nextQuestion ? new QuestionResource($nextQuestion) : null,
            'recommended_products' => $user->recommendedProducts
        ];
    }
}
