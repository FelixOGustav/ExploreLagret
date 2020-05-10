<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use Carbon\Carbon;

class EmailExist implements Rule
{

    private $email;
    private $requestAddress = 'https://app.verify-email.org/api/v1/tbtJfT74U8AMN10zfmPNDCMs6kLt6kQVTh6fdwVJBGwvfduekE/verify/';
    private $badMailDomains = ["@hotmail.com", "@live.se", "@outlook.com"];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->email = $value;
        $client = new Client();
        $httpResponse = $client->request('GET', $this->requestAddress . $this->email);
        $response = $this->extractResponse($httpResponse->getBody()->getContents());
        
        $this->logMessage($response);
        
        switch ($response->status) {
            case 1: // OK                
                return true;
                break;
            case -1: // Might be bad domain
                $prefix = '[' . Carbon::now() . '] | [ Email validator] | ';
                $newLine = "\n";
                $logFilePath = 'logs/registrationLog.log';
                
                if($response->smtp_log == "unknown" || $response->smtp_log == "TransientNetworkFault"){
                    file_put_contents(storage_path($logFilePath), $prefix . 'Allowing any way..' . $newLine, FILE_APPEND);
                    return true;
                } else {
                    return false;
                }
                break;
            default: // Not OK
                return false;
                break;
        }
    }

    private function extractResponse($response){
        $resp = new ResponseData();
        $jsonDecoded = json_decode($response, true);

        $resp->email = $jsonDecoded["email"];
        $resp->status = $jsonDecoded["status"];
        $resp->status_description = $jsonDecoded["status_description"];
        $resp->smtp_code = $jsonDecoded["smtp_code"];
        $resp->smtp_log = $jsonDecoded["smtp_log"];
        return $resp;
    }

    private function logMessage($response){
        $prefix = '[' . Carbon::now() . '] | [ Email validator] | ';
        $newLine = "\n";
        $logFilePath = 'logs/registrationLog.log';
        
        file_put_contents(storage_path($logFilePath), $prefix . 'Email:              ' . $response->email . $newLine, FILE_APPEND);
        file_put_contents(storage_path($logFilePath), $prefix . 'status:             ' . $response->status . $newLine, FILE_APPEND);
        file_put_contents(storage_path($logFilePath), $prefix . 'Status Description: ' . $response->status_description . $newLine, FILE_APPEND);
        file_put_contents(storage_path($logFilePath), $prefix . 'SMTP Code:          ' . $response->smtp_code . $newLine, FILE_APPEND);
        file_put_contents(storage_path($logFilePath), $prefix . 'SMTP Log:           ' . $response->smtp_log . $newLine, FILE_APPEND);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $suffix = "";
        if($this->contains($this->email, $this->badMailDomains)){
            $suffix = ". Undvik mailaddresser som slutar på: ";
            foreach($this->badMailDomains as $badMailDomain){
                $suffix .= $badMailDomain . ", ";
            }
        }

        return 'Den angivna mailaddressen ' . $this->email . ' kunde inte valideras att den finns. Vänligen ange en mailaddress som existerar' . $suffix;
    }

    function contains($str, array $arr)
    {
        foreach($arr as $a) {
            if (stripos($str,$a) !== false) return true;
        }
        return false;
    }

}

class ResponseData {
    public $email;
    public $status;
    public $status_description;
    public $smtp_code;
    public $smtp_log;
}
