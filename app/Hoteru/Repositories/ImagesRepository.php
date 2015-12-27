<?php
namespace Hoteru\Repositories;

use App;
use Datatables;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Image;
use Hoteru\Repositories\Contracts\DatatableBuilder;

class ImagesRepository extends BaseRepository implements DatatableBuilder
{
	
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Image::class;
    }
   
    public function datatable()
    {
        $images = $this->model->select('*');

        return Datatables::of($images)
            ->addColumn('action', function ($p) {
                return '<a class="btn btn-xs btn-danger" onclick="return confirm(\'Delete this image ?\');" href="'.action('Dashboard\\ImagesController@destroy', ['id'=>$p->id]).'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('image', function ($p) {
                return '<a href="'.$p->getMedia()[0]->getUrl().'"><img src="'.$p->getMedia()[0]->getUrl().'" class="img-responsive"></a>';
            })
            ->editColumn('created_at', '{!! $created_at->diffForHumans() !!}')
            ->make(true);
    }
}
