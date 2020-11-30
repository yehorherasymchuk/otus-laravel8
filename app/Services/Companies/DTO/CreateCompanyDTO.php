<?php
/**
 * Description of CreateCompanyDTO.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Companies\DTO;


class CreateCompanyDTO
{

    private int $city_id;
    private int $status;
    private string $name;
    private string $url;
    private ?string $description;

    private function __construct(
        int $city_id,
        int $status,
        string $name,
        string $url,
        ?string $description
    ) {
        $this->city_id = $city_id;
        $this->status = $status;
        $this->name = $name;
        $this->url = $url;
        $this->description = $description;
    }

    public static function fromArray(array $data)
    {
        return new static(
            $data['city_id'],
            $data['status'],
            $data['name'],
            $data['url'],
            $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'city_id' => $this->city_id,
            'status' => $this->status,
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
        ];
    }

}
