<?php
/**
 * Description of CreateCompanyHandler.php
 * @copyright Copyright (c) MISTER.AM, LLC
 * @author    Egor Gerasimchuk <egor@mister.am>
 */

namespace App\Services\Companies\Handlers;


use App\Models\Company;
use App\Services\Companies\DTO\CreateCompanyDTO;
use App\Services\Companies\Repositories\EloquentCompanyRepository;

class CreateCompanyHandler
{

    private EloquentCompanyRepository $eloquentCompanyRepository;

    public function __construct(
        EloquentCompanyRepository $eloquentCompanyRepository
    )
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    public function handle(CreateCompanyDTO $createCompanyDTO): Company
    {
        return $this->eloquentCompanyRepository->createFromArray($createCompanyDTO->toArray());
    }


}
