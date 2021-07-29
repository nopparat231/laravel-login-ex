<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Modules\Line\Constant\LineHookHttpResponse;

class LineHookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function hooks(Request $request)
    {
 
            $httpClient = new CurlHTTPClient(env('LINE_CHANNEL_ACCESS_TOKEN'));
            $bot = new LINEBot($httpClient, [
                'channelSecret' => env('LINE_CHANNEL_SECRET')
            ]);
    
            $signature = $request->header(LINEBot\Constant\HTTPHeader::LINE_SIGNATURE);
            if(!$signature) {
                return $this->http403(LineHookHttpResponse::SIGNATURE_INVALID);
            }
    
            try {
                $bot->parseEventRequest($request->getContent(), $signature);
            } catch (LINEBot\Exception\InvalidSignatureException $exception) {
                return $this->http403(LineHookHttpResponse::SIGNATURE_INVALID);
            } catch (LINEBot\Exception\InvalidEventRequestException $exception) {
                return $this->http403(LineHookHttpResponse::EVENTS_INVALID);
            }
    
            $events = $request->events;
            foreach ($events as $event) {
               logger(json_encode($event));
            }
            return $this->http200('anchor');
       
    }
    
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
