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

        // if($this->databaseManager->get('UserLocations')->dataExists($userId=1)) {
        //     $this->databaseManager->get('UserLocations')->updateUserLocation($userId=1);
        // } else {
        //     $this->databaseManager->get('UserLocations')->insertUserLocation($userLocationInfo);
        // }
        $this->databaseManager->get('UserLocations')->insertUserLocation($userLocationInfo);
        return $this->render([
            'userLocationInfo' => $userLocationInfo
        ], $templete = "index");
    }
}
