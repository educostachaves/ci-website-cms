<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * meta_tags()
 *
 * Generates tags for title, description, keywords and robots
 * Using title and description from config file as default
 *
 * @access  public
 * @param   string  Title
 * @param   string  Description (155 characters)
 * @param   string  Keywords (155 characters)
 * @param   bool    FavIcon has or don't has a FavIcon
 * @param   bool    Robots follow or no folow
 */

if(! function_exists('meta_tags')){
  function meta_tags($meta = null)
  {
    $CI =& get_instance();
    $CI->config->load('seo_config');

    if(!isset($meta['title']))
      $meta['title'] = $CI->config->item('seo_title');

    if(!isset($meta['description']))
      $meta['description'] = $CI->config->item('seo_description');

    if(!isset($meta['keywords']))
      $meta['keywords'] = $CI->config->item('seo_keywords');

    if(!isset($meta['robots']))
      $meta['robots'] = $CI->config->item('seo_robots');

    if(!isset($meta['favicon']))
      $meta['favicon'] = $CI->config->item('seo_favicon');

    $html = '';

    //uses default set in seo_config.php

    $html .= '<title>'.$meta['title'].'</title>';
    $html .= '<meta name="title" content="'.$meta['title'].'"/>';
    $html .= '<meta name="description" content="'.$meta['description'].'"/>';
    $html .= '<meta name="keywords" content="'.$meta['keywords'].'"/>';
    if($meta['robots'] == true){
      $html .= '<meta name="robots" content="index,follow"/>';

    } else {
      $html .= '<meta name="robots" content="noindex,nofollow"/>';
    }
    if($meta['favicon'] == true){
      $html .= '<link rel="shortcut icon" type="image/png" href="'.base_url().'assets/images/favicons/favicon.png"/>
                <link rel="shortcut icon" type="image/ico" href="'.base_url().'assets/images/favicons/favicon.ico"/>';
    }

    echo $html;
  }
}

/* End of file seo_helper.php */
/* Location: ./application/helpers/seo_helper.php */
