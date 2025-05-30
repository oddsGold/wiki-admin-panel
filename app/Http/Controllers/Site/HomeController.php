<?php

namespace App\Http\Controllers\Site;


use App\Services\FaqService;
use App\Services\NewsService;
use App\Services\VideoService;
use App\Services\UserMemo\TypeService;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

    protected NewsService $newsService;
    protected FaqService $faqService;
    protected VideoService $videoService;
    protected TypeService $userMemoTypeService;

    public function __construct(
        NewsService $news,
        FaqService $faq,
        VideoService $video,
        TypeService $userMemoType
    ){
        $this->newsService = $news;
        $this->faqService = $faq;
        $this->videoService = $video;
        $this->userMemoTypeService = $userMemoType;
    }

    public function index()
    {
        return view('site.pages.index',[
            'news' => $this->newsService->getAll(),
            'faqs' => $this->faqService->getAll(),
            'videos' => $this->videoService->getAll(),
            'userMemoTypes' => $this->userMemoTypeService->getAll()
        ]);
    }
}
