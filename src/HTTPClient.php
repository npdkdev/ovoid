<?php

namespace Khenop\Ovo;

interface HTTPClient
{
    /**
     * send post request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     * @return \Khenop\Ovo\ParseResponse
     */
    public function post($url, $data, $headers);

    /**
     * send post request
     *
     * @param  string                $url
     * @param  array                 $data
     * @param  array                 $headers
     * @return \Khenop\Ovo\ParseResponse
     */
    public function get($url, $data, $headers);
}
