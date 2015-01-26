<?php
    function curl($url)
    {

        if (function_exists('curl_version')) {
            $ch = curl_init();
            curl_setopt_array($ch, array(CURLOPT_URL => $url, CURLOPT_HEADER => false, CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 4));
            $data = @curl_exec($ch);
            @curl_close($ch);

            if (empty($data)) {

                if (function_exists('fopen') && ini_get('allow_url_fopen')) {
                    $context = stream_context_create(array('http' => array('timeout' => 4.0)));
                    $handle = @fopen($url, 'r', false, $context);
                    $file = @stream_get_contents($handle);
                    @fclose($handle);
                    return $file;
                } else {
                    //shoot
                    die();
                }

            }

            return $data;
        } else {
            // if(function_exists('curl_version'))

            if (function_exists('fopen') && ini_get('allow_url_fopen')) {
                $context = stream_context_create(array('http' => array('timeout' => 4.0)));
                $handle = @fopen($url, 'r', false, $context);
                $file = @stream_get_contents($handle);
                @fclose($handle);
                return $file;
            } else {
                //shoot
                die();
            }

        }

        // close else
    }

    // end of curl function.

    function GetRep($sid64)
    {

        try {
            $url = "http://steamrep.com/api/beta2/reputation/{$sid64}?json=1";
            $text = curl($url);
            $json = json_decode($text, true);
            if (isset($json['steamrep']['reputation']['summary'])) {
                return $json['steamrep']['reputation']['summary'];
            } else {
                return "none";
            }
        } catch (exception $ex) {
            return "none";
        }
    }// steamrep api ends

    function getname($steamid)
    {
        $steamname = '';
        $api_key = "762D38CDB247A55F41A80C11E2467987"; // Insert API Key here!

        $urla = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $api_key;
        $urlb = "&steamids=";
        $urlc = $urla . $urlb;
        $url = $urlc . $steamid;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        $content = json_decode($content, true);
        $steamname = $content['response']['players'][0]['personaname'];
        return $steamname;
    }
    function profileurl($steamid){
        $profileurl = '';
        $api_key = "762D38CDB247A55F41A80C11E2467987"; // Insert API Key here!

        $urla = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $api_key;
        $urlb = "&steamids=";
        $urlc = $urla . $urlb;
        $url = $urlc . $steamid;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        $content = json_decode($content, true);
        $profileurl = $content['response']['players'][0]['profileurl'];
        return $profileurl;

    }
    function getimgurl($steamid){
        $getimgurl = '';
        $api_key = "762D38CDB247A55F41A80C11E2467987"; // Insert API Key here!

        $urla = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $api_key;
        $urlb = "&steamids=";
        $urlc = $urla . $urlb;
        $url = $urlc . $steamid;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        curl_close($ch);
        $content = json_decode($content, true);
        $getimgurl = $content['response']['players'][0]['avatarfull'];
        return $getimgurl;

    }
    function converttosteamid($steamvanityurl){
        $steamid64 = '';
        $url = "http://steamcommunity.com/id/".$steamvanityurl."?xml=1";
        $xml=simplexml_load_file($url);
        if(!$xml){
            echo "not a valid steam vanity url";
        }
        else{
            $steamid64 = $xml->steamID64;
            return $steamid64;
        }
    }
   

 function stateMessage($steamid64)
    {
    	$statemessage = '';
        $isonline = "false";
        $url = "http://steamcommunity.com/profiles/".$steamid64."?xml=1";
        $xml=simplexml_load_file($url,'SimpleXMLElement', LIBXML_NOCDATA);
        if(!$xml){
            echo "not a valid SteamID64 URL or Steam servers are currently down.";
        }
        else{
            $statemessage = $xml->stateMessage;
            if($statemessage =="Online")
            {
                $isonline = " Online";
                return $isonline;
            }
            else{
                $isonline = " Offline";
                return $isonline;
            }
        }
        
    }