<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_model
 *
 * @author Langit-Biru
 */
class Main_model extends Parent_Model {

    //put your code here

    public function get_setting() {
       // $this->db->where('option_name', $opname);
        
        $query = $this->db->get('t_pref');
        return $query->row();
    }

}
