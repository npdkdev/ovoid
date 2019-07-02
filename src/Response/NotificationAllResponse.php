<?php

namespace Khenop\Ovo\Response;

class NotificationAllResponse
{
    private $notifications;

    public function __construct($decoded)
    {
        $this->notifications = $decoded->notifications;
    }
    
    /**
     * get all notif
     *
     * @return array
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

}
