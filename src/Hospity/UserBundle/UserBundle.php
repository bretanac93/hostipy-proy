<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 25/02/15
 * Time: 7:31
 */

namespace Hospity\UserBundle;


use Symfony\Component\HttpKernel\Bundle\Bundle;

class UserBundle extends Bundle{
    public function getParent() {
        return 'FOSUserBundle';
    }
} 