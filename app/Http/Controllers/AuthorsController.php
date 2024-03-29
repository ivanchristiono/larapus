<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        //
        return view('authors.index');


    }
    */

    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $authors = Author::select(['id', 'name']);
            //return Datatables::of($authors)->make(true);

            return Datatables::of($authors)
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                    'model' => $author,
                    'form_url' => route('authors.destroy', $author->id),
                    'edit_url' => route('authors.edit', $author->id),
                    'confirm_message' => 'Yakin anda mau menghapus '. $author->name .'?'  
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        //->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama']);
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
        
        return view('authors.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //App\Author::create(['name'=>'Aam Amiruddin']);
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        //$this->validate($request, ['name' => 'required|unique:authors']);
        //$author = Author::create($request->all());
        $author = Author::create($request->only('name'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $author->name"
        ]);
        return redirect()->route('authors.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit')->with(compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        //$author = App\Author::find(1);
        //$author->update(['name'=>'Salim A Fillah']);

        //$this->validate($request, ['name' => 'required|unique:authors,name,'. $id]);
        $author = Author::find($id);
        $author->update($request->only('name'));
        Session::flash("flash_notification", [
        "level"=>"info",
        "message"=>"Berhasil Mengubah $author->name"
        ]);
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $author = Author::find($id);
        //Author::destroy($id);
        if(!Author::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis $author->name berhasil dihapus"
            ]);

        return redirect()->route('authors.index');
    }
}
