<button uk-toggle="target: #bkldf" class="uk-button uk-button-default">Додати новий</button>


<div id="bkldf" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>



    <h2 class="uk-heading-divider">Додавання продукту</h2>
    <form class="uk-form-horizontal" method="post" action="/newcalc/model/add-products.php">
        <div class="uk-margin">
            <label class="uk-form-label" for="product_name">Назва:</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="product_name" id="product_name" required>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="price_per_kg">Ціна за кг:</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="number" name="price_per_kg" id="price_per_kg" step="1" min="0" required>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-primary" type="submit">Додати</button>
        </div>
    </form>

    </div>
</div>

<table class="uk-table uk-table-striped">
    <?php $all_products = db_read_all('products'); ?>
    
    <thead>
        <tr>
            <th>Назва продукту</th>
            <th>Ціна за 1 кг</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all_products as $product) : ?>
        <tr>
            <td><?php echo $product['product_name'];?></td>
            <td><?php echo $product['price_per_kg'];?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>