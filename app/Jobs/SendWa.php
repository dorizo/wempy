<?php

namespace App\Jobs;

use App\Models\whatsapp_detail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendWa implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $api_key;
    protected $sender;
    protected $number;
    protected $media_type;
    protected $url;
    protected $caption;
    public function __construct($api_key,$sender,$number,$media_type,$url,$caption)
    {
        //
        $this->api_key = $api_key;
        $this->sender = $sender;
        $this->number = $number;
        $this->media_type = $media_type;
        $this->url = $url;
        $this->caption = $caption;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $data = [
            'api_key' => $this->api_key,
            'sender' => $this->sender,
            'number' => $this->number ,
            'media_type' => $this->media_type ,
            'caption' =>  $this->caption,
            'url' => $this->url
            ];
            
            // $this->url
            // "https://wa.mekhaenergy.com/storage/uploads/1715426771_wempy.jpg"
            // echo json_encode($data);
            // die();
            $curl = curl_init();                            
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://wa.srv34.wapanels.com/send-media',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
            ),
            ));                          
            $response = curl_exec($curl);    
            // if(curl_exec($curl)){ // ?? - if request and data are completely received
            //     return false;
            //     }else{
            //     return true;
            //     }                 
            curl_close($curl);
            echo $response;
    }
}
