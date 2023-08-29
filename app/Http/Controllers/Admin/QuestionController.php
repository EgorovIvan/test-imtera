<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\Store;
use App\Http\Requests\Question\Update;
use App\Models\Question;
use App\Queries\QueryBuilder;
use App\Queries\QuestionsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    protected QueryBuilder $questionsQueryBuilder;

    public function __construct(
        QuestionsQueryBuilder $questionsQueryBuilder
    ) {
        $this->questionsQueryBuilder = $questionsQueryBuilder;
    }

    public function index(): View
    {
        return view('main.index', ['questions' => $this->questionsQueryBuilder->getAll()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {

        $question = Question::create($request->validated());
        if ($question) {
            return redirect()->route('main.index')->with('success', __('Question has been created'));
        }

        return back()->with('error', __('News has not been created'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, string $id): RedirectResponse
    {
        $question = Question::find($id);
        $question = $question->fill($request->validated());
        if ($question->save()) {
            return \redirect()->route('main.index')->with('success', __('Resource has been updated'));
        }

        return \back()->with('error', __('Resource has not been update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $question = Question::find($id);

        try {
            $question->delete();

            return  \response()->json('ok');
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());

            return  response()->json('error', 400);
        }
    }
}

