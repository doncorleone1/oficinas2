<?php
    class Usuario_model extends CI_MODEL {
        var $table = "usuario";

        /**
         * Find a specific register by a unique identifier which it's the email
         *
         * @param integer $cpf The CPF of the user to be retrieve
         *
         * @return array The user retrieve of the specific email
         */
        function FindByCPF($cpf) {
            if (is_null($cpf)) {
                return false;
            } else {
                $this->db->where('CPF', $cpf);
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
         *
         * @return array All the data from the specific table
         */
        function FindAll($sort = 'id', $order = 'asc' , $limit = 0 ) {
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
                $this->db->where('CPF', $id);
                return $this->db->delete($this->table);
            }
        }

        function Update($id, $name) {
            if (is_null($id)) {
                return false;
            } else {
                $this->db->where('CPF', $id);
                $this->db->set('NOME', $name);
                return $this->db->update('usuario');
            }
        }

        function ChangePassword($id, $password) {
            if (is_null($id)) {
                return false;
            } else {
                $this->db->where('CPF', $id);
                $this->db->set('SENHA', $password);
                return $this->db->update('usuario');
            }
        }
    }
?>
