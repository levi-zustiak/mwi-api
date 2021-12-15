<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Response;

class ContentController extends Controller
{
    /** @var ContentService */
    protected ContentService $contentService;

    public function __construct(ContentService $contentService) 
    {
        $this->contentService = $contentService;
    }

    /**
     * Display a listing of the resource
     * 
     * @return Response
     */
    public function index(): Response
    {
        $content = $this->contentService->getAllContent();

        return $this->respond(true, $content);
    }

    /**
     * Display the specified resource.
     *
     * @param  Content $content
     * @return Response
     */
    public function show(Content $content): Response
    {
        $content = $this->contentService->getSpecifiedContent($content);

        return $this->respond(true, $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContentRequest  $request
     * @return Response
     */
    public function store(ContentRequest $request): Response
    {
        $content = $this->contentService->createContent($request->validated());

        return $this->respond(true, $content, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentRequest  $request
     * @param  Content $content
     * @return Response
     */
    public function update(ContentRequest $request, Content $content): Response
    {
        $content = $this->contentService->updateContent($content, $request->validated());

        return $this->respond(true, $content); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Content $content
     * @return Response
     * @throws Exception
     */
    public function destroy(Content $content): Response
    {
        return $this->respond(
            $this->contentService->deleteContent($content),
            [
                'id' => $content->id
            ],
            Response::HTTP_NO_CONTENT
        );
    }
}
