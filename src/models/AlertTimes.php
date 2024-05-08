<?php
class AlertTimes extends DatabaseModel
{
    public function insertAlertTime(int $userId, string $alertTime) : int
    {
        $result = $this->execute(
            'INSERT INTO AlertTimes (
                user_id, 
                alert_time
             ) VALUES (
                :userId, 
                :alertTime
             )',
            [
                ':userId'      => $userId,
                ':alertTime'   => $alertTime
            ]
        )->rowCount();

        if ($result === 0) {
            throw new Exception('Failed to insert data');
        }
        
        return $result;
    }

    public function updateAlertTime(int $userId, string $alertTime) : int
    {
        $result = $this->execute(
            'UPDATE AlertTimes SET 
                alert_time = :alertTime,
                updated_at = NOW()                  -- to avoid failing the update when the data is the same
             WHERE user_id = :userId',
            [
                ':userId'      => $userId,
                ':alertTime'   => $alertTime
            ]
        )->rowCount();

        if ($result === 0) {
            throw new Exception('Failed to update data');
        }

        return $result;
    }

    public function dataExists(int $userId) : bool
    {
        $result = $this->execute('SELECT COUNT(*) FROM AlertTimes WHERE user_id = :userId', [':userId' => $userId])->fetchColumn();
        return $result > 0;
    }

    public function fetchAlertTimeByUserId(int $userId) : array
    {
        $result = $this->execute('SELECT * FROM AlertTimes WHERE user_id = :userId', [':userId' => $userId])->fetch(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : [];
    }
}
