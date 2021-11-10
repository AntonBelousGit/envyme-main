<?php


namespace App\Repositories\Interfaces;


use App\Models\Club;

interface ClubRepositoryInterface
{
    public function getPaginatedTicket(?string $city);
    public function createClub(array $fields);
    public function getAllClubs();
    public function updateClub(Club $club, array $fields);
    public function deleteClub(Club $club);
    public function deletePhoto(string $filename);
    public function getCountOfClubs();
}