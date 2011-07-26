<div class="page">
    <div class="page-title">
        <? $title = new Stack('Page.title') ?>
        <? $title->name = '<h1>' . ($item->in_grid ? HTML::a($item->getUrl(), $item->name) : $item->name) . '</h1>' ?>
        <?
        if ($cogear->user->id == $item->aid OR access('pages edit_all')) {
            $title->edit = HTML::a(Url::gear('pages') . 'edit/' . $item->id, t('[edit]'),array('class'=>'edit'));
        }
        ?>
        <?= $title ?>
    </div>    
    <div class="page-content">
<?= $item->body ?>
    </div>
    <div class="page-info">
        <? $info = new Stack('Page.info') ?>
        <? $info->created_date = '<span class="created_date">' . df($item->created_date) . '</span>' ?>
        <?
        $user = new User_Object();
        $user->where('id', $item->aid);
        if ($user->find()) {
            $info->author = '<span class="author">' .HTML::a($user->getProfileLink(),HTML::img(image_preset('avatar.small',$user->getAvatar()->getFile(),TRUE),array('class'=>'avatar'))). HTML::a($user->getProfileLink(),$user->login) . '</span>';
        }
        ?>
<?= $info->render() ?>
    </div>
</div>