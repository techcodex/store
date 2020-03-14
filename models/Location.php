<?php
require_once "DbTrait.php";
abstract class Location {
    use DbTrait;
    //get list of countries
    public static function getCountries() {
        $obj_db = self::obj_db();
        $countries = [];
        $query = "select * from countries "
                ."order by name ASC ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if($result->num_rows == 0) {
            return $countries;
        }
        while($data = $result->fetch_object()) {
            $countries[] = $data;
        }
        return $countries;
    }
    /**
     * @param state id as paramter
     * 
     * @return list of states
     */
    public static function getStates($id) {
        $obj_db = self::obj_db();
        $states = [];
        $query = "select * from states "
                ." where country_id = $id "
                ." ORDER BY name ASC ";
        $result = $obj_db->query($query);
        if($obj_db->errno) {
            throw new Exception("Db Select Error - $obj_db->error");
        }
        if($result->num_rows == 0) {
            return $states;
        }
        while($data = $result->fetch_object()) {
            $states[] = $data;
        }
        return $states;
    }
    /**
     * @param city id as paramter
     * 
     * @return cities list
     */
    public static function getCities($id) {
        $obj_db = self::obj_db();
        $cities = [];
        $query = "select * from cities "
                ." where state_id = $id "
                ." ORDER BY name ASC ";
        $result = $obj_db->query($query);
        if($obj_db->errno) { 
            throw new Exception("Db Select Error - $obj_db->error ");
        }
        if($result->num_rows == 0) {
            return $cities;
        }
        while($data = $result->fetch_object()) {
            $cities[] = $data;
        }
        return $cities;
    }
}
?>