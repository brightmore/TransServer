<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author bright
 */
class Users extends CI_Model{
    
    private $table_name = 'users';			// user accounts
    private $profile_table_name = 'user_profiles';	// user profiles
    
    public function __construct() {
        
        parent::__construct();
        
    }
    
    /**
	 * Purge table of non-activated users
	 *
	 * @param	int
	 * @return	void
	 */
	function purge_notIssuedTrip($expire_period = 172800)
	{
		$this->db->where('issued', 0);
		$this->db->where('UNIX_TIMESTAMP(date_created) <', time() - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_user($username)
	{
		$this->db->where('user_code', $username);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			//remove all user transaction 
                        
			return TRUE;
		}
		return FALSE;
	}
        
        
        /**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$data['date_created'] = time();
		
		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
                        
			return array('user_id' => $user_id);
		}
		return NULL;
	}
        
        
}
