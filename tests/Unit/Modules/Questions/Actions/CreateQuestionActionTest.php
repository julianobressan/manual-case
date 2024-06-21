<?php

namespace Tests\Unit\Modules\Questions\Actions;

use App\Modules\Questions\Actions\Question\CreateQuestionAction;
use App\Modules\Questions\DataTransferObjects\CreateQuestionDTO;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class CreateQuestionActionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @covers \App\Modules\Questions\Http\Controllers\QuestionController::getAll
     */
    public function test_execute(): void
    {
        $request = $this->createRequest('POST', json_encode(['payload' => []]), parameters: ['payload' => []]);
        $dto = new CreateQuestionDTO($request);
        $action = new CreateQuestionAction($dto);
        $result = $action->execute();
        $this->assertNotNull($result);
    }

    protected function createRequest(
        string $method,
        $content,
        $uri = '/test',
        $server = ['CONTENT_TYPE' => 'application/json'],
        $parameters = [],
        $cookies = [],
        $files = []
    ) {
        $request = new \Illuminate\Http\Request;
        return $request->createFromBase(
            Request::create(
                $uri,
                $method,
                $parameters,
                $cookies,
                $files,
                $server,
                $content
            )
        );
    }
}
