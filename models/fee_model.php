<?php

class Fee_model extends Model
{   
    private static $table = 'tbl_doctor_fee';

	function __construct()
	{
		parent::__construct();
    }

    public static function all() {
        return DB::loadAll(DATABASE_NAME, self::$table);
    }
    public static function allOther() {
        return DB::loadAll(DATABASE_NAME, 'tbl_other_fee');
    }
    public function updateFee(){
        $check = $this->all();
        if(empty($check)){
            $data = array(
                'fee' => $_POST['fee'],
                'created_by' => 1,
                'date_created' => date('Y-m-d H:i:s')
            );
            Db::insert(DATABASE_NAME, self::$table, $data);
        } else {
            $data = array(
                'fee' => $_POST['fee'],
                'modified_by' => 1,
                'date_modified' => date('Y-m-d H:i:s')
            );
            Db::update(DATABASE_NAME, self::$table, $data, array('id' => $check[0]['id']));
        }
    }
    public function addOther(){
        $data = array(
            "fee_name" => $_POST['fee_name'], 
            "fee" => $_POST['fee'], 
            "created_by" => 1, 
            "date_created" => date('Y-m-d H:i:s') 
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_other_fee', $data);
    }
    public function updateOther(){
        $data = array(
            "fee_name" => $_POST['fee_name'], 
            "fee" => $_POST['fee'], 
            "modified_by" => 1, 
            "date_modified" => date('Y-m-d H:i:s') 
        );
        Db::update(DATABASE_NAME, 'tbl_other_fee', $data, array('id' => $_POST['id']));
    }
    public function deleteOther(){
        Db::delete(DATABASE_NAME, 'tbl_other_fee', array('id' => $_POST['id']));
    }
}