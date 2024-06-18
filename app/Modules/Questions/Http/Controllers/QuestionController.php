<?php

namespace App\Modules\Questions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Common\Traits\HttpResponse;
use App\Modules\Questions\Actions\Answers\DeleteAnswerAction;
use App\Modules\Questions\Actions\Questions\AnswerQuestionAction;
use App\Modules\Questions\Actions\Questions\CreateQuestionAction;
use App\Modules\Questions\Actions\Questions\DeleteQuestionAction;
use App\Modules\Questions\DataTransferObjects\CreateQuestionDTO;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\AnswerResource;
use App\Modules\Questions\Http\Resources\QuestionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use HttpResponse;

    /**
     * Route: GET /questions
     * Gets all questions listings.
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $questions = Question::all();
        return $this->success('All questions listing.', data: QuestionResource::collection($questions));
    }

    /**
     * Route: GET /questions/{question}
     * Gets all info of a question.
     * @param Question $question
     * @return JsonResponse
     */
    public function get(Question $question): JsonResponse
    {
        return $this->success('Question information.', data: new QuestionResource($question));
    }

    /**
     * Route: POST /questions/
     * Creates a new question.
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $dto = new CreateQuestionDTO($request);
            $action = new CreateQuestionAction($dto);
            $question = $action->execute();
            return $this->success('Question created.', data: new QuestionResource($question));
        } catch (AppException $e) {
            return $this->error($e);
        }
    }

    /**
     * Route: DELETE /questions/{question}
     * Deletes an answer.
     * @param Request $request
     * @param Question $question
     * @return JsonResponse
     */
    public function delete(Request $request, Question $question): JsonResponse
    {
        $action = new DeleteQuestionAction($question);
        $action->execute();
        return $this->success('Question deleted.', 204);
    }
}
