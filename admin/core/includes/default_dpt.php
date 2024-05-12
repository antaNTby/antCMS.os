<?php
###default_dpt.php
// dump("default_dpt.php PHPFILENAME ".$phpFileName);
//


            if (file_exists($sub_template))
            {
                $smarty->assign('admin_main_content_template', $sub_template);
            }




$smarty->assign('admin_sub_dpt', 'default_sub.tpl.html');