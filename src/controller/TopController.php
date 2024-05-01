<?php

include __DIR__ . '/../lib/getUserLocationInfo.php';

class TopController extends Controller
{
    public function index()
    {
        $userId = 1;
        $userLocationInfo = $this->databaseManager->get('UserLocations')->fetchUserLocationInfoByUserId($userId);
        
        return $this->render([
            'userLocationInfo' => $userLocationInfo,
        ], 'index');
    }

    public function registerLocation()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        
        $locationName = htmlspecialchars($_POST['locationName']);
        $userLocationInfo = getUserLocationInfo($locationName);
        $userId = 1;

        // if the user location data exists, update it, otherwise insert it
        if ($this->databaseManager->get('UserLocations')->dataExists($userId)) {
            $this->databaseManager->get('UserLocations')->updateUserLocation($userId, $userLocationInfo);
        } else {
            $this->databaseManager->get('UserLocations')->insertUserLocation($userId, $userLocationInfo);
        }

        return $this->render([
            'userLocationInfo' => $userLocationInfo         // render index.php 
        ], $templete = "index");
    }

    public function registerTime()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }

        $userId = 1;
        $alertTime = htmlspecialchars($_POST['alertTime']);
        if ($this->databaseManager->get('AlertTimes')->dataExists($userId)) {
            $this->databaseManager->get('AlertTimes')->updateAlertTime($userId, $alertTime);
        } else {
            $this->databaseManager->get('AlertTimes')->insertAlertTime($userId, $alertTime);
        }

        return $this->render([
            'alertTime' => $alertTime
        ], $templete = "index");
    }
}
