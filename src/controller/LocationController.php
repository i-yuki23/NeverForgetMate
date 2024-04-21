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

        $this->databaseManager->get('Location')->insertUserLocation($userLocationInfo);

        return $this->render([
            'userLocationInfo' => $userLocationInfo
        ], $templete = "index");
    }
}
