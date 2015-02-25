<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 25/02/15
 * Time: 7:33
 */

namespace Hospity\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="host_user")
 */
class User extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        //your own logic
    }
} 