<?php

/*

@package mlm

========================
dash menu
========================
 */

/* 6.0 - Add Dashboard menu
-------------------------------------------------------------- */
function marioLafuente_dashboard_widgets()
{

    wp_add_dashboard_widget(
        'quick-menu-access', // Widget slug and css
        'Quick Menu Access', // Title.
        'marioLafuente_dashboard_menu' // Display function.
    );
}
add_action('wp_dashboard_setup', 'marioLafuente_dashboard_widgets');

function marioLafuente_dashboard_menu()
{
    echo '
                    <div class="table-title">
                    </div>
                    <table class="table-fill">
                    <thead>
                    <tr>
                    <th colspan="2" class="text-left">Options Menu </th>

                    </tr>
                    </thead>
                    <tbody class="table-hover">
    
            
                    <tr>
                    <td class="text-left">Modify Home Page </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/post.php?post=6&action=edit">Home Page</a>
                     <p>manage all about index page </p>
                    </td>
                    </tr>     

                       
                    <tr>
                    <td class="text-left">Modify Blog Index </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/post.php?post=10020&action=edit">Blog</a>
                     <p>manage Blog page </p>
                    </td>
                    </tr>     



                    <tr>
                    <td class="text-left">Case study </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/edit.php?post_type=case_study">Case study</a>
                     <p>Modify or add + Case Studies </p>
                    </td>
                    </tr>     

                    <tr>
                    <td class="text-left">Modify Menus </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/nav-menus.php">Menus</a>
                     <p>Modify Main menues in here  </p>
                    </td>
                    </tr>  
                 
                    <tr>
                    <td class="text-left">Modify Social Media  </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/nav-menus.php">Social Media</a>
                     <p>In Menu Secciont look for social media at the top  </p>
                    </td>
                    </tr>  

                    <tr>
                    <td class="text-left">Modify Footer </td>
                    <td class="text-left">
                    <a target="_blank" href="' . get_site_url() . '/wp-admin/widgets.php">Footer</a>
                     <p>manage general theme </p>
                    </td>
                    </tr>


                    </tbody>
                    </table>
                ';
}

/* 6.5 - Add css to Dashboard for my menu
-------------------------------------------------------------- */
add_action('admin_head', 'marioLafuente_menu_dashboar_style');
function marioLafuente_menu_dashboar_style()
{
    echo '<style>
         #quick-menu-access {
           background-color: #8ec0f9!important;
       }
       #menu-posts-rematesettings ul {
        display: none;
        color: red;
      }
      
         .table-fill,div.table-title{margin:auto;max-width:600px;padding:5px;width:100%}.table-fill td,.table-fill th{vertical-align:middle;text-align:left}.table-title h3,td{text-shadow:-1px -1px 1px rgba(0,0,0,.1)}.table-fill td,.table-fill th.text-left,th{text-align:left}div.table-title{display:block}.table-title h3{color:#fafafa;font-size:30px;font-weight:400;font-style:normal;font-family:Roboto,helvetica,arial,sans-serif;text-transform:uppercase}.table-fill{background:#fff;border-radius:3px;border-collapse:collapse;height:320px;box-shadow:0 5px 10px rgba(0,0,0,.1);animation:float 5s infinite}.table-fill tr:hover td,.table-fill tr:nth-child(odd):hover td{background:#4E5066}.table-fill th{color:#D5DDE5;background:#1b1e24;border-bottom:4px solid #9ea7af;border-right:1px solid #343a45;font-size:23px;font-weight:100;padding:24px;text-shadow:0 1px 1px rgba(0,0,0,.1)}.table-fill th:first-child{border-top-left-radius:3px}.table-fill th:last-child{border-top-right-radius:3px;border-right:none}.table-fill tr{border-top:1px solid #C1C3D1;border-bottom-:1px solid #C1C3D1;color:#666B85;font-size:16px;font-weight:400;text-shadow:0 1px 1px rgba(256,256,256,.1)}.table-fill tr:hover td{color:#FFF;border-top:1px solid #22262e;border-bottom:1px solid #22262e}.table-fill tr:first-child{border-top:none}.table-fill tr:last-child{border-bottom:none}.table-fill tr:nth-child(odd) td{background:#EBEBEB}.table-fill tr:last-child td:first-child{border-bottom-left-radius:3px}.table-fill tr:last-child td:last-child{border-bottom-right-radius:3px}.table-fill td{background:#FFF;padding:20px;font-weight:300;font-size:18px;border-right:1px solid #C1C3D1}.table-fill td:last-child{border-right:0}.table-fill th.text-center{text-align:center}.table-fill th.text-right{text-align:right}.table-fill td.text-left{text-align:left}.table-fill td.text-center{text-align:center}.table-fill td.text-right{text-align:right}
             }
         </style>';
}
