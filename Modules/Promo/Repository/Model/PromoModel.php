<?php

namespace Modules\Promo\Repository\Model;

use App\Traits\FileHandler;
use Illuminate\Support\Str;
use Modules\Article\Repository\Model\Entities\Article;
use Modules\Promo\Repository\PromoRepositoryInterface;

class PromoModel implements PromoRepositoryInterface
{
    use FileHandler;

    public function getAll($request)
    {
        $promo = Article::orderBy('created_at', 'desc');
        return $promo->get();
    }

    public function findById($id)
    {
        $promo = Article::where('id', $id);
        return $promo->firstOrFail();
    }

    public function findBySlug($slug)
    {
        $promo = Article::where('slug_title', $slug);
        return $promo->firstOrFail();
    }

    public function create($request)
    {
        $id = Str::uuid()->getHex();
        $promo = new Article();
        $promo->id = $id;
        $promo->title = $request->title;
        $promo->slug_title = Str::slug($request->title);
        $promo->blog_type = $request->type;

        if ($request->hasFile('thumbnail')) {
            $promo->image = $this->uploadMedia(
                $request->file('thumbnail'),
                now()->toDateString() . '/atc',
                'promo/' . now()->toDateString() . '/'
            );
        }

        $promo->subject = $request->subject;
        $promo->viewer = 0;
        $promo->published = 1;
        return $promo->save();
    }

    public function update($request, $id)
    {
        $promo = $this->findById($id);
        $promo->title = $request->title;
        $promo->slug_title = Str::slug($request->title);
        $promo->blog_type = $request->type;

        if ($request->hasFile('thumbnail')) {
            $this->deleteMedia($request->file('thumbnail'), 'promo');
            $promo->image = $this->uploadMedia(
                $request->file('thumbnail'),
                now()->toDateString() . '/atc',
                'promo/' . now()->toDateString() . '/'
            );
        }

        $promo->subject = $request->subject;
        $promo->viewer = 0;
        $promo->published = $request->draft ? 0 : 1;
        return $promo->save();
    }

    public function delete($id)
    {
        $promo = $this->findById($id);
        $this->deleteMedia($promo->name, 'promo');
        return $promo->delete();
    }
}