<?php

class CategoryModel extends CI_Model
{
    public function list_category()
    {
        $res = $this->db->get('category');

        return $res->result();
    } //end of list ctegory

    public function add_main_category($cat_name, $sub_cat)
    {
        $data = array(
            'cat_name' => $cat_name,
            'cat_parent' => $sub_cat);

        $this->db->insert('category', $data);

        return true;
    } // end add main category

    public function remove_category($cat_id)
    {
        $this->db->where('cat_id', $cat_id);
        $this->db->delete('category');

        return true;
    } //rend remove category

    public function fetch_category($cat_id)
    {
        $this->db->where('cat_id', $cat_id);
        $res = $this->db->get('category')->row();

        return $res;
    } //end fetch category
}
