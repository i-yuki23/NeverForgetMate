<?php

class Location extends DatabaseModel
{
    public function insertUserLocation($userLocationInfo)
    {
        $this->execute('INSERT INTO UserLocations (address, southwest_lat, southwest_lng, northeast_lat, northeast_lng) VALUES (?, ?, ?, ?, ?)', ['sdddd', $userLocationInfo['address'], $userLocationInfo['southwest_lat'], $userLocationInfo['southwest_lng'], $userLocationInfo['northeast_lat'], $userLocationInfo['northeast_lng']]);
    }
}
