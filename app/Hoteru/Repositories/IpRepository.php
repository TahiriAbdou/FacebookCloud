<?php
namespace Hoteru\Repositories;

use Datatables;
use Prettus\Repository\Eloquent\BaseRepository;
use Hoteru\Repositories\Contracts\DatatableBuilder;
use Hoteru\Ip;

class IpRepository extends BaseRepository implements DatatableBuilder
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ip::class;
    }

    public function datatable()
    {
        return Datatables::of($this->model->select('*'))
            ->addColumn('action', function ($c) {
                return '<a href="'.action('Dashboard\\IpsController@getUnban', ['id'=>$c->id]).'" class="btn btn-xs btn-info"><i class="fa fa-unlock"></i> Unban</a>';
            })
            ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
            ->make(true);
    }
}
