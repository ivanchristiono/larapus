<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\BorrowLog;


class StatisticsController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder){
        if ($request->ajax()){
            $stats = Borrowlog::with('book', 'user');

            return Datatables::of($stats)
                ->addColumn('returned_at', function($stat){
                if ($stat->is_returned()){
                    return $stat->updated_at;
                }
                return "Masih Dipinjam";
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'book.title', 'name'=>'book.title', 'title'=>'Judul'])
            ->addColumn(['data'=>'user.name', 'name'=>'user.name', 'title'=>'Peminjam'])
            ->addColumn(['data'=>'created_at', 'name'=>'created_at', 'title'=>'Tanggal Pinjam', 'searchable'=>false])
            ->addColumn(['data'=>'returned_at', 'name'=>'returned_at', 'title'=>'Tanggal Kembali', 'orderable'=>false, 'searchable'=>false]);

            return view('statistics.index')->with(compact($html));
    }
}