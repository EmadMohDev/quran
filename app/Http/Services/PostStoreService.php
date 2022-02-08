<?php


namespace App\Http\Services;

use App\Http\Repository\ContentRepository;
use App\Http\Repository\PostRepository;
use App\Models\Ayah;
use App\Models\Post;

class PostStoreService
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var ContentRepository
     */
    private $contentRepository;

    /**
     * PostServices constructor.
     * PostRepository constructor.
     */
    public function __construct(PostRepository $postRepository, ContentRepository $contentRepository)
    {
        $this->postRepository  = $postRepository;
        $this->contentRepository  = $contentRepository;
    }
    /**
     * handle function that make create for post
     * @param array $request
     * @return Void
     */
    public function handle($request)
    {
        $this->handleCreatPivotTablePost($request, $request['operator_id']);
    }

    /**
     * handleCreatPivotTablePost
     *
     * @param  array $operators
     * @param  array $request
     * @return void
     */
    public function handleCreatPivotTablePost($request, $operators)
    {
        foreach ($operators as  $operator_id) {
            Post::create(
                [
                    'url' => url('published?opId='.$operator_id.'&ayah='.$request['ayah_id']) ,
                    'published_date' => $request['published_date'],
                    'active' => $request['active'],
                    'user_id' => auth()->id(),
                    'ayah_id' => $request['ayah_id'],
                    'operator_id' => $operator_id,
                ]
            );
        }

    }

}
