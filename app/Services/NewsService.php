<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsService
{
    protected $newsModel;

    function __construct(News $newsModel)
    {
        $this->news = $newsModel;
    }

    public function getAll()
    {
        return $this->news->paginate(20);
    }

    public function store($request) 
    {
        // insert
    }

    public function multipleStore($request) 
    {
        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
        $news = $request['channel']['item'];
        $insertData = [];

        foreach ($news as $oneNews) {
            $title = $oneNews['title'];
            $url = $oneNews['link'];
            $description = $oneNews['description'];
            $publicationDate = $oneNews['pubDate'];
            $author = isset($oneNews['author']) ? $oneNews['author'] : null;
            $image_path = null;

            if (isset($oneNews['enclosure']) && count($oneNews['enclosure']) > 1) {
                foreach ($oneNews['enclosure'] as $key => $value) {
                    $type = $value['@attributes']['type'];
                    if (in_array($type, $allowedMimeTypes)) {
                        $image_path = $value['@attributes']['url'];
                    }
                }
            } else if (isset($oneNews['enclosure']) && count($oneNews['enclosure']) === 1) {
                $type = $oneNews['enclosure']['@attributes']['type'];
                if(in_array($type, $allowedMimeTypes)) {
                    $image_path = $oneNews['enclosure']['@attributes']['url'];
                };
            }

            $insertData[] = [
                'title' => $title,
                'url' => $url,
                'description' => $description,
                'publication_date' => $publicationDate,
                'author' => $author,
                'image_path' => $image_path,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if ($this->news->insert($insertData)) {
            return $this->getAll();
        } else {
            return response('Error', 500);
        }
    }

    public function show($id)
    {
        return $this->news::findOrFail($id);
    }

    public function update($request, $id)
    {
        //update
    }

    public function destroy($id)
    {
        $this->news::whereId($id)
            ->delete();
    }
}
