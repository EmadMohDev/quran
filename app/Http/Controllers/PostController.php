<?php

namespace App\Http\Controllers;

use App\Constants\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Repository\ContentRepository;
use App\Http\Repository\PostRepository;
use App\Http\Repository\OperatorRepository;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Services\PostStoreService;
use App\Http\Services\PostUpdateService;
use App\Models\Post;
use App\Models\Ayah;
use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use App\Http\Requests\CreateMultiPostRequest;
use App\Models\Edition;
use App\Models\Surah;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;
    /**
     * @var PostStoreService
     */
    private $postStoreService;
    /**
     * @var PostUpdateService
     */
    private $postUpdateService;
    /**
     * @var OperatorRepository
     */
    private $operatorRepository;
    /**
     * @var ContentRepository
     */
    private $contentRepository;
    /**
     * __construct
     *
     * @param  PostRepository $postRepository
     * @param  OperatorRepository $operatorRepository
     * @param  ContentRepository $contentRepository
     * @param  PostStoreService $postStoreService
     * @param  PostUpdateService $postUpdateService
     * @return void
     */
    public function __construct(
        PostRepository $postRepository,
        OperatorRepository $operatorRepository,
        ContentRepository $contentRepository,
        PostStoreService $postStoreService,
        PostUpdateService $postUpdateService
    ) {

        $this->get_privilege();

        $this->postRepository = $postRepository;
        $this->postStoreService = $postStoreService;
        $this->postUpdateService = $postUpdateService;
        $this->operatorRepository = $operatorRepository;
        $this->contentRepository = $contentRepository;
    }

    /**
     * index
     * get all post data
     * @return View
     */

    protected function checkSession()
    {
        if (request()->ayah) {
            session(['ayah' => ['id' => request()->ayah, 'url' => '?ayah='.request()->ayah]]);
        } else {
            session()->forget('ayah');
        }
    }

    public function index(PostsDataTable $dataTable)
    {
        $value_from_session = session('first_post') ?? '';
        session()->forget('first_post');

        // $this->checkSession();
        $pageTitle = '';
        if(request()->filled('ayah'))
            $pageTitle = Ayah::whereId(request()->ayah)->first()->text;
        return $dataTable->render('post.index', compact('pageTitle', 'value_from_session'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create()
    {
        $this->checkSession();
        $operators = $this->operatorRepository->all();
        $ayah = Ayah::findOrFail(request()->ayah);
        $post = null;
        return view('post.form',compact('post' ,'operators', 'ayah'));
    }

    /**
     * store post data
     *
     * @param  PostStoreRequest $request
     * @return Redirect
     */
    public function store(PostStoreRequest $request)
    {
        $this->postStoreService->handle($request->validated());

        $request->session()->flash('success', trans('messages.Added Successfully'));

        return redirect('post'. session('ayah')['url'] ?? '');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int  $id
     * @return  View
     */
    public function edit($id)
    {
        $post = $this->postRepository->findOrfail($id);
        $operators = $this->operatorRepository->all();
        $ayah = Ayah::findOrFail($post->ayah_id);
        return view('post.form',compact('post', 'operators', 'ayah'));
    }

    /**
     * update
     *
     * @param  int $id
     * @param  PostUpdateRequest $request
     * @return Redirect
     */
    public function update($id, PostUpdateRequest $request)
    {
        $post = $this->postRepository->findOrfail($id);

        $this->postUpdateService->handle($request->validated(), $post);

        $request->session()->flash('success', trans('messages.updated successfully'));

        return redirect('post'.session('ayah')['url'] ?? '');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->findOrfail($id);

        $post->delete();

        session()->flash('success', trans('messages.has been deleted successfully'));

        return back();
    }

    public function multiDelete(Request $request)
    {
        if ($request->ids == "")
            return back()->with('success', 'Something is wrong!');

        $ids_array = explode(',', $request->ids);
        if (is_array($ids_array) && count($ids_array) > 0) {
            Post::whereIn('id', $ids_array)->delete();
            return back()->with('success', 'This Ayahs ['.count($ids_array).'] Deleted Successfully');
        }
        return back()->with('success', 'Something is wrong!');
    }

    public function multiCreate ()
    {
        $editions = Edition::Active()->WhereHas('ayahs')->orderBy('name', 'ASC')->get();
        $surahs = Surah::WhereHas('ayahs')->orderBy('number', 'ASC')->get();
        $operators = $this->operatorRepository->all();
        return view('post.multi-create', compact('editions', 'surahs', 'operators'));
    }

    public function multiStore (CreateMultiPostRequest $request)
    {
        session()->forget('first_post');
        $ayahs = Ayah::where(['edition_id' => $request->edition_id, 'surah_id' => $request->surah_id])->whereBetween('order_in_surah', [$request->start, $request->end])->get();

        foreach ($ayahs as $index => $ayah) {
            foreach ($request->operator_id as $operator) {
                $post = Post::create([
                    'url' => url('published?opId='.$operator.'&ayah='.$ayah->id) ,
                    'published_date' => $request->published_date,
                    'active' => $request->active,
                    'user_id' => auth()->id(),
                    'ayah_id' => $ayah->id,
                    'operator_id' => $operator,
                    'start_end' => $request->start.'-'.$request->end
                ]);
            }
            if ($index == 0)
                session(['first_post' => $post->url]);
        }

        return redirect('post')->with('success', trans('messages.Added Successfully'));
    }
}
