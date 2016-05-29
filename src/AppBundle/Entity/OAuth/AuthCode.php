<?php

namespace Ready\AppBundle\Entity\OAuth;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;
use FOS\OAuthServerBundle\Model\AuthCodeInterface;
use FOS\OAuthServerBundle\Model\ClientInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ClientInterface
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="Ready\AppBundle\Entity\User")
     */
    protected $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     *
     * @return AuthCodeInterface
     */
    public function setClient(ClientInterface $client): AuthCodeInterface
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     *
     * @return AuthCodeInterface
     */
    public function setUser(UserInterface $user): AuthCodeInterface
    {
        $this->user = $user;

        return $this;
    }
}
