<?php
    class Servico_model extends CI_MODEL {
        var $table = "servico";

        function CountServicesByTipo($tipo) {
            $this->db->where('TIPO', $tipo);
            $query = $this->db->get_where($this->table);
            return $query->num_rows();
        }

        /**
         * Retrieve all the registers in the table
         *
         * @param string $sort The field which will be sort
         * @param string $order The type of the ordination, can be ASC or DESC
         *
         * @return array All the data from the specific table
         */
        function FindAll($sort = 'ID', $order = 'asc' , $limit = 0 ) {
            $this->db->order_by($sort, $order);
            $this->db->limit($limit);
            $query = $this->db->get($this->table);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return null;
            }
        }

        function FindServiceByCPF($cpf) {
            if (is_null($cpf)) {
                return false;
            } else {
                $this->db->where('CLIENTE_CPF', $cpf);
                $query = $this->db->get('servico');
                if ($query->num_rows() > 0) {
                    return $query->row_array();
                } else {
                    return null;
                }
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
                $this->db->where('ID', $id);
                return $this->db->delete($this->table);
            }
        }

        function Update($id, $status) {
            if (is_null($id)) {
                return false;
            } else {
                $this->db->where('CLIENTE_CPF', $id);
                $this->db->set('STATUS', $status);
                return $this->db->update('servico');
            }
        }

        function FindByCPF($cpf) {
            if (is_null($cpf)) {
                return false;
            } else {
                $this->db->where('CLIENTE_CPF', $cpf);
                $query = $this->db->get('servico');
                if ($query->num_rows() > 0) {
                    return $query->row_array();
                } else {
                    return null;
                }
            }
        }
    }
?>
