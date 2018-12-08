<?php
namespace SecretumHF;


/**
 * Columns & Column Content For Custom Post Types
 * 
 * @method setColumns()             Post Type Custom Columns
 * @method headerColumnContent()    Set Content For Header Columns
 * @method footerColumnContent()    Set Content For Footer Columns
 * 
 * @package Secretum
 * @subpackage SecretumHF
 */
class PosttypeColumns
{
    /**
     * Post Type Custom Columns
     *
     * @param $columns array The column name
     */
    final public static function setColumns($columns)
    {
        // Remove Columns
        unset($columns['title']);
        unset($columns['author']);
        unset($columns['date']);

        // Set Columns
        $columns['title']   = __('Name', 'secretum-hf ');
        $columns['author']  = __('Author', 'secretum-hf ');
        $columns['groups']  = __('Groups', 'secretum-hf');
        $columns['date']    = __('Date', 'secretum-hf ');

        return $columns;
    }


    /**
     * Set Content For Header Columns
     *
     * @param $columns array The column name
     * @param $post_id int The ID of the Post
     */
    final public static function headerColumnContent($column, $post_id)
    {
        switch ($column) {
            // Categories
            case 'groups' :
                $terms = get_the_term_list($post_id , 'secretumheadersgroup', '', ', ', '');
                echo is_string( $terms ) ? $terms : '—';
                break;
        }
    }


    /**
     * Set Content For Footer Columns
     *
     * @param $columns array The column name
     * @param $post_id int The ID of the Post
     */
    final public static function footerColumnContent($column, $post_id)
    {
        switch ($column) {
            // Categories
            case 'groups' :
                $terms = get_the_term_list($post_id , 'secretumfootersgroup', '', ', ', '');
                echo is_string( $terms ) ? $terms : '—';
                break;
        }
    }
}
