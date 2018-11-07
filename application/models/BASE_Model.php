<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class BASE_Model extends CI_Model {
        
        // This variable defines the table target
        var $table = "";
        
        /**
         * Constructor method
         */
        function __construct()
        {
            parent::__construct();
        }
        
        /**
         * Creates a new register in the table
         * 
         * @param array $data The array which contains the data to be insert
         * 
         * @return boolean Which defines if the data was insert or not
         */
        function Insert($data) {
            if (!isset($data)) {
                return false;
            } else {
                return $this->db->insert($this->table, $data);                
            }
        }
        
        /**
         * Find a specific register by a unique identifier
         * 
         * @param integer $id The unique identifier of the register to be retrieve
         * 
         * @return array The content retrieve of the specific unique identifier
         */
        function FindByID($id) {
            if (is_null($id)) {
                return false;
            } else {
                $this->db->where('id', $id);
                $query = $this->db->get($this->table);
                if ($query->num_rows() > 0) {
                    return $query->row_array();
                } else {
                    return null;
                }
            }
        }
        
        /**
         * Retrieve all the registers in the table
         * 
         * @param string $sort The field which will be sort
         * @param string $order The type of the ordination, can be ASC or DESC
         * @param number $limit The number which defines the limit of results
         * 
         * @return array All the data from the specific table
         */
        function FindAll($sort = 'id', $order = 'asc', $limit) {
            $this->db->order_by($sort, $order);
            $this->db->limit($limit);
            $query = $this->db->get($this->table);
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return null;
            }
        }
        
        /**
         * Updates a specific register in the table
         * 
         * @param integer $int The unique identifier in the table to be updated
         * @param array $data The data to be insert
         * 
         * @return boolean The boolean which defines if the data was updated or not
         */
        function Update($id, $data) {
            if (is_null($id) || !isset($data)) {
                return false;
            } else {
                $this->db->where('id', $id);
                return $this->db->update($this->table, $data);
            }
        }
        
        /**
         * Remove a specific register in the table
         * 
         * @param integer $id The unique identifier of the register to be removed
         * 
         * @return boolean The boolean which defines if the register was deleted or not
         */
        function Remove($id) {
            if (is_null($id)) {
                return false;
            } else {
                $this->db->where('id', $id);
                return $this->db->delete($this-table);
            }
        }
    }
?>