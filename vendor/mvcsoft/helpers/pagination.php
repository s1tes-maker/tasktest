<?php
function paginationView( $get_params, $per_page, $total_items)
{
    if (!$per_page) {
        throw new \Exception("Неверно задано количество элементов на странице", 500);
    }

    $count_pages = ceil($total_items / $per_page);

    $current_page = 1;
    if (isset($get_params['page'])) {
        $get_params['page'] = (int)$get_params['page'];
        if ($get_params['page'] > 1 && $get_params['page'] <= $count_pages) {
            $current_page = $get_params['page'];
        } elseif ($get_params['page'] > $count_pages) {
            $current_page = $count_pages;
        }
    }
    $arr_return['start_item'] = ($current_page - 1) * $per_page;

    if($count_pages == 1) {
        $arr_return['htmlItems'] =  false;
        return $arr_return;
    }

    $uri = '';
    foreach ($get_params as $key => $value) {
        if($key == 'page') continue;
        $uri.= $key . '='.$value.'&amp;';
    }
    $arr_return['current_page'] = $current_page;
    $arr_return['htmlItems'] = defineHTMLItems($current_page, $count_pages, $uri);
    return $arr_return;
}

function defineHTMLItems($current_page, $count_pages, $uri) {

    $back               = 0;
    $first              = 1;
    $ellipsis_before    = 2;
    $before2            = 3;
    $before1            = 4;
    $current            = 5;
    $after1             = 6;
    $after2             = 7;
    $ellipsis_after     = 8;
    $last               = 9;
    $forward            = 10;

    $arr = array_fill(0, 11, ['disabled' => '', 'active' => '']);

    $arr[$back]['anchor'] = ($current_page > 1) ? '&lt;' : '';
    $arr[$first]['anchor'] = ($current_page > 3) ? 1: '';
    $arr[$ellipsis_before]['anchor'] = ($current_page > 4) ? '...': '';
    $arr[$before2]['anchor'] = ($current_page > 2) ?  $current_page - 2 : '';
    $arr[$before1]['anchor'] = ($current_page > 1) ?  $current_page - 1 : '';
    $arr[$current]['anchor'] = $current_page;
    $arr[$after1]['anchor'] = ($current_page < $count_pages) ?  $current_page + 1 : '';
    $arr[$after2]['anchor'] = ($current_page + 1< $count_pages) ?  $current_page + 2 : '';
    $arr[$ellipsis_after]['anchor'] = ($current_page + 3 < $count_pages) ? '...': '';
    $arr[$last]['anchor'] = ($current_page + 2 < $count_pages) ? $count_pages: '';
    $arr[$forward]['anchor'] = ($current_page < $count_pages) ? '&gt;': '';

    $arr[$current]['active'] = 'active';
    $arr[$ellipsis_before]['disabled'] = $arr[$ellipsis_after]['disabled'] = 'disabled';

    $arr[$back]['uri'] = $current_page - 1;
    $arr[$first]['uri'] = 1;
    $arr[$before2]['uri'] = $current_page - 2;
    $arr[$before1]['uri'] = $current_page - 1;
    $arr[$current]['uri'] = $current_page;
    $arr[$after1]['uri'] = $current_page + 1;
    $arr[$after2] ['uri'] = $current_page + 2;
    $arr[$last]['uri'] = $count_pages;
    $arr[$forward]['uri'] = $current_page + 1;

    for ($i = 0; $i < count($arr); $i++ ) {
        if(isset($arr[$i]['uri'])) {
            $arr[$i]['get_params'] = '?' . $uri . 'page='.$arr[$i]['uri'];
        } else {
            $arr[$i]['get_params'] = '';
        }
    }

    return $arr;
}