<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
=======
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9

use App\Author;
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
<<<<<<< HEAD
            //return Datatables::of($authors)->make(true);

            return Datatables::of($authors)
                ->addColumn('action', function($author){
                    return view('datatable._action', [
                    'model' => $author,
                    'form_url' => route('authors.destroy', $author->id),
                    'edit_url' => route('authors.edit', $author->id),
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        //->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama']);
            ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
=======
            return Datatables::of($authors)->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Nama']);
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
        
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
<<<<<<< HEAD
        return view('authors.create');
=======
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $this->validate($request, ['name' => 'required|unique:authors']);
        //$author = Author::create($request->all());
        $author = Author::create($request->only('name'));
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $author->name"
        ]);
        return redirect()->route('authors.index');

        
=======
        //
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
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
<<<<<<< HEAD
        $author = Author::find($id);
        return view('authors.edit')->with(compact('author'));
=======
        //
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
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
        //$author = App\Author::find(1);
        //$author->update(['name'=>'Salim A Fillah']);
<<<<<<< HEAD

        $this->validate($request, ['name' => 'required|unique:authors,name,'. $id]);
        $author = Author::find($id);
        $author->update($request->only('name'));
        Session::flash("flash_notification", [
        "level"=>"info",
        "message"=>"Berhasil Mengubah $author->name"
        ]);
        return redirect()->route('authors.index');
=======
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
<<<<<<< HEAD
    {   
        $author = Author::find($id);
        Author::destroy($id);
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Penulis $author->name berhasil dihapus"
            ]);

        return redirect()->route('authors.index');
=======
    {
        //
>>>>>>> 501cd1329fb6f9ba98d9b38a662743cf243dbae9
    }
}
