<?php
class UserLocations extends DatabaseModel
{
    public function insertUserLocation(int $userId, array $userLocationInfo) : int
    {
        $result = $this->execute(
            'INSERT INTO UserLocations (
                user_id, 
                address, 
                southwest_lat, 
                southwest_lng, 
                northeast_lat, 
                northeast_lng
             ) VALUES (
                :userId,
                :address, 
                :southwest_lat, 
                :southwest_lng, 
                :northeast_lat, 
                :northeast_lng
             )',
            [
                ':userId'          => $userId,
                ':address'         => $userLocationInfo['address'], 
                ':southwest_lat'   => $userLocationInfo['southwest_lat'],
                ':southwest_lng'   => $userLocationInfo['southwest_lng'],
                ':northeast_lat'   => $userLocationInfo['northeast_lat'],
                ':northeast_lng'   => $userLocationInfo['northeast_lng']
            ]
        )->rowCount();

        if ($result === 0) {
            throw new Exception('Failed to insert data');
        }
        
        return $result;
    }

    public function updateUserLocation(int $userId, array $userLocationInfo) : int
    {
        $result = $this->execute(
            'UPDATE UserLocations SET 
                address = :address, 
                southwest_lat = :southwest_lat, 
                southwest_lng = :southwest_lng, 
                northeast_lat = :northeast_lat, 
                northeast_lng = :northeast_lng,
                updated_at = NOW()                  -- to avoid failing the update when the data is the same
             WHERE user_id = :userId',
            [
                ':userId'          => $userId,
                ':address'         => $userLocationInfo['address'], 
                ':southwest_lat'   => $userLocationInfo['southwest_lat'],
                ':southwest_lng'   => $userLocationInfo['southwest_lng'],
                ':northeast_lat'   => $userLocationInfo['northeast_lat'],
                ':northeast_lng'   => $userLocationInfo['northeast_lng']
            ]
        )->rowCount();

        if ($result === 0) {
            throw new Exception('Failed to update data');
        }

        return $result;
    }

    public function dataExists(int $userId) : bool
    {
        $result = $this->execute('SELECT COUNT(*) FROM UserLocations WHERE user_id = :userId', [':userId' => $userId])->fetchColumn();
        return $result > 0;
    }

    public function fetchUserLocationInfoByUserId(int $userId) : array
    {
        $result = $this->execute('SELECT * FROM UserLocations WHERE user_id = :userId', [':userId' => $userId])->fetch(PDO::FETCH_ASSOC);
        if (count($result) === 0) {
            throw new Exception('Failed to fetch data');
        }
        return $result;
    }
}
