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
    
    /**
     * getGuestById
     *
     * @param  int $id
     * @return array
     */
    public function getGuestById(int $id): ?array
    {
        return $this->guestExternalApiRepository->getById($id);
    }
    
    /**
     * updateGuest
     *
     * @param  int $id
     * @param  array $data
     * @return bool
     */
    public function updateGuest(int $id, array $data): bool
    {
        if(!$this->guestExternalApiRepository->update($id, $data)) {
            throw new \Exception('Failed to update guest');
        }
        
        return true;
    }
    
    /**
     * deleteGuest
     *
     * @param  int $id
     * @return bool
     */
    public function deleteGuest(int $id): bool
    {
        if(!$this->guestExternalApiRepository->delete($id)) {
            throw new \Exception('Failed to delete guest');
        }
        
        return true;
    }
}