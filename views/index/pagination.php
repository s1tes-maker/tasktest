<?php if(!$htmlItems) return; ?>

<div class="col-12">
    <div class="row justify-content-center">
        <nav aria-label="Tasks page navigation">
            <ul class="pagination">
                <?php for ( $i = 0; $i < count($htmlItems); $i++ ) :  ?>
                    <?php $item = $htmlItems[$i]; ?>
                    <?php if($item['anchor'] != '') : ?>
                        <li class="page-item <?=$item['active']?> <?=$item['disabled']?>">
                            <a class="page-link" href="<?=$item['get_params']?>" ><?=$item['anchor']?></a>
                        </li>
                    <?php endif ?>
                <?php endfor ?>
            </ul>
        </nav>
    </div>
</div>
