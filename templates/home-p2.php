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
        weight_input.setAttribute('class', 'uk-input');
        weight_input.setAttribute('type', 'number');
        weight_input.setAttribute('name', 'weights[]');
        weight_input.setAttribute('placeholder', 'Weight in grams');
        weight_input.setAttribute('required', '');

        var remove_button = document.createElement('button');
        remove_button.setAttribute('class', 'uk-button uk-button-danger');
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

    add_ingredient_button.addEventListener('click', add_ingredient);


    // Получаем значения полей формы
    const dish_name = document.getElementById('dish_name').value;

    let asdad = document.getElementById('ingredients_container');

    let ingredients = Array();
    let weights = Array();

    let i = 0;
    for (let node of asdad.childNodes) {
        
        let i = parseInt(node.split('_')[1]);

        ingredients[i] = node.children[0].value;
        weights[i] = node.children[1].value;
    }

    // Создаем объект запроса
    const xhr = new XMLHttpRequest();

    // Устанавливаем обработчик события загрузки
    xhr.addEventListener('load', function() {
    // Обрабатываем ответ от сервера
    if (xhr.status === 200) {
        console.log(xhr.responseText);
        // Очищаем поля формы
        document.getElementById('dish_name').value = '';
        document.getElementById('ingredients').value = '';
        document.getElementById('weights').value = '';
    } else {
        console.error('Произошла ошибка при отправке запроса');
    }
    });

    // Отправляем запрос на сервер
    xhr.open('POST', '/path/to/add-dishes.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`dish_name=${dish_name}&ingredients=${ingredients}&weights=${weights}`);
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
            <td>Table Data</td>
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