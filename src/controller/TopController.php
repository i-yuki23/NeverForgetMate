<?php

include __DIR__ . '/../lib/getUserLocationInfo.php';

class TopController extends Controller
{
    public function index()
    {
        $userId = 1;
        $userLocationInfo = $this->databaseManager->get('UserLocations')->fetchUserLocationInfoByUserId($userId);
        $alertTime = $this->databaseManager->get('AlertTimes')->fetchAlertTimeByUserId($userId);
        return $this->render([
            'userLocationInfo' => $userLocationInfo,
            'alertTime' => $alertTime
        ], 'index');
    }

    public function registerLocation()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $this->verifyCsrfToken();

        $locationName = htmlspecialchars($_POST['locationName']);
        $userLocationInfo = getUserLocationInfo($locationName);
        $userId = 1;

        // if the user location data exists, update it, otherwise insert it
        if ($this->databaseManager->get('UserLocations')->dataExists($userId)) {
            $this->databaseManager->get('UserLocations')->updateUserLocation($userId, $userLocationInfo);
        } else {
            $this->databaseManager->get('UserLocations')->insertUserLocation($userId, $userLocationInfo);
        }
        unset($_SESSION['token']);
        header('location: /');
        exit();

    }

    public function registerTime()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $this->verifyCsrfToken();
        $userId = 1;
        $alertTime = htmlspecialchars($_POST['alertTime']);
        if ($this->databaseManager->get('AlertTimes')->dataExists($userId)) {
            $this->databaseManager->get('AlertTimes')->updateAlertTime($userId, $alertTime);
        } else {
            $this->databaseManager->get('AlertTimes')->insertAlertTime($userId, $alertTime);
        }
        unset($_SESSION['token']);
        header('location: /');
        exit();
    }
}
