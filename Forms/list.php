<?php
for ($i = Mappers\CommentMapper::getCommentsRow()-1;  $i >= Mappers\CommentMapper::getCommentsRow()-App\Config::get('num_records'); $i--) {
    echo   '<div class="message">';
    $soome = new Models\Comment;
    $soome->text = '';
    $arr = Mappers\CommentMapper::select($soome);
    $arr = ($arr[$i]);
    print_r($arr->text); 
    echo '<div class = "of">'.($arr->getCreatedAt()).'</div>';
    echo   '</div>';
}
?>