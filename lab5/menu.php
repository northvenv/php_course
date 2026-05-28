<?php
function getMenu() {
    $page = $_GET['page'] ?? 'view';
    $sort = $_GET['sort'] ?? 'id';
    
    $items = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];
    
    $html = '<div class="menu-container">';
    foreach ($items as $key => $label) {
        $active = ($page == $key) ? ' active' : '';
        $html .= '<a href="index.php?page='.$key.'" class="btn'.$active.'">'.$label.'</a> ';
    }
    
    if ($page == 'view') {
        $html .= '<div class="submenu">';
        $sorts = [
            'id' => 'По порядку',
            'last_name' => 'По фамилии',
            'birth_date' => 'По дате рождения'
        ];
        foreach ($sorts as $key => $label) {
            $active = ($sort == $key) ? ' active' : '';
            $html .= '<a href="index.php?page=view&sort='.$key.'" class="btn-small'.$active.'">'.$label.'</a> ';
        }
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}
?>
