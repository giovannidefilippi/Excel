<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGaraRequest;
use App\Http\Requests\UpdateGaraRequest;
use App\Models\Gara;
use App\Models\Note;
use App\Models\Stato;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGaraRequest $request
     * @return RedirectResponse
     */
    public function store(StoreGaraRequest $request): RedirectResponse
    {
        Gara::create([
            'rdo' =>$request->rdo,
            'rdoelotto'=>$request->rdo+$request->lotto,
            'denominazioneiniziativa' =>$request->denominazioneiniziativa,
            'amministrazione' =>$request->amministrazione,
            'regione' =>$request->regione,
            'referente' =>$request->telefono,
            'telefono' =>$request->provincia,
            'bando' =>$request->bando,
            'lotto' =>$request->lotto,
            'basedasta' =>$request->basedasta,
            'email2' =>$request->email2,
            'datapubblicazione' =>$request->datapubblicazione,
            'datascadenza' =>$request->datascadenza,
            'dataterminechiarimenti' =>$request->dataterminechiarimenti,
            'giornidiconsegna' =>$request->giornidiconsegna,
            'criterioaggiudicazione' =>$request->criterioaggiudicazione,
            'note' =>$request->note,
            'quotazione' =>$request->quotazione,
            'offerta' =>$request->offerta
        ]);
        $id=Gara::max('id');
        return redirect()->route('gare.show',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        $gara = Gara::findOrFail($id);
        return view('show',compact('gara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $gara = Gara::findOrFail($id);
        $note = Note::where('gara_id',$id)->with('gara')->orderBy('id','ASC')->get();
        return view('edit',compact('gara','note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGaraRequest $request
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function update(UpdateGaraRequest $request, int $id)
    {
        $gara=Gara::findOrFail($id);
        if($request->stato)
        {
        $gara->update([
            'stato_id' =>$request->stato,

        ]);
        return back()->withInput();
        }
        else
            $gara->update([
                'note' =>$request->note,
                'quotazione' =>$request->quotazione,
                'offerta' =>$request->offerta,


            ]);

        return redirect()->route('gare.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $gara = Gara::findOrFail($id);
        $gara->delete();
        $path="\RDO".$gara->rdoelotto;
        Storage::deleteDirectory($path);
        return back()->withInput();
    }

    /**
     * Serie di funzioni che restituiscono le gare con lo stato selezionato.
     *
     * @param
     * @return Application|Factory|View|RedirectResponse
     */
    public function nuovaGara(){
        $gara=Gara::where('stato_id',1)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Nuove Gare";

        return view('index',compact('gara','stato','tipo'));
    }

    public function inValutazione(){
        $gara=Gara::where('stato_id',2)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare in Valutazione";

        return view('index',compact('gara','stato','tipo'));
    }
    public function richiestaChiarimenti(){
        $gara=Gara::where('stato_id',3)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con richiesta chiarimenti";

        return view('index',compact('gara','stato','tipo'));
    }
    public function richiestaQuotazione(){
        $gara=Gara::where('stato_id',4)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con richiesta di quotazione";

        return view('index',compact('gara','stato','tipo'));
    }
    public function quotazioneRicevuta(){
        $gara=Gara::where('stato_id',5)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare con quotazione ricevuta";

        return view('index',compact('gara','stato','tipo'));
    }
    public function attesaPrezzoUscita(){
        $gara=Gara::where('stato_id',6)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare in attesa del prezzo d'uscita";

        return view('index',compact('gara','stato','tipo'));
    }
    public function daPartecipare(){
        $gara=Gara::where('stato_id',7)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare da partecipare";

        return view('index',compact('gara','stato','tipo'));
    }
    public function partecipata(){
        $gara=Gara::where('stato_id',8)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare partecipate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function revocata(){
        $gara=Gara::where('stato_id',9)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare revocate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function scartata(){
        $gara=Gara::where('stato_id',10)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare scartate";

        return view('index',compact('gara','stato','tipo'));
    }
    public function eliminata(){
        $gara=Gara::where('stato_id',11)->with('stato')->orderBy('datascadenzatotime','ASC')->get();
        $stato=Stato::all();
        $tipo="Gare eliminate";

        return view('index',compact('gara','stato','tipo'));
    }

    /**
     * Crea una directory per la gara .
     *
     * @param int $rdoelotto
     * @param int $id
     * @return RedirectResponse
     */

    public function creaCartella(int $rdoelotto,int $id): RedirectResponse
    {

        $path="\RDO".$rdoelotto;
        Storage::makeDirectory($path);
        $gara=Gara::findOrFail($id);
        $gara->update([
                'percorsocartella' =>$path,
            ]);

        return back()->withInput();
    }

    public function apriCartella($string){


    }
}
