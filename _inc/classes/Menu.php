<?php
class MenuBuilder {
    public static function getMenuHtml(array $pages) {
        $menuItems = '';

        foreach ($pages as $page_name => $page_data) {
            if (is_array($page_data)) {
                $menuItems .= '<li class="has-submenu"><a href="' . $page_data['url'] . '">' . $page_name . '</a>';
                $menuItems .= '<ul class="sub-menu">';
                foreach ($page_data['submenu'] as $sub_name => $sub_url) {
                    $attrs = '';
                    if (str_starts_with($sub_url, 'http')) {
                        $attrs = ' class="external" rel="sponsored"';
                    }
                    $menuItems .= '<li><a href="' . $sub_url . '"' . $attrs . '>' . $sub_name . '</a></li>';
                }
                $menuItems .= '</ul></li>';
            } else {
                $attrs = '';
                if (str_starts_with($page_data, 'http')) {
                    $attrs = ' class="external" rel="sponsored"';
                }
                $menuItems .= '<li><a href="' . $page_data . '"' . $attrs . '>' . $page_name . '</a></li>';
            }
        }

        return $menuItems;
    }
}