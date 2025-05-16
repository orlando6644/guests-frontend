<?php 

namespace App\Services;

use App\Repositories\Contracts\GuestRepositoryInterface;

class GuestService
{
    public function __construct(private GuestRepositoryInterface $guestExternalApiRepository)
    { }
    
    /**
     * getAllGuests
     *
     * @return array
     */
    public function getAllGuests(): array
    {
        return $this->guestExternalApiRepository->getAll();
    }
    
    /**
     * createGuest
     *
     * @param  array $data
     * @return array
     */
    public function createGuest(array $data): array
    {
        return $this->guestExternalApiRepository->create($data);
    }
}