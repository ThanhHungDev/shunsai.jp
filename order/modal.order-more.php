<?php $foods = foods(); ?>
<div id="js-select-food" class="modal modal-select-food">
    <div class="model-header">製品を選択してください</div>
    <div class="modal-body">
        <?php if (!empty($foods)) : ?>
            <ul>
                <?php foreach ($foods as $food) : ?>
                    <li class="js-item-order" data-name="<?= $food['name'] ?>" data-price="<?= $food['price'] ?>">
                        <figure class="box-modern-figure">
                            <img src="<?= $food['img'] ?>" alt="" />
                            <figcaption class="box-modern-title">
                                <div class="content">
                                    <h5 class="name"><?= $food['name'] ?></h5>
                                    <h6 class="price"><?= $food['price'] ?>円（税込）</h6>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="modal-footer">
        
        <a class="btn-cancel-item-order" href="" rel="modal:close">キャンセル</a>
        <a class="btn-add-item-order" >はい</a>
    </div>
</div>
