<? $user = new User_Object($item->aid)?>
<div class="comment" id="comment-<?=$item->id?>">
    <div class="comment-info">
        <? $comment_info = new Stack('comment.info');
           $comment_info->avatar = $user->getAvatarLinked();;
           $comment_info->author = $user->getLink();
           $comment_info->time = '<span class="time">'.icon('time').' '.df($item->created_date).'</span>';
           echo $comment_info;
           ?>
    </div>
    <div class="comment-body"><?=$item->body?></div>
</div>