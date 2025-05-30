<?php


namespace App\Http\Requests\Admin\Video;


use App\Http\Requests\Site\BaseRequest;

class VideoCreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'url' => 'required|string|max:255',
            'preview' => 'nullable',
            'preview.id' => 'nullable|integer',
            'preview.name' => 'nullable|string',
            'preview.path' => 'nullable|string',
            'preview.url' => 'nullable|string',
        ];
    }
}
