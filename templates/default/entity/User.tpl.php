<?php

    if (empty($vars['user']) && !empty($vars['object'])) {
        $vars['user'] = $vars['object'];
    }

?>
<article class="person">
        <!--<div class="row visible-sm">
            <div class="col-md-2">
                <div style="margin-bottom: 2em; margin-top: -2em; text-align: center">
                    <p>
                        <?= $this->draw('entity/User/profile/contact') ?>
                    </p>

                    <p style="margin-bottom: 2em" clear="all"></p>
                </div>
            </div>
        </div>-->
    <a href="<?= $vars['user']->getDisplayURL() ?>" class=""><img class="headerImg" src="<?= $vars['user']->getIcon() ?>"/></a>
        <?php
            if ($vars['user']->canEdit() && $vars['user']->getUUID() == \Idno\Core\Idno::site()->session()->currentUserUUID()) {
        ?>
        <a href="<?= $vars['user']->getEditURL() ?>" >Edit profile</a>
        <?php

        }

    ?>
    <h1>
            <a href="<?= $vars['user']->getDisplayURL() ?>"
               class="u-url p-name fn"><?= htmlentities(strip_tags($vars['user']->getTitle()), ENT_QUOTES, 'UTF-8') ?></a>
    </h1>
    <h2>
        <?= htmlentities(strip_tags($vars['user']->projTitle), ENT_QUOTES, 'UTF-8') ?>
    </h2>
    <section class="intro">
        <h3>
            Introduction
        </h3>
        <?php
            $description = $vars['user']->getDescription();
            if (!empty($description)) {
                echo '<div class="highlightedText">' . $this->autop($vars['user']->getDescription()) . '</div>';
            } else if ($vars['user']->getUUID() == \Idno\Core\Idno::site()->session()->currentUserUUID()) {
                ?>
                <p class="highlightedText">
                    <a href="<?= $vars['user']->getDisplayURL() ?>/edit/">Click here to fill in your
                        profile information.</a>
                </p>
            <?php
            }
        ?>
        <h3>
            Links
        </h3>
        <?= $this->draw('entity/User/profile/fields') ?>
        <h3>
            Process diary
        </h3>
        <div class="process inStream">
        <?=$this->draw('entity/feed');?>
        </div>
    </section>
</article>
