<?php 

namespace App\Repositories;

use App\Repositories\Contracts\GuestRepositoryInterface;

class GuestExternalApiRepository implements GuestRepositoryInterface
{
    private string $apiUrl;
    private $client;

    public function __construct()
    {
        $this->apiUrl = env('GUEST_API_URL', 'http://localhost:8080/api/guests');
        $this->client = \Config\Services::curlrequest();
    }
    
    /**
     * getAll
     *
     * @return array
     */
    public function getAll(): array
    {
        $response = $this->client->get($this->apiUrl);

        if ($response->getStatusCode() !== 200) {
            return [];
        }

        $data = json_decode($response->getBody(), true);

        return $data['data'] ?? [];
    }
    
    /**
     * getById
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): ?array
    {
        $response = $this->client->get($this->apiUrl . '/' . $id);

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = json_decode($response->getBody(), true);

        return $data['data'] ?? null;
    }
    
    /**
     * create
     *
     * @param  array $data
     * @return array
     */
    public function create(array $data): array
    {
        //TODO: validate if there's a validation error
        $response = $this->client->post($this->apiUrl, [
            'json' => $data,
        ]);

        if ($response->getStatusCode() !== 201) {
            return [];
        }

        $data = json_decode($response->getBody(), true);

        return $data['data'] ?? [];
    }
    
    /**
     * update
     *
     * @param  int $id
     * @param  array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $response = $this->client->put($this->apiUrl . '/' . $id, [
            'json' => $data,
        ]);

        return $response->getStatusCode() === 200;
    }

    /**
     * delete
     *
     * @param  int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $response = $this->client->delete($this->apiUrl . '/' . $id);

        return $response->getStatusCode() === 200;
    }
}