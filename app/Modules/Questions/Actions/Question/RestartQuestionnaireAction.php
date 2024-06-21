<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\QuestionResource;
use App\Modules\Users\Entities\User;

class RestartQuestionnaireAction implements ActionInterface
{
    public function execute(): array
    {
        $user = User::find(1);
        $user->answers()->detach();
        $user->recommendedProducts()->detach();
        $question = Question::where('order', 1)->get()->first();
        return [
            'complete' => false,
            'question' => new QuestionResource($question),
            'recommended_products' => []
        ];
    }
}
