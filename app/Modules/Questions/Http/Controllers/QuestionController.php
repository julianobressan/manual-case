<?php

namespace App\Modules\Questions\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Exceptions\AppException;
use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Common\Traits\HttpResponse;
use App\Modules\Questions\Actions\Question\CreateQuestionAction;
use App\Modules\Questions\Actions\Question\DeleteQuestionAction;
use App\Modules\Questions\Actions\Question\GetNextQuestionAction;
use App\Modules\Questions\Actions\Question\RestartQuestionnaireAction;
use App\Modules\Questions\Actions\Question\UpdateQuestionAction;
use App\Modules\Questions\DataTransferObjects\CreateQuestionDTO;
use App\Modules\Questions\DataTransferObjects\UpdateQuestionDTO;
use App\Modules\Questions\Entities\Question;
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
        $questions = Question::all()->sortBy('order');
        return $this->success('All questions listing.', data: QuestionResource::collection($questions));
    }

    /**
     * Route: GET /questions/next
     * Gets the next question to user.
     * @return JsonResponse
     */
    public function getNext(): JsonResponse
    {
        $action = new GetNextQuestionAction();
        $data = $action->execute();
        return $this->success('Next question.', data: $data);
    }

    /**
     * Route: GET /questions/restart
     * Gets the next question to user.
     * @return JsonResponse
     */
    public function restart(): JsonResponse
    {
        $action = new RestartQuestionnaireAction();
        $data = $action->execute();
        return $this->success('Questionnaire restarted.', data: $data);
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
            return $this->success('Question created.', 201, new QuestionResource($question));
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

    /**
     * Route: PATCH /questions/{question}
     * Updates an answer.
     * @param Request $request
     * @param Question $question
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Question $question): JsonResponse
    {
        $dto = new UpdateQuestionDTO($request, $question);
        $action = new UpdateQuestionAction($dto);
        $action->execute();
        return $this->success('Question updated.', 204);
    }
}
