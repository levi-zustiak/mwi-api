<?php

namespace App\Services;

use App\Http\Resources\ContentResource;
use App\Http\Resources\ContentResourceCollection;
use App\Models\Content;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Exception;

class ContentService
{
    /** @var Content */
    protected $content;

    public function __construct(Content $content) 
    {
        $this->content = $content;
    }

    /**
     * @param 
     * @return ResourceCollection
     */
    public function getAllContent(): ResourceCollection
    {
        return new ContentResourceCollection(Content::all());
    }

    /**
     * @param Content $content
     * @return JsonResource
     */
    public function getSpecifiedContent(Content $content): JsonResource
    {
        return new ContentResource($content);
    }

    /**
     * @param array $request
     * @return JsonResource
     */
    public function createContent(array $request): JsonResource 
    {
        $content = $this->content->create($request);

        return new ContentResource($content);
    }

    /**
     * @param 
     * @return 
     */
    public function updateContent(Content $content, array $request): JsonResource
    {
        $content->update($request);

        return new ContentResource($content);
    }

    /**
     * @param Content $content
     * @return bool
     * @throws Exception
     */
    public function deleteContent(Content $content): bool 
    {
        return $content->delete();
    }
}
