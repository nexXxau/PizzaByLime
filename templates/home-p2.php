<button uk-toggle="target: #kb45ek" class="uk-button uk-button-default">Додати новий</button>

<div id="kb45ek" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>


        <h1 class="uk-heading-medium">Add Dish</h1>

        <form class="uk-form-horizontal" method="post" action="/newcalc/model/add-dishes.php">
            <div class="uk-margin">
                <label class="uk-form-label" for="dish_name">Dish Name:</label>
                <div class="uk-form-controls">
                    <input class="uk-input" type="text" name="dish_name" required>
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-form-controls uk-text-right">
                    <button class="uk-button uk-button-primary" type="submit">Add Dish</button>
                </div>
            </div>

        </form>
    </div>
</div>


<button uk-toggle="target: #mgfiu76" class="uk-button uk-button-default">Ингредиенты</button>

<div id="mgfiu76" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>


        <h1 class="uk-heading-medium">Set Ingredients</h1>

        <form class="uk-form-horizontal" method="get" action="/newcalc/model/set-ingr.php">
            <div class="uk-margin">
                <label class="uk-form-label" for="dish_name">Dish Name:</label>
                <div class="uk-form-controls">
                    <select name="dish_name" id="dishname">

                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="ingredients">Ingredients:</label>
                <div class="uk-form-controls">
                    <div class="uk-margin" id="ingredients_container"></div>
                    <button class="uk-button uk-button-default" type="button" id="add_ingredient">Add
                        Ingredient</button>
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-form-controls uk-text-right">
                    <button class="uk-button uk-button-primary" type="submit">Add Dish</button>
                </div>
            </div>
        </form>
    </div>
</div>












<script>
    // Get the products list from the server
    var products = <?php echo json_encode(db_read_all('products')); ?>;

    // Create the ingredient input fields
    var ingredients_container = document.getElementById('ingredients_container');
    var add_ingredient_button = document.getElementById('add_ingredient');
    var ingredient_index = 0;

    function add_ingredient() {
        var select = document.createElement('select');
        select.setAttribute('class', 'uk-select');
        select.setAttribute('name', 'ingredients[]');

        for (var i = 0; i < products.length; i++) {
            var product = products[i];
            var option = document.createElement('option');
            option.setAttribute('value', product.id);
            option.textContent = product.product_name;
            select.appendChild(option);
        }

        var weight_input = document.createElement('input');
        weight_input.setAttribute('class', 'uk-input uk-width-1-2');
        weight_input.setAttribute('type', 'number');
        weight_input.setAttribute('name', 'weights[]');
        weight_input.setAttribute('placeholder', 'Weight in grams');
        weight_input.setAttribute('required', '');

        var remove_button = document.createElement('button');
        remove_button.setAttribute('class', 'uk-button uk-button-danger uk-width-1-2');
        remove_button.setAttribute('type', 'button');
        remove_button.textContent = 'Remove';
        remove_button.addEventListener('click', function () {
            ingredient_div.remove();
        });

        var ingredient_div = document.createElement('div');
        ingredient_div.setAttribute('class', 'uk-margin');
        ingredient_div.setAttribute('id', 'ingredient_' + ingredient_index);
        ingredient_div.appendChild(select);
        ingredient_div.appendChild(weight_input);
        ingredient_div.appendChild(remove_button);
        ingredients_container.appendChild(ingredient_div);

        ingredient_index++;
    }


    var dishes = <?php echo json_encode(db_read_all('dishes')); ?>;

    var dishname = document.getElementById('dishname');
    dishname.setAttribute('class', 'uk-select');
    dishname.setAttribute('name', 'dishname');

    for (var i = 0; i < dishes.length; i++) {
        var dish = dishes[i]; // используем другое имя переменной
        var option = document.createElement('option');
        option.setAttribute('value', dish.id);
        option.textContent = dish.dishes_name;
        dishname.appendChild(option);
    }

    add_ingredient_button.addEventListener('click', add_ingredient);
</script>

















<table class="uk-table uk-table-striped">
    <?php $all_dishes = db_read_all('dishes'); ?>
    <thead>
        <tr>
            <th>Назва страви</th>
            <th>Складові</th>
            <th>Сума за одиницю</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all_dishes as $dish) : ?>
        <tr>
            <td><?php echo $dish['dishes_name'];?></td>
            <td>
                <?php echo get_array_ingredients($dish['id']); ?>
            </td>
            <td>Table Data</td>
            <td>
                <form action="/newcalc/model/del-dishes.php" method="post">
                    <input class="uk-input" type="text" name="id" value="<?php echo $dish['id'] ?>" required hidden >
                    <button class="uk-button uk-button-danger uk-button-small uk-align-right" type="submit">x</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>