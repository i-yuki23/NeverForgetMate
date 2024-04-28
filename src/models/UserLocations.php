<?php

class UserLocations extends DatabaseModel
{
    public function insertUserLocation($userLocationInfo)
    {
        $this->execute('INSERT INTO UserLocations (address, southwest_lat, southwest_lng, northeast_lat, northeast_lng) VALUES (:address, :southwest_lat, :southwest_lng, :northeast_lat, :northeast_lng)', $userLocationInfo);
    }

    // public function dataExists($userId)
    // {
    //     $result = $this->execute('SELECT * FROM UserLocations WHERE user_id = ?', ['i', $userId]);
    //     return !empty($result);
    // }
}
