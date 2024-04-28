<?php

include __DIR__ . '/../lib/getUserLocationInfo.php';

class LocationController extends Controller
{
    public function index()
    {
        return $this->render([
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $locationName = htmlspecialchars($_POST['locationName']);
        $userLocationInfo = getUserLocationInfo($locationName);
        $userId = 1;

        if ($this->databaseManager->get('UserLocations')->dataExists($userId)) {
            $this->databaseManager->get('UserLocations')->updateUserLocation($userId, $userLocationInfo);
        } else {
            $this->databaseManager->get('UserLocations')->insertUserLocation($userId, $userLocationInfo);
        }
        return $this->render([
            'userLocationInfo' => $userLocationInfo
        ], $templete = "index");
    }
}
