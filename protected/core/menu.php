<?
function print_menu_li($menu) 
{ 
    $buffer = null;
    
    foreach ($menu as $name => $link) 
    { 
      
        if (is_array($link)) 
        { 
            $buffer .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$name.'<b class="caret"></b></a>'; 
            $buffer .= '<ul class="dropdown-menu">'.print_menu_li($link).'</ul>'; 
        } 
        else 
        { 
            $buffer .= '<li><a href="'.$link.'">'.$name.'</a></li>'; 
        }
        
    }
    return $buffer; 
}

function print_menu($menu) 
{ 
    $buffer = null;
    $buffer .= '<div class="collapse navbar-collapse navbar-ex1-collapse"><ul class="nav navbar-nav">';
    
    foreach ($menu as $name => $link) 
    { 
        $buffer .= '<li class="dropdown">';
    
        if (is_array($link)) 
        { 
            $buffer .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$name.'<b class="caret"></b></a>'; 
            $buffer .= '<ul class="dropdown-menu">'.print_menu_li($link).'</ul>'; 
        } 
        else 
        { 
            $buffer .= '<li><a href="'.$link.'">'.$name.'</a></li>'; 
        } 
        
        $buffer .= '</li>';
    }
    $buffer .= '</ul></div>';
    return $buffer; 
}
