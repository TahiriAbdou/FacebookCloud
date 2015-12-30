<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateNewPage;
use App\Http\Controllers\Controller;
use Hoteru\Repositories\PagesRepository;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(PagesRepository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewPage $request)
    {
        $this->pages->create($request->all());
        \Session::flash('success', 'Page created');
        return redirect('dashboard/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->pages->find($id)->translate('fr')->title;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pages->find($id);

        return view('dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->pages->update($request->all(), $id);
        \Session::flash('success', 'Page updated');
        return redirect('dashboard/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pages->delete($id);
        \Session::flash('info', 'Page deleted');
        return redirect('dashboard/pages');
    }

    public function getPrivacy(){
        return 'privacy';
    }


    public function datatable()
    {
        return $this->pages->datatable();
    }
}
