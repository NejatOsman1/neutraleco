<?php
namespace App\CmsBundle\Service;

use App\CmsBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordEncoder
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function encode(User $User, string $password): string
    {
        return $this->passwordEncoder->encodePassword($User, $password);
    }
}