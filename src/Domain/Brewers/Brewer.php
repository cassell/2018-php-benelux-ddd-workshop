<?php

namespace Beeriously\Domain\Brewers;

/**
 * Brewer
 *
 * @ORM\Table(name="brewer")
 * @ORM\Entity
 */
class Brewer
{

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50, nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     */
    private $firstName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100, nullable=false)
     */
    private $lastName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    public function __construct(Username $username,
                                FullName $fullName,
                                EmailAddress $emailAddress)
    {
        $this->id = BrewerId::newId()->getValue();
        $this->username = $username->getValue();
        $this->firstName = $fullName->getFirstName()->getValue();
        $this->lastName = $fullName->getLastName()->getValue();
        $this->email = $emailAddress->getValue();
    }

    public function getId(): BrewerId
    {
        return BrewerId::fromString($this->id);
    }

    public function getUsername(): Username
    {
        return new Username($this->username);
    }

    public function getFullName(): FullName
    {
        return new FullName(new FirstName($this->firstName),new LastName($this->lastName));
    }

    public function getEmail(): EmailAddress
    {
        return new EmailAddress($this->email);
    }

    public function changeEmailAddress(EmailAddress $newEmail)
    {
        $this->email = $newEmail->getValue();
    }

    public function changeName(FullName $newName)
    {
        $this->firstName = $newName->getFirstName()->getValue();
        $this->lastName = $newName->getLastName()->getValue();
    }

}