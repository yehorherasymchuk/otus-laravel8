<?php
/**
 * Description of CompaniesFiltersDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Yehor Herasymchuk <yehor@dotsplatform.com>
 */

namespace App\Services\Companies\DTO;


class CompaniesFiltersDTO
{

    private ?string $name;
    private ?int $city_id;
    private ?int $status;
    private array $statuses;
    private bool $onlyWithProducts;

    public function __construct(
        ?string $name,
        ?int $city_id,
        ?int $status,
        array $statuses = [],
        bool $hasItems = false
    )
    {
        $this->name = $name;
        $this->city_id = $city_id;
        $this->status = $status;
        $this->statuses = $statuses;
        $this->onlyWithProducts = $hasItems;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCityId(): ?int
    {
        return $this->city_id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }

    /**
     * @return bool
     */
    public function isOnlyWithProducts(): bool
    {
        return $this->onlyWithProducts;
    }

}
