<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stade;
use App\Models\TypeMedia;
use App\Models\Inscription;
use Illuminate\Support\Facades\DB;

class EtatController extends Controller
{
    public function stade()
    {
        $stades = Stade::all();

        $inscriptions = [];

        return view('admin.inscriptions.inscription_stade', compact('stades', 'inscriptions'));
    }

    public function media()
    {
        $types = TypeMedia::all();

        $inscriptions = [];

        return view('admin.inscriptions.inscription_type_media', compact('types', 'inscriptions'));
    }

    public function searchMedia(Request $request){

    }

    public function postStade(Request $request)
    {
        $this->validate($request, [
            'stade_id' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute est un champ obliagatoire.',
            ]
        );

        $inscriptions = Inscription::where('stade_id', $request->stade_id)
                            ->get();

        $stades = Stade::all();

        return view('admin.inscriptions.inscription_stade', compact('stades', 'inscriptions'));

    }

    public function postMedia(Request $request)
    {
        $this->validate($request, [
            'type_media_id' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute est un champ obliagatoire.',
            ]
        );

        $inscriptions = Inscription::where('type_media_id', $request->type_media_id)
                            ->get();

        $types = TypeMedia::all();

        return view('admin.inscriptions.inscription_type_media', compact('types', 'inscriptions'));
    }

    public function searchStade(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            //$total_amount = 0;
            $query = $request->get('query');
            //$now = Carbon::today()->toDateString();

            if($query != '')
            {
               /* $data = DB::table('inscriptions')
                            ->where('stade_id', '=', $query)
                            //->whereDate('date_collect', '=', $now)
                            ->get();*/
                $data = Inscription::where('stade_id', $query)
                                    ->get();
            }
            /* else
            {
            $data = DB::table('orders')
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get();  

                $data = [];

                
            } */ 
            /*foreach($data as $row1){
                $total_amount += $row1->order_amount;
            }*/
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->nom_media.'</td>
                    <td>'.$row->email.'</td>
                    <td>'.$row->phone_number.'</td>
                    <td>'.$row->evenement->date_match.'</td>
                    <td>'.$row->evenement->journee->code.'</td>
                    <td>'.$row->evenement->stade->ville->title.'</td>
                    <td>'.$row->evenement->stade->title .'</td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output = '
                <tr>
                    <td align="center" colspan="7">Aucune collete trouvée pour ce stade</td>
                </tr>';
            }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row,
                //'total_amount'  => $total_amount,
                );

                echo json_encode($data);
        }

    }
}
