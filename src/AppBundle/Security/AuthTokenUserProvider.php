<?php
# src/AppBundle/Entity/AuthTokenUserProvider.php

namespace AppBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityManager;

class AuthTokenUserProvider implements UserProviderInterface
{
    protected $authTokenRepository;
    protected $userRepository;

    public function __construct(EntityManager $_em)
    {
        $this->authTokenRepository = $_em->getRepository('AppBundle:AuthToken');
        $this->userRepository =  $_em->getRepository('AppBundle:User');
    }

    public function getAuthToken($authTokenHeader)
    {
        return $this->authTokenRepository->findOneByValue($authTokenHeader);
    }

    public function loadUserByUsername($email)
    {
        return $this->userRepository->findOneByEmail($email);
    }

    public function refreshUser(UserInterface $user)
    {
        // Le systéme d'authentification est stateless, on ne doit donc jamais appeler la méthode refreshUser
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'AppBundle\Entity\User' === $class;
    }
}