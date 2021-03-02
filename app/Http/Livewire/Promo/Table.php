<?php

namespace App\Http\Livewire\Promo;

use App\Constants\IsPublish;
use Livewire\Component;
use Modules\Article\Repository\Model\Entities\Article;

class Table extends Component
{
    public $search = '', $publish = null;

    public function getAll($search, $publish)
    {
        # Base query without filter
        $articles = Article::orderBy('created_at', 'desc')->where(function ($q) {
            $q->whereRaw('blog_type IN ("event", "promo")');
        });

        # Search Query
        if ($search !== '') {
            $articles->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('subject', 'like', '%' . $search . '%');
            });
        }

        # Filter Publish or Draft Article
        if ($publish !== null) {
            switch ($publish) {
                case 'draft':
                    $articles->where('published', 0);
                    break;
                case 'publish':
                    $articles->where('published', 1);
                    break;
            }
        }

        # Get the articles all conditions was run
        return $articles->paginate(10);
    }

    public function render()
    {
        $publish = new IsPublish();
        return view('livewire.promo.table', [
            'datas' => $this->getAll($this->search, $this->publish),
            'publishState' => $publish->getAll(),
        ]);
    }
}