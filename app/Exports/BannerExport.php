<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Banner\Repository\Model\Entities\Banner;

class BannerExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return Banner::all([
            'id', 'title', 'image_name', 'page_target', 'alt', 'description', 'is_active', 'active_until', 'created_at',
        ]);
    }

    public function map($banner): array
    {
        return [
            $banner->id,
            $banner->title,
            $banner->image_name,
            $banner->page_target,
            $banner->alt,
            $banner->description,
            $banner->is_active === 1 ? 'ya' : 'tidak',
            Carbon::parse($banner->active_until)->format('D d, M Y'),
            $banner->created_at->format('D d, M Y. H:i a'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama Banner', 'Lokasi Penyimpanan', 'Target Halaman', 'Text Alt', 'Deskripsi', 'Ditampilkan', 'Aktif Hingga', 'Tanggal Upload',
        ];
    }
}