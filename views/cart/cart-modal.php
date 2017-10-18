<?php if (isset($session)):?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
             <?php foreach ($session['cart'] as $id=>$item):?>
            <tr>
                <td><?= $item['img'];?></td>
                <td><?= $item['name'];?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="4">Общее количество</td>
                <td><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">Итоговая сумма</td>
                <td><?= $session['cart.sum']?></td>
            </tr>
            </tbody>

        </table>
    </div>
    <?php else:?>
    <h2>Корзина пуста</h2>
<?php endif;?>
