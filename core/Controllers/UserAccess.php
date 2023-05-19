<?php

    require_once './core/Models/UserModel.php';

	
	class UserAccess  {
        protected $model;

        public function __construct(){
			$this->model=new UserModel;
		}

        public function fetchLGAResult() {
            extract($_POST);
            $lgaResult = $this->model->fetchLGAResult($lgaId);
            return json_encode($lgaResult);
        }

        public function fetchPollingUnitResult() {
            extract($_POST);
            $pollingResult = $this->model->fetchPollingUnitResult($pollingId);
            return json_encode($pollingResult);
        }

        public function getLGA() {
            $lga = $this->model->getLGA();
            return $lga;
        }

        public function getParties() {
            $parties = $this->model->getParties();
            return $parties;
        }

        public function getPollingUnits() {
            $PU = $this->model->getPollingUnits();
            return $PU;
        }

        public function getStates(){
            $states = $this->model->getStates();
            return $states;
        }

        public function getWards() {
            $wards = $this->model->getWards();
            return $wards;
        }

        public function submitPUResult() {
            $result = $this->model->submitPUResult();
            return $result;
        }

    }

?>