<?php
/**
 * Created by PhpStorm.
 * User: Geoffrey Lopez
 * Date: 10/12/2018
 * Time: 23:19
 */

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class User {
    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner un email valide.")
     */
    public $email;

    /**
     * @var string
     * @Assert\NotNull(message="Veuillez renseigner un mot de passe.")
     */

    public $password;
}