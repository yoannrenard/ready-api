<?php

namespace Ready\AppBundle\Entity\OAuth;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic (with a nice interface J)
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
