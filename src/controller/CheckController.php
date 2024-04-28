<?php

class CheckController extends Controller
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
        $userId = 1;
        $userLocationInfo = $this->databaseManager->get('UserLocations')->fetchUserLocationInfoByUserId($userId);
        
        return $this->render([
            'userLocationInfo' => $userLocationInfo,
        ], 'index');
    }
}