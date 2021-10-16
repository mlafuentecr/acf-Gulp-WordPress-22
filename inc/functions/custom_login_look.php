<?php
// /*-----------------------------------------------------------------------------------*/
// /* Login ENQUEUE wp_enqueue_style( $handle, $src, $deps, $ver, $media ) $GLOBALS['THEME_MLM_ENV']
// /*-----------------------------------------------------------------------------------*/

function mlm_login_style()
{
 
  if( $GLOBALS['THEME_MLM_ENV']=== 'src'){
    wp_enqueue_style('logimmlm', $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/admin/login.css', false, $GLOBALS['THEME_MLM_VER']);

  }else{
    wp_enqueue_style('logimmlm', $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/admin/login.css', false, $GLOBALS['THEME_MLM_VER']);
  }
}
add_action('login_enqueue_scripts', 'mlm_login_style', 10);
