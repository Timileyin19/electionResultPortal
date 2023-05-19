<?php

require_once 'Model.php';

class UserModel extends Model
{

    public function fetchLGAResult($lgaId)
    {
        $dbh = self::connect();
        $lgaId = (int) $lgaId;

        $sql = "SELECT a.party_abbreviation, SUM(a.party_score) AS total_score FROM announced_pu_results a JOIN polling_unit p ON a.polling_unit_uniqueId = p.uniqueId WHERE p.lga_id = $lgaId GROUP BY a.party_abbreviation ORDER BY total_score DESC"; 

        // SELECT a.* FROM announced_pu_results a JOIN polling_unit p ON a.polling_unit_uniqueId = p.uniqueId WHERE p.lga_id = 10;

        // SELECT a.party_abbreviation, SUM(a.party_score) AS total_score FROM announced_pu_results a JOIN polling_unit p ON a.polling_unit_uniqueId = p.uniqueId WHERE p.lga_id = 22 GROUP BY a.party_abbreviation ORDER BY total_score DESC;

        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function fetchPollingUnitResult($pollingId)
    {
        $dbh = self::connect();
        $pollingId = (int) $pollingId;

        $sql = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid=$pollingId ORDER BY party_abbreviation ASC";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        // return $query->rowCount();
        return $results;
    }

    public function getLGA() 
    {
        $dbh = self::connect();
        $sql = "SELECT * FROM lga ORDER BY lga_name ASC";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function getParties() 
    {
        $dbh = self::connect();
        $sql = "SELECT * FROM party ORDER BY partyid ASC";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function getPollingUnits() 
    {
        $dbh = self::connect();
        $sql = "SELECT * FROM polling_unit WHERE polling_unit_number IS NOT NULL ORDER BY polling_unit_name ASC";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function getStates() 
    {
        $dbh = self::connect();
        $sql = "SELECT * FROM states ORDER BY state_name ASC";  
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function getWards()
    {
        $dbh = self::connect();
        $sql = "SELECT * FROM ward ORDER BY ward_name ASC";  
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ); 
        return $results;
    }

    public function submitPUResult() 
    {
        extract($_POST);
        $ipAddress = $_SERVER['REMOTE_ADDR'];

        $lab = substr($LABOUR, 0, 1);

        $dbh = self::connect();
        $sql = "INSERT INTO announced_pu_results (polling_unit_uniqueid, party_abbreviation, party_score, entered_by_user, date_entered, user_ip_address)VALUES (:pollingId, 'ACN', :ACN, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'ANPP', :ANPP, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'CDC', :CDC, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'CPP', :CPP, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'DPP', :DPP, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'JP', :JP, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'LP', :LABOUR, :entered_by_user_, NOW(), :ipAddress), (:pollingId, 'PDP', :PDP, :entered_by_user_, NOW(), :ipAddress),(:pollingId, 'PPA', :PPA, :entered_by_user_, NOW(), :ipAddress)";
        $query = $dbh->prepare($sql);

        $query->bindParam(':pollingId',$pollingId,PDO::PARAM_STR);
        $query->bindParam(':entered_by_user_',$entered_by_user_,PDO::PARAM_STR);
        $query->bindParam(':ACN',$ACN,PDO::PARAM_STR);
        $query->bindParam(':ANPP',$ANPP,PDO::PARAM_STR);
        $query->bindParam(':CDC',$CDC,PDO::PARAM_STR);
        $query->bindParam(':CPP',$CPP,PDO::PARAM_STR);
        $query->bindParam(':DPP',$DPP,PDO::PARAM_STR);
        $query->bindParam(':JP',$JP,PDO::PARAM_STR);
        $query->bindParam(':LABOUR',$lab,PDO::PARAM_STR);
        $query->bindParam(':PDP',$PDP,PDO::PARAM_STR);
        $query->bindParam(':PPA',$PPA,PDO::PARAM_STR);
        $query->bindParam(':ipAddress',$ipAddress,PDO::PARAM_STR);

        $query->execute();
        
        return 1;
        
    }
}
