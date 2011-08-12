<div class="pager<?if($ajaxed):?> ajaxed<?endif?>"<?if($target):?> rel="<?=$target?>"<?endif?>>
    <div class="controls">
        <?php
        if ($current != $first) {
            echo '← <a class="prev" href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $prev)) : $prev) . '">' . t('previous', 'Pager') . '</a>';
        }
        ?>

        <?php
        if ($current != $last) {
            echo '<a class="next" href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $next)) : $next) . '">' . t('next', 'Pager') . '</a> →';
        }
        ?>
    </div>
    <ul class="pages">
        <?php
        if ($current != $first) {
            echo '<li class="first"><a href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $first)) : $first) . '">' . t('←', 'Pager') . '</a></li>';
        }
        if ($order == Pager_Pages::FORWARD) {
            for ($i = $first; $i <= $last; $i++) {
                if ($i != $current) {
                    echo '<li><a href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $i)) : $i) . '">' . $i . '</a></li>';
                } else {
                    echo '<li class="current">' . $i . '</li>';
                }
            }
        } else {
            for ($i = $first; $i >= $last; $i--) {
                if ($i != $current) {
                    echo '<li><a href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $i)) : $i) . '">' . $i . '</a></li>';
                } else {
                    echo '<li class="current">' . $i . '</li>';
                }
            }
        }
        if ($current != $last) {
            echo '<li class="last"><a href="' . $base_uri . ($method ? '?' . Url::extendQuery(array(Pager_Pages::ARG => $last)) : $last) . '">' . t('→', 'Pager') . '</a></li>';
        }
        ?>
    </ul>
</div>