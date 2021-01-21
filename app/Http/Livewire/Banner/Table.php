<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Banner\Repository\Model\Entities\Banner;

class Table extends Component
{
    use WithPagination;

    public $status = 'all';

    public $target = 'all';

    public $orderBy = 'created_at';

    public $order = 'desc';

    public $perPage = 12;

    public $search = '';

    public function getAll($search, $status, $target, $orderBy, $order)
    {
        $banners = Banner::search($search)->orderBy($orderBy, $order);

        if ($this->target !== 'all') {
            $banners->where('page_target', $target);
        }

        if ($status === 'active') {
            $banners->where('is_active', 1);
        }

        if ($status === 'not-active') {
            $banners->where('is_active', 0);
        }

        return $banners->simplePaginate($this->perPage);
    }

    public function findById($id)
    {
        return Banner::findOrFail($id);
    }

    public function activeState($id)
    {
        $banner = $this->findById($id);
        $banner->is_active = ($banner->is_active === 1) ? 0 : 1;
        $banner->save();
        return session()->flash('success', 'Status berhasil diubah.');
    }

    public function deleteBanner($id)
    {
        $banner = $this->findById($id);
        unlink(storage_path('app/public/' . $banner->image_name));
        $banner->delete();
        return session()->flash('success', 'Banner berhasil dihapus.');
    }

    public function render()
    {
        $banners = $this->getAll($this->search,
            $this->status,
            $this->target,
            $this->orderBy,
            $this->order);

        return view('livewire.banner.table', ['banners' => $banners]);
    }
}