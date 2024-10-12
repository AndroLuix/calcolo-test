<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KXPOController extends Controller
{
    //KXPO = (aSU )2 + (PitchAngle ⋅ g + AngularAccelerationPitch ⋅ (VerticalShift + CGh − T ))2 / g

    //     L'accelerazione costante è aus = 0.5
    // L'accelerazione gravitazionale è g = 9.81 m/s2.
    // PitchAngle: Angolo di pitch in radianti (preimpostato a 7.5 gradi convertiti in radianti)
    // AngularAccelerationPitch: Accelerazione angolare del pitch (preimpostata a 0.105 rad/s²)
    // VerticalShift: Posizione dell'ascensore (in metri)
    // CG_h: Altezza del centro di gravità (in metri), calcolata in base alla lunghezza della nave: 
    // nel request->CGH
    // T_sc: Valore di stabilità della nave (Pescaggio a pieno carico) in metri 
    // nella request->tsc

    public function submit(Request $request)
    {


        // Validazione dati (opzionale, puoi aggiungere altre regole)


        $validator = Validator::make($request->all(), [
            'length' => 'required|numeric',
            'tsc' => 'required|numeric',
            'verticalPosition' => 'required|numeric',
            'CGH' => 'required|numeric',
            'radiante' => 'required|numeric',
            'AngularAccelerationPitch' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            // errori specifici
            $errors = $validator->errors();
            
            // Ritorna un JSON con i dettagli degli errori
            return response()->json([
                'error' => 'Errore di validazione dati',
                'details' => $errors // Questo include gli errori specifici dei campi
            ], 422);
        }
        



        //dati dal form
        $pitchAngle = $request->radiante; //pitch angle in radianti
        $angularAccelerationPitch = $request->AngularAccelerationPitch; //Acc. angolare
        $verticalShift = $request->verticalPosition; // Posizione verticale
        $CGH = $request->CGH; // Altezza del centro di gravità
        $tsc = $request->tsc; // Valore T_sc (Pescaggio a pieno carico)



        $KXPO = $this->calcolaKXPO($pitchAngle, 
        $angularAccelerationPitch, 
        $verticalShift, 
        $CGH, $tsc);


        
        return response()->json([
            'kxpo' => number_format($KXPO, 2),
            200
        ]);
    }


    private function calcolaKXPO($pitchAngle, $angularAccelerationPitch, $verticalShift, $CGH, $tsc)
    {

        // Costanti
        $aSU = 0.5;  
        $g = 9.81;  
        

        $PRIMA_OPERAZIOEN = $verticalShift + $CGH - $tsc; // Ok

        $SECONDA_OPERAZIONE = $angularAccelerationPitch * $PRIMA_OPERAZIOEN; // OK




        $TERZA_OPERAZIONE = ($pitchAngle * $g) + ($SECONDA_OPERAZIONE);

        $TERZA_OPERAZIONE_ELEVATA2 =  pow($TERZA_OPERAZIONE, 2);

        $ASU2 = pow($aSU, 2);

        $QUARTA_OP = $ASU2 + $TERZA_OPERAZIONE_ELEVATA2;

        return  $QUARTA_OP / $g;

         
    }
}
