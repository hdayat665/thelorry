<?php 

if ( ! function_exists('pr'))
{
    function pr ( $dump = array(), $exit = true )
    {
        // $CI =& get_instance();
        // $CI->load->library('kint');
        // Kint::trace();

        echo "<pre>"; 
        print_r( $dump );
        echo "</pre>";
        
        if ($exit) exit;
    }
}

 if ( ! function_exists( "comment" ))
{
    function comment($article_id)
    {
        
     $CI =& get_instance();

     $CI->db->where('article_id', $article_id);
     $CI->db->select('acc_name, cmn_desc, comment.acc_id as acc_id, date_created');
     $CI->db->join('account', 'comment.acc_id = account.acc_id', 'left');
     $query1 =  $CI->db->get('comment');

     $query = $query1->result_array();

    return $query;
    }
}