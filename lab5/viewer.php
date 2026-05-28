<?php
require_once 'db.php';

function getViewer($sortType, $pageNumber) {
    $data = get_db_data();
    
    if ($sortType == 'last_name') {
        usort($data, function($a, $b) { return strcmp($a['last_name'], $b['last_name']); });
    } elseif ($sortType == 'birth_date') {
        usort($data, function($a, $b) { return strcmp($a['birth_date'], $b['birth_date']); });
    }
    
    $total = count($data);
    $limit = 10;
    $pages = ceil($total / $limit);
    $offset = ($pageNumber - 1) * $limit;
    $slice = array_slice($data, $offset, $limit);
    
    $html = '<table>';
    $html .= '<tr><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th><th>ДР</th><th>Телефон</th><th>Адрес</th><th>Email</th><th>Коммент</th></tr>';
    
    foreach ($slice as $row) {
        $html .= '<tr>';
        $html .= '<td>'.htmlspecialchars($row['last_name']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['first_name']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['middle_name']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['gender']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['birth_date']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['phone']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['address']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['email']).'</td>';
        $html .= '<td>'.htmlspecialchars($row['comment']).'</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    
    if ($pages > 1) {
        $html .= '<div class="pagination">';
        for ($i = 1; $i <= $pages; $i++) {
            $html .= '<a href="index.php?page=view&sort='.$sortType.'&p='.$i.'">'.$i.'</a>';
        }
        $html .= '</div>';
    }
    
    return $html;
}
?>
