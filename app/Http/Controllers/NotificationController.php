<?php

namespace App\Http\Controllers;

use App\Mail\MailValidation;
use App\Models\Commande_envoye;
use App\Models\Devis;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    //
    public function getNotificationSpeficique(Request $request){
        $etat = $request->get('etat');
        $notif['commande'] = Commande_envoye::where('id_etat', $etat)
                                ->get();
        return response()->json($notif['commande']);
    }

    public function getProduitDetail(Request $request){
        $id = $request->get('id');
        $produit['detail'] = Commande_envoye::where('id', $id)
                                ->get();
        return response()->json($produit['detail']);
    }

    public function validateProduit(Request $request){
        $idDevis = $request->get('idDevis');
        //$mailClient = $request->get('mail');
        $devis = Devis::find($idDevis);
        $devis->id_etat = 2;
        $devis->update();

        $data = Commande_envoye::where('id', $idDevis)
                    ->get();

        $mail = array(
            'subject' => $data[0]['designation'],
            'datecommande' => $data[0]['datedemande'],
            'puissance' => $data[0]['puissance'],
            'prix' => $data[0]['prix']
        );

        $devis['modif'] = Devis::where('id', $idDevis)
                            ->where('id_etat', 2)
                            ->get();
        if($devis['motif']) return ["Result"=>"Failed"];
        else{
            //Mail::to($mailClient)->send(new MailValidation($mail));

            return ["Result"=>"Success"];

            //return response()->json($devis->email_client);
        }
    }
}
