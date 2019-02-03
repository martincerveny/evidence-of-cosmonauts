<?php

namespace App\Cosmonaut;


/**
 * Class CosmonautItem
 * @package App\Cosmonaut
 */
interface CosmonautItemInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getSurname(): string;

    /**
     * @return string
     */
    public function getDateOfBirth(): string;

    /**
     * @return string
     */
    public function getSuperpower(): string;

    /**
     * @return null|string
     */
    public function getCreatedAt(): ?string;

    /**
     * @return null|string
     */
    public function getUpdatedAt(): ?string;
}
