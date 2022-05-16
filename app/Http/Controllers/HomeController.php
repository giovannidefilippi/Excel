<?php

namespace App\Http\Controllers;

use App\Imports\GaraImport;
use App\Models\Gara;
use App\Models\Stato;
use ErrorException;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $gara=Gara::all()->sortBy('datascadenzatotime');
        $stato=Stato::all();
        $tipo="Tutte le Gare";
        return view('index',compact('gara','stato','tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(int $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }

    /**
     * @throws ValidationException
     */
    public function import(Request $request): string
    {
       $this->validate($request,[
           'scegli_file' => 'required|mimetypes:application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
           ]);
        $path = $request->file('scegli_file')->getRealPath();
        //Excel::import(new GaraImport,$path);
        //return back()->with('success','Il file Excel è stato importato senza errori.'); // Test senza try catch-> errore più verboso
      try{
            Excel::import(new GaraImport,$path);
            return back()->with('success','Il file Excel è stato importato senza errori.'); // scrive su $session chiave => valore
        }
           catch (QueryException $exception){
                return back()->with('error','Il file Excel non è stato importato. La query non è stata accettata dal db.');
             }
            catch (ErrorException $exception){
                return back()->with('error','Il file Excel non è stato importato. Errore di caricamento');
             }
            catch (Exception $exception){
            //return view('file_non_caricato'); posso ritornare una view personalizzata
            //dd($exception->getMessage()); //oppure in sviluppo per capire quale eccezione è stata sollevata
            //dd(get_class($exception));
            return back()->with('error','Il file Excel non è stato importato');
        }

    }
}
