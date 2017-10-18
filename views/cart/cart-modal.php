
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>Изображение</td>
                <td>Название</td>
                <td>Количество</td>
                <td>Цена</td>
                <td><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id=>$item):?>
            <tr>
                <td><?= $item['img']?></td>
                <td><?= $item['name']?></td>
                <td><?= $item['qty']?></td>
                <td><?= $item['price']?></td>
                <td><span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="4"> Общее количество</td>
                <td><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4"> Общая цена</td>
                <td><?= $session['cart.sum']?></td>
            </tr>
        </tbody>
    </table>
</div>