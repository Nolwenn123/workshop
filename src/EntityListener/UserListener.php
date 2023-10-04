<?php

namespace App\EntityListener;

use App\Entity\Utilisateur;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserListener
{

    public function __construct(private UserPasswordHasherInterface $hasher)
    public function prePersist(Utilisateur $utilisateur) {

    }

    public function preUpdate(Utilisateur $utilisateur) {

    }
    public function encodePassword(Utilisateur $utilisateur) {
        if($utilisateur->getPlainPassword() === null){
            return;
        }

        $utilisateur->setPassword(
            $this->
        )
    }
}