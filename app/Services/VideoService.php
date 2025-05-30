<?php


namespace App\Services;


use App\Models\Video as VideoModel;
use App\Services\Admin\Query\OptionsService;
use App\Services\CRUDService;
use App\Services\ImageService;

class VideoService extends CRUDService
{
    protected string $model = VideoModel::class;
    protected ImageService $imageService;


    public function __construct(OptionsService $queryOptions, ImageService $imageService)
    {
        parent::__construct($queryOptions);
        $this->imageService = $imageService;
    }

    public function getAll()
    {
        return $this->getModel()
            ->newQuery()
            ->latest()
            ->get();
    }

    protected function save($video, $data)
    {
        $video->fill($data);
        //$video->url = $this->convertYoutubeUrl($data['url']);
        if($data['preview']){
            $video->preview()->associate($this->imageService->findByArrayWithId($data['preview']));
        }
        $video->user()->associate(auth()->user());
        $video->save();
        return $video;
    }

    public function convertYoutubeUrl($url)
    {
        if($url && !str_contains($url, 'embed')){
            $urlInfo = parse_url($url);
            if(count($urlInfo) > 0 && isset($urlInfo['query'])){
                $queryParams = [];
                parse_str($urlInfo['query'], $queryParams);
                if(count($queryParams) > 0 && isset($queryParams['v'])){
                    $url = 'https://www.youtube.com/embed/' . $queryParams['v'];
                }
            }
        }
        return $url;
    }
}
