<?php

class PageModel extends CI_Model
{
    public function allProducts($limit, $start)
    {
        $this->db->select('product_table.p_id,product_table.p_name,product_table.p_desc,product_table.cat_id,category.cat_name');
        $this->db->from('product_table');
        $this->db->join('category', 'category.cat_id=product_table.cat_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("p_id", 'DESC');
        $query = $this->db->get();

        return $query->result();
    } // end product list

    public function get_count()
    {
        return $this->db->count_all("product_table");
    } //end count product
}
