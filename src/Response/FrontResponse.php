<?php

namespace Khenop\Ovo\Response;

class FrontResponse
{
    /**
     * Balance Model
     *
     * @var \Khenop\Ovo\Response\Model\Balance
     */
    private $balance;

    /**
     * Permission Model
     *
     * @var \Khenop\Ovo\Response\Model\Permission
     */
    private $permission;

    /**
     * Pofile Model
     *
     * @var \Khenop\Ovo\Response\Model\Profile
     */
    private $profile;

    public function __construct($data)
    {
        $this->balance = new \Khenop\Ovo\Response\Model\Balance($data->balance);
        $this->permission = new \Khenop\Ovo\Response\Model\Permission($data->permissions);
        $this->profile = new \Khenop\Ovo\Response\Model\Profile($data->profile);
    }

    /**
     * Get balance Model
     *
     * @return \Khenop\Ovo\Response\Model\Balance
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Get balance Model
     *
     * @return \Khenop\Ovo\Response\Model\Permission
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Get balance Model
     *
     * @return \Khenop\Ovo\Response\Model\Profile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
