<?php

namespace Khenop\Ovo;

class ParseResponse
{
    /**
     * store Class
     *
     * @var array
     */
    public $storeClass = [
        OVOID::BASE_ENDPOINT . 'v2.0/api/auth/customer/login2FA'                 => 'Khenop\Ovo\Response\Login2FAResponse',
        OVOID::BASE_ENDPOINT . 'v2.0/api/auth/customer/login2FA/verify'          => 'Khenop\Ovo\Response\Login2FAVerifyResponse',
        OVOID::BASE_ENDPOINT . 'v2.0/api/auth/customer/loginSecurityCode/verify' => 'Khenop\Ovo\Response\LoginSecurityCodeResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/api/front/'                                 => 'Khenop\Ovo\Response\FrontResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/budget/detail'                              => 'Khenop\Ovo\Response\BudgetResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/api/customers/transfer'                     => 'Khenop\Ovo\Response\CustomerTransferResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/api/auth/customer/genTrxId'                 => 'Khenop\Ovo\Response\GenTrxIdResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/notification/status/count/UNREAD'           => 'Khenop\Ovo\Response\NotificationUnreadResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/notification/status/all'                    => 'Khenop\Ovo\Response\NotificationAllResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/api/auth/customer/logout'                   => 'Khenop\Ovo\Response\LogoutResponse',
        OVOID::BASE_ENDPOINT . 'v1.0/api/auth/customer/unlock'                        => 'Khenop\Ovo\Response\CustomerUnlockResponse'
    ];

    private $response;

    /**
     * Parse response init
     *
     * @param mixed  $chResult
     * @param string $url
     */
    public function __construct($chResult, $url)
    {
        $jsonDecodeResult = json_decode($chResult);
        
        //-- Cek apakah ada error dari OVO Response
        if (isset($jsonDecodeResult->code)) {
            throw new \Khenop\Ovo\Exception\OvoidException($jsonDecodeResult->message . ' ' . $url);
        }

        $parts = parse_url($url);

        if ($parts['path'] == '/wallet/v2/transaction') {
            $this->response = new \Khenop\Ovo\Response\WalletTransactionResponse($jsonDecodeResult);
        } else {
            $this->response = new $this->storeClass[$url]($jsonDecodeResult);
        }
    }

    /**
     * Get response following by class
     *
     * @return void
     */
    public function getResponse()
    {
        return $this->response;
    }
}
