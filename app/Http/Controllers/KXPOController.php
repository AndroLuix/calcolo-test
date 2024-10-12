<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KXPOController extends Controller
{
    //KXPO = (aSU ) + PitchAngle ⋅ g + AngularAccelerationPitch ⋅ (VerticalShift + CG − T ) / g

//     L'accelerazione costante è aus = 0.5
// L'accelerazione gravitazionale è g = 9.81 m/s2.
// PitchAngle: Angolo di pitch in radianti (preimpostato a 7.5 gradi convertiti in radianti)
// AngularAccelerationPitch: Accelerazione angolare del pitch (preimpostata a 0.105 rad/s²)
// VerticalShift: Posizione dell'ascensore (in metri)
// CG_h: Altezza del centro di gravità (in metri), calcolata in base alla lunghezza della nave: 
// nel request->CGH
// T_sc: Valore di stabilità della nave (Pescaggio a pieno carico) in metri 
// nella request->tsc

    public function submit(Request $request){
       

        // accellerazione costante
        $aSU = 0.5;
        // accellerazione gravitazionale 
        $g = 9.81;

        //PitchAngle
        $request->radiante;

        // AngularAccelerationPitch
        $request->AngularAccelerationPitch;

        // verticalShift 
        $request->verticalPosition; //rads2

        //CGh 
        $request->CGH;

    }

}
