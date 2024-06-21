<?php

namespace App\Modules\Questions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Common\Traits\HttpResponse;
use App\Modules\Questions\Actions\Answer\CreateAnswerAction;
use App\Modules\Questions\Actions\Answer\CreateAnswerProductExcludeAction;
use App\Modules\Questions\Actions\Answer\CreateAnswerProductIncludeAction;
use App\Modules\Questions\Actions\Answer\DeleteAnswerAction;
use App\Modules\Questions\Actions\Answer\UpdateAnswerAction;
use App\Modules\Questions\Actions\Question\AnswerQuestionAction;
use App\Modules\Questions\DataTransferObjects\CreateAnswerDTO;
use App\Modules\Questions\DataTransferObjects\CreateAnswerProductExcludeDTO;
use App\Modules\Questions\DataTransferObjects\CreateAnswerProductIncludeDTO;
use App\Modules\Questions\DataTransferObjects\DeleteAnswerDTO;
use App\Modules\Questions\DataTransferObjects\UpdateAnswerDTO;
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
            return $this->success('Answer created.', 201, new AnswerResource($answer));
        } catch (AppException $e) {
            return $this->error($e);
        }
    }

    /**
     * Route: PATCH /questions/{question}/answer/{answer}
     * Updates an answer.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     */
    public function update(Request $request, Question $question, Answer $answer): JsonResponse
    {
        try {
            $dto = new UpdateAnswerDTO($request, $question);
            $action = new UpdateAnswerAction($dto, $answer);
            $action->execute();
            return $this->success('Answer updated.', 204);
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
     * Route: POST /questions/{question}/answer/{answer}
     * Register the user answer.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     */
    public function register(Request $request, Question $question, Answer $answer): JsonResponse
    {
        try {
            $action = new AnswerQuestionAction($question, $answer);
            $data = $action->execute();
            return $this->success('Answer result.', data: $data);
        } catch (AppException $e) {
            return $this->error($e);
        }
    }

    /**
     * Route: POST /questions/{question}/answer/{answer}/include
     * Adds a product to be recommended.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     * @throws ValidationException
     */
    public function addProductToInclude(Request $request, Question $question, Answer $answer): JsonResponse
    {
        $dto = new CreateAnswerProductIncludeDTO($request, $answer);
        $action = new CreateAnswerProductIncludeAction($dto);
        $data = $action->execute();
        return $this->success('Recommended product added.', data: new AnswerResource($data));
    }

    /**
     * Route: POST /questions/{question}/answer/{answer}/exclude
     * Adds a product to be recommended.
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return JsonResponse
     * @throws ValidationException
     */
    public function addProductToExclude(Request $request, Question $question, Answer $answer): JsonResponse
    {
        $dto = new CreateAnswerProductExcludeDTO($request, $answer);
        $action = new CreateAnswerProductExcludeAction($dto);
        $data = $action->execute();
        return $this->success('Recommended product added.', data: new AnswerResource($data));
    }
}
