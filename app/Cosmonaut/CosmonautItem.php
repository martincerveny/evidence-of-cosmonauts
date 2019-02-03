<?php

namespace App\Cosmonaut;

/**
 * Class CosmonautItem
 * @package App\Cosmonaut
 */
class CosmonautItem implements CosmonautItemInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var string
     */
    protected $date_of_birth;

    /**
     * @var string
     */
    protected $superpower;

    /**
     * @var string|null
     */
    protected $created_at;

    /**
     * @var string|null
     */
    protected $updated_at;

    /**
     * CosmonautItem constructor.
     * @param array|null $row
     */
    public function __construct(array $row = null)
    {
        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->surname = $row['surname'];
        $this->date_of_birth = $row['date_of_birth'];
        $this->superpower = $row['superpower'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * @return string
     */
    public function getSuperpower(): string
    {
        return $this->superpower;
    }

    /**
     * @return null|string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return null|string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }
}
