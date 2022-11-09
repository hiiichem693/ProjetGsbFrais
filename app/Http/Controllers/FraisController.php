<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Session;
use App\metier\Frais;
use Exception;
use App\Exceptions\MonException;
use App\dao\ServiceFrais;

class FraisController extends Controller
{
    public function getFraisVisiteur() {
        try {
            $monErreur = Session::get('monErreur');
            Session::forget('monErreur');
            $unServiceFrais = new ServiceFrais();
            $id_visiteur = Session::get('id');
            $mesFrais = $unServiceFrais->getFrais($id_visiteur);
            return view('Vues/listeFrais', compact('mesFrais', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function updateFrais($id_frais) {
        try {
            $monErreur = "";
            $unServiceFrais = new ServiceFrais();
            $unFrais = $unServiceFrais->getById($id_frais);
            $titreVue = "Modification d'une fiche de frais";
            return view('vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function validateFrais() {
        try {
            $id_frais = Request::input('id_frais');
            $anneemois = Request::input('anneemois');;
            $nbjustificatifs = Request::input('nbjustifcatifs');
            $unServiceFrais = new ServiceFrais();
            if ($id_frais>0) {
                $unServiceFrais->updateFrais($id_frais, $anneemois, $nbjustificatifs);
            } else {
                $montant = Request::input('montant');
                $id_visiteur = Session::get('id');
                $unServiceFrais->insertFrais($anneemois, $nbjustificatifs, $id_visiteur, $montant);
            }
            return redirect('/getListeFrais');
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function addFrais() {
        try {
            $unFrais = new Frais();
            $monErreur = "";
            $titreVue = "Ajout d'une fiche de Frais";
            return view('Vues/formFrais', compact('unFrais', 'titreVue', 'monErreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        }
    }

    public function supprimeFrais($id_frais) {
        $unServiceFrais = new ServiceFrais();
        try {
            $unServiceFrais->deleteFrais($id_frais);
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('Vues/error', compact('monErreur'));
        } catch (Exception $e) {
            Session::put('monErreur', $e->getMessage());
        } finally {
            return redirect('/getListeFrais');
        }

    }
}
