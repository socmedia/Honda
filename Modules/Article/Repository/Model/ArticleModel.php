<?php

namespace Modules\Article\Repository\Model;

use App\Traits\FileHandler;
use Illuminate\Support\Str;
use Modules\Article\Repository\ArticleRepositoryInterface;
use Modules\Article\Repository\Model\Entities\Article;

class ArticleModel implements ArticleRepositoryInterface
{
    use FileHandler;

    public function getAll($request)
    {
        $article = Article::orderBy('created_at', 'desc');
        return $article->get();
    }

    public function findById($id)
    {
        $article = Article::where('id', $id);
        return $article->firstOrFail();
    }

    public function findBySlug($slug)
    {
        $article = Article::where('slug_title', $slug);
        return $article->firstOrFail();
    }

    public function create($request)
    {
        $id = Str::uuid()->getHex();
        $article = new Article();
        $article->id = $id;
        $article->title = $request->title;
        $article->slug_title = Str::slug($request->title);
        $article->blog_type = 'article';

        if ($request->hasFile('thumbnail')) {
            $article->image = $this->uploadMedia(
                $request->file('thumbnail'),
                now()->toDateString() . '/atc',
                'articles/' . now()->toDateString() . '/'
            );
        }

        $article->tags = $request->tags;
        $article->description = $request->description;
        $article->subject = $request->subject;
        $article->viewer = 0;
        $article->published = 1;
        return $article->save();
    }

    public function update($request, $id)
    {
        $article = $this->findById($id);
        $article->title = $request->title;
        $article->slug_title = Str::slug($request->title);
        $article->blog_type = 'article';

        if ($request->hasFile('thumbnail')) {
            $this->deleteMedia($request->file('thumbnail'), 'articles');
            $article->image = $this->uploadMedia(
                $request->file('thumbnail'),
                now()->toDateString() . '/atc',
                'articles/' . now()->toDateString() . '/'
            );
        }

        $article->tags = $request->tags;
        $article->description = $request->description;
        $article->subject = $request->subject;
        $article->viewer = 0;
        $article->published = $request->draft ? 0 : 1;
        return $article->save();
    }

    public function delete($id)
    {
        $article = $this->findById($id);
        $this->deleteMedia($article->name, 'articles');
        return $article->delete();
    }
}