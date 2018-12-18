<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\AdvertisementType;
use App\Extra;
use App\GenderRule;
use App\Http\Requests\AnuncioValidate;
use App\StuffingItem;
use App\Typology;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdvertisementsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $advertisements = DB::table('advertisements')
            ->join('users', 'users.id', '=', 'advertisements.user_id')
            ->where(
                [
                    ['users.id', '=', $userId],
                ])
            ->select('advertisements.*')
            ->get();

        foreach ($advertisements as $ad) {
            $ad->images = array();
            $path       = 'advertisementImages/' . $ad->id;
            if (file_exists($path)) {
                $files = glob($path . '/*.{jpg,png,gif}', GLOB_BRACE);
                foreach ($files as $f) {
                    array_push($ad->images, $f);
                }
            }
        }

        return view('myads', ["ads" => $advertisements]);
    }

    public function store()
    {
        //

        Session::flash('store');
        return back();
    }

    public function destroy($id)
    {
        Advertisement::find($id)->delete();
        Session::flash('success', 'Anúncio removido com sucesso!');
        return redirect()->back();
    }

    public function infoInserirAnuncio()
    {
        $typologies           = Typology::all();
        $genderRules          = GenderRule::all();
        $extras               = Extra::all();
        $stuffingItems        = StuffingItem::all();
        $advertisements_types = AdvertisementType::all();

        return view('inserirAnuncio', ["typologies" => $typologies, "genderRules" => $genderRules, "extras" => $extras, "stuffingItems" => $stuffingItems, "advertisements_types" => $advertisements_types]);
    }

    public function inserirAnuncio(AnuncioValidate $request)
    {
        $data                  = $request->all();
        $data["anoConstrucao"] = substr($data["anoConstrucao"], 0, 4);
        $anuncio               = new Advertisement();

        $validated = $data->validated();

        $anuncio->fill($data);
        $user = Auth::user();
        $user->advertisements()->save($anuncio);

        $path = public_path() . '/advertisementImages/' . $anuncio->id;
        File::makeDirectory($path, $mode = 0777, true, true);

        for ($i = 0; $i < count($data["imagensPost"]); $i++) {
            $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data["imagensPost"][$i]));
            file_put_contents(public_path('advertisementImages/' . $anuncio->id) . "\\" . time() . $i . '.png', $image);
        }

        if ($request->exists('extra')) {
            for ($i = 0; $i < count($data["extra"]); $i++) {
                $anuncio->extras()->attach($data["extra"][$i]);
            }
        }

        if ($request->exists("stuffingItem")) {
            for ($i = 0; $i < count($data["stuffingItem"]); $i++) {
                $anuncio->stuffing_items()->attach($data["stuffingItem"][$i]);
            }
        }
        dd($data);
        //return view('inserirAnuncio');
    }

    public function detailInfo($id)
    {
        $anuncio           = Advertisement::find($id);
        $anuncio->typology = $anuncio->typologies->description;
        $anuncio->type     = $anuncio->advertisementType->description;
        error_log($anuncio->type);
        $anuncio->genderRule = $anuncio->genderRule->description;
        $user                = $anuncio->user;
        error_log(print_r($anuncio->user_id, true));
        if ($anuncio) {
            $extras        = $anuncio->extras;
            $stuffingItems = $anuncio->stuffing_items;

            $advertisementExtras        = array();
            $advertisementStuffingItems = array();

            foreach ($extras as $extra) {
                array_push($advertisementExtras, $extra->name);
            }
            foreach ($stuffingItems as $stuffingItem) {
                array_push($advertisementStuffingItems, $stuffingItem->name);
            }
            $path = 'advertisementImages/' . $anuncio->id;
            if (File::exists($path)) {
                $images = File::allFiles(public_path($path));
            } else {
                $images = [];
            }

            return view('detail', ["anuncio" => $anuncio,
                "advertisementStuffingItems"     => $advertisementStuffingItems,
                "advertisementExtras"            => $advertisementExtras, "imagens" => $images, "user" => $user]);
        }
    }

    public function listarAnuncios(Request $request)
    {
        $tipologias   = Typology::all();
        $tiposAluguer = AdvertisementType::all();
        $anuncios     = Advertisement::paginate(5);
        foreach ($anuncios as $anuncio) {
            $path = 'advertisementImages/' . $anuncio->id;
            if (File::exists($path)) {
                $images         = File::allFiles(public_path($path));
                $anuncio->image = $path . "/" . $images[0]->getFileName();
            } else {
                $anuncio->image = "storage/images/ads/none.png";
            }
        }
        return view('listagemAnuncios', ["anuncios" => $anuncios, "tipologias" => $tipologias,
            "tiposAluguer"                              => $tiposAluguer]);
    }

    public function filtrarAnuncios(Request $request)
    {
        $tipologia   = $request->input('tipologia');
        $tipoAluguer = $request->input('tipoAluguer');
        $precoDe     = $request->input('precoDe');
        $precoAte    = $request->input('precoAte');
        $donoReside  = $request->input('donoReside');
        error_log($donoReside);
        $factura = $request->input('factura');
        $caucao  = $request->input('caucao');

        $anuncios = DB::table('advertisements')
            ->when($tipologia, function ($query) use ($tipologia) {
                return $query->where('typology', '=', $tipologia);
            })
            ->when($tipoAluguer, function ($query) use ($tipoAluguer) {
                return $query->where('type', '=', $tipoAluguer);
            })
            ->when($precoDe, function ($query) use ($precoDe) {
                return $query->where('price', '>=', $precoDe);
            })
            ->when($precoAte, function ($query) use ($precoAte) {
                return $query->where('price', '<=', $precoAte);
            })
            ->when($donoReside == "1" || $donoReside == "0", function ($query) use ($donoReside) {
                return $query->where('landlordResides', '=', $donoReside);
            })
            ->when($factura == "1" || $factura == "0", function ($query) use ($factura) {
                return $query->where('providesInvoice', '=', $factura);
            })
            ->when($caucao == "1" || $caucao == "0", function ($query) use ($caucao) {
                return $query->where('needsSecurityDeposit', '=', $caucao);
            })
            ->get();

        if (count($anuncios)) {
            foreach ($anuncios as $anuncio) {
                $path = 'advertisementImages/' . $anuncio->id;
                if (File::exists($path)) {
                    $images         = File::allFiles(public_path($path));
                    $anuncio->image = $path . "/" . $images[0]->getFileName();
                } else {
                    $anuncio->image = "storage/images/ads/none.png";
                }
            }
        }
        return response()->json($anuncios);
    }

    public function destaques()
    {
        $anuncios=Advertisement::orderBy('nrVisualizacoes','DESC')
                                ->orderBy('created_at','DESC')
                                ->limit(3)->get();

        if(count($anuncios)){
            for($i=0;$i<count($anuncios);$i++)
            {
                $path = 'advertisementImages/' . $anuncios[$i]->id;
                if (File::exists($path)) {
                    $images         = File::allFiles(public_path($path));
                    $anuncios[$i]->image = $path . "/" . $images[0]->getFileName();
                } else {
                    $anuncios[$i]->image = "storage/images/ads/none.png";
                }
            }
        }

        error_log(print_r($anuncios,TRUE));

        return view('welcome',["anuncios"=>$anuncios]);
    }
}
