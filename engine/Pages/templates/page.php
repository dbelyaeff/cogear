<div class="page">
    <div class="page-title">
        <? $title = new Stack('Page.title') ?>
        <? $title->name = '<h1>' . $page->teaser ? HTML::a($page->getUrl(), $page->name) : $page->name . '</h1>' ?>
        <?
        if ($cogear->user->id == $page->aid OR access('pages edit_all')) {
            $title->edit = HTML::a(Url::gear('pages') . 'edit/' . $page->id, icon('cog'));
        }
        ?>
<?= $title->render() ?>
    </div>    
    <div class="page-content">
<?= $page->body ?>
    </div>
    <div class="page-info">
        <? $info = new Stack('Page.info') ?>
        <? $info->created_date = '<span class="created_date">' . df($page->created_date) . '</span>' ?>
        <?
        $user = new User_Object();
        $user->where('id', $page->aid);
        if ($user->find()) {
            $info->author = '<span class="author">' .$user->getAvatar()->getSize(config('page.author.avatar.size','24')). HTML::a($user->getProfileLink(),$user->login) . '</span>';
        }
        ?>
<?= $info->render() ?>
    </div>
</div>