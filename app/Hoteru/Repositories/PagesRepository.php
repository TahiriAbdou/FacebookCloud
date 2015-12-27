<?php
namespace Hoteru\Repositories;

use App;
use Datatables;
use Prettus\Repository\Eloquent\BaseRepository;
use Hoteru\Page;
use Hoteru\Repositories\Contracts\DatatableBuilder;

class PagesRepository extends BaseRepository implements DatatableBuilder
{
	
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Page::class;
    }
   
    public function datatable()
    {
        $pages = $this->model->select('*');

        return Datatables::of($pages)
            ->addColumn('action', function ($p) {
                return '<a target="_blanc" href="'.LaravelLocalization::getLocalizedURL(App::getLocale(), route('front.page', ['slug'=>$p->slug])).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> View</a> <a href="'.action('Dashboard\\PagesController@destroy', ['id'=>$p->id]).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->editColumn('title', function ($p) {
                return '<a href="'.action('Dashboard\\PagesController@edit', ['id'=>$p->id]).'">'.$p->title.'</a>';
            })
            ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
            ->editColumn('updated_at', '{!! $updated_at->diffForHumans() !!}')
            ->make(true);
    }
}
