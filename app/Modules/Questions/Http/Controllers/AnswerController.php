<?php

namespace App\Modules\Questions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Common\Traits\HttpResponse;
use App\Modules\Questions\Actions\Answers\CreateAnswerAction;
use App\Modules\Questions\Actions\Answers\DeleteAnswerAction;
use App\Modules\Questions\Actions\Questions\AnswerQuestionAction;
use App\Modules\Questions\DataTransferObjects\CreateAnswerDTO;
use App\Modules\Questions\DataTransferObjects\DeleteAnswerDTO;
use App\Modules\Questions\Entities\Answer;
use App\Modules\Questions\Entities\Question;
use App\Modules\Questions\Http\Resources\AnswerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    use HttpResponse;

    /**
     * Route: POST /questions/{question}/answer
     * Creates a new answer.
     * @param Request $request
     * @param Question $question
     * @return JsonResponse
     */
    public function create(Request $request, Question $question): JsonResponse
    {
        try {
            $dto = new CreateAnswerDTO($request, $question);
            $action = new CreateAnswerAction($dto);
            $answer = $action->execute();
            return $this->success('Answer created.', data: new AnswerResource($answer));
        } catch (AppException $e) {
            return $this->error($e);
        }
    }

    /**
     * Route: DELETE /questions/{question}/answers/{answer}
     * Deletes an answer.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     */
    public function delete(Request $request, Question $question, Answer $answer): JsonResponse
    {
        try {
            $dto = new DeleteAnswerDTO($question, $answer);
            $action = new DeleteAnswerAction($dto);
            $action->execute();
            return $this->success('Answer deleted.', 204);
        } catch (AppException $e) {
            return $this->error($e);
        }
    }

    /**
     * Route: GET /questions/{question}/answer/{answer}
     * Gets the response of a chosen answer.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     */
    public function get(Request $request, Question $question, Answer $answer): JsonResponse
    {
        try {
            $action = new AnswerQuestionAction($question, $answer);
            $action->execute();
            return $this->success('Answer result.', data: new AnswerResource($answer));
        } catch (AppException $e) {
            return $this->error($e);
        }
    }
}
