<?php

namespace App\Http\Controllers;

use App\Jobs\SendWa;
use App\Models\Settingblash;
use App\Models\whatsapp_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\Storewhatsapp_detailRequest;
use App\Http\Requests\Updatewhatsapp_detailRequest;

class WhatsappDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function sendwa($member,$wa){
        $text  = DB::table("whatsapp_details")->join('whatsapps', 'whatsapps.whatsappCode', '=', 'whatsapp_details.whatsappCode')->join('members', 'members.memberCode', '=', 'whatsapp_details.memberCode')->where("members.memberCode" , $member)->where("members.memberCode" , $member)->first();
    //    dd($text);
       $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://graph.facebook.com/v18.0/116833298187730/messages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{ "messaging_product": "whatsapp",
             "to":  "'.$text->telp.'" ,
            "type": "template",
            "template":{
                "name" : "hello_world",
                "language": { "code": "en_US" } 
            }
            }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer EAAEoweWmOuQBOZBxfhXUyeZCAbzB6KGQ543mYKBqXQT2XyWprE3ZBMjpF6qhn4NIZCGlvDhbEng6pZCDqs893zXWl2GG4sF9C9DdyZAzojZAn7n5E7BVEZBDNAZC4uxcZBTahtdjmpzJTA6evskstJcC5fniLYVp7wJCcXWgEqjDlj9Ozfj1nVN6ZAkcJJpFkiF',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // return $response;
            
        return response()->json($response);

    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storewhatsapp_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storewhatsapp_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\whatsapp_detail  $whatsapp_detail
     * @return \Illuminate\Http\Response
     */
    public function show(whatsapp_detail $whatsapp_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\whatsapp_detail  $whatsapp_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(whatsapp_detail $whatsapp_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatewhatsapp_detailRequest  $request
     * @param  \App\Models\whatsapp_detail  $whatsapp_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Updatewhatsapp_detailRequest $request, whatsapp_detail $whatsapp_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\whatsapp_detail  $whatsapp_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(whatsapp_detail $whatsapp_detail)
    {
        //
    }

    public function wapanels($id){
        $m = Settingblash::get()->toArray();
        $ssss = count($m)-1;
        $s = whatsapp_detail::where("whatsappCode" , $id)->get();
        foreach ($s as $key => $value) {
            switch ($value->wa->type) {
                case 'gambar':
                        $job = new SendWa($m[rand(0,$ssss)]["apikey"] ,$m[rand(0,$ssss)]["phone"], $value->member->telp,'image', URL::to("storage/uploads/".$value->wa->gambar) ,$value->wa->WhatsappDesc);
                        $this->dispatch($job);
                    break;
                    case 'text':
                    break;
                default:
                    # code...
                    break;
            }
        }
        
        return redirect()->back()
        ->withSuccess('Berhasil Mengirim Pesan Di Cron Job');
    
    }
}
