<?php

class Admin_model extends CI_Model {

    public function category_add($data) {
        if ($this->db->insert('category', $data)) {
            return true;
        }
    }

    public function category_update($data, $id) {
        $this->db->set($data);
        $this->db->where('cat_id', $id);
        if ($this->db->update('category', $data)) {
            return true;
        }
    }

    public function category_delete($id) {
        $this->db->where('cat_id', $id);
        if ($this->db->delete('category')) {
            return true;
        }
    }

    //product

    public function product_add($data) {
        if ($this->db->insert('product', $data)) {
            return true;
        }
    }

    public function product_delete($id) {
        $this->db->where('p_id', $id);
        if ($this->db->delete('product')) {
            return true;
        }
    }

    public function product_update($data, $id) {
        $this->db->set($data);
        $this->db->where('p_id', $id);
        if ($this->db->update('product', $data)) {
            return true;
        }
    }

    public function get_product($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->join('category', 'product.p_cat = category.cat_id');
        $query = $this->db->get('product');
        return $query->result();
    }

    public function get_count() {
        return $this->db->count_all('product');
    }

    public function get_cat_count($id) {
        $this->db->where('p_cat', $id);
        $query = $this->db->get('product');
        return $query->num_rows();
    }

    public function get_cat_product($limit, $start, $id) {
        $this->db->limit($limit, $start);
        $this->db->join('category', 'product.p_cat = category.cat_id');
        $this->db->where('p_cat',$id);
        $query = $this->db->get('product');

        return $query->result();
    }

}

?>