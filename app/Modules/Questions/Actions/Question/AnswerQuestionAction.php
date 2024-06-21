<?php

namespace App\Modules\Questions\Actions\Question;

use App\Modules\Common\Actions\ActionInterface;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\QuestionResource;
use App\Modules\Users\Entities\User;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 */
class AnswerQuestionAction implements ActionInterface
{
    public function __construct(private readonly Question $question, private readonly Answer $answer)
    {}

    /**
     * @throws AppException
     */
    public function execute(): array
    {
        if ($this->answer->question_id !== $this->question->id) {
            throw new AppException('The answer do not belongs to the provided question.');
        }
        $user = User::find(1);
        $user->answers()->attach($this->answer->id);

        // Add recommended products
        foreach ($this->answer->productsToInclude as $product) {
            $existingProduct = $user->recommendedProducts->where('id', $product->id)->first();

            if (is_null($existingProduct)) {
                $user->recommendedProducts()->attach($product->id);
            }
        }

        // Remove products
        $productsToExcludeIds = $this->answer->productsToExclude()->select('products.id')->get();
        $user->recommendedProducts()->detach($productsToExcludeIds->pluck('id'));

        return [
            'complete' => !$this->answer->nextQuestion,
            'question' => $this->answer->nextQuestion ? new QuestionResource( $this->answer->nextQuestion) : null,
            'recommended_products' => $user->recommendedProducts
        ];
    }
}
