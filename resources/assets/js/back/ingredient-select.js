$('.select-ingredient-popup').click(() => {
    $('#selectIngredientPopup').modal('show');
});

$('#selectIngredientPopup').on('shown.bs.modal', () => {
    $('input[name="ingredient_name"]').focus().val('');
    $('.ingredient-results').html('');
});

let ingredients = [];

$('.remove-ingredient').on('click', function() {
    $(this).closest('.added-ingredient').remove();
});

$('.save-selected-ingredients').click(() => {
    $('#selectIngredientPopup').modal('hide');

    ingredients.map((i) => {
        const $addedIngredients = $('.added-ingredients');

        const $item = $(`
<div class="added-ingredient row form-inline">
    <label class="col-md-4">
        <img src="/assets/img/icons/${i.icon}" class="col-md-3">
        <span class="col-md-9">${i.name}</span>
    </label>
        <input type="hidden" name="ingredients[${i.id}][id]" value="${i.id}">
        <input type="text" name="ingredients[${i.id}][quantity]" value="1" class="form-control col-md-4">
        <select name="ingredients[${i.id}][measure]" class="form-control col-md-3">
            <option value="ч.л.">ч.л.</option>
            <option value="ст.л.">ст.л.</option>
            <option value="стакана">стакана</option>
            <option value="шт.">шт.</option>
            <option value="грамма">грамма</option>
            <option value="литра">литра</option>
            <option value="по вкусу">по вкусу</option>
        </select>
                <span class="glyphicon glyphicon-trash col-md-1 remove-ingredient"></span>
        
</div>  
        `);

        $addedIngredients.append($item);
    });

    ingredients = [];
});

let addIngredient = (i) => ingredients.push(i);


$('.ingredient-name').on('input', () => {
    const ingredient_name = $('.ingredient-name').val();

    if(ingredient_name.length < 2) return;

    axios.post('/admin/ingredients/search', { q: ingredient_name })
    .then(function (response) {
        const $ingredient_results = $('.ingredient-results');

        $ingredient_results.html('');

        if(!response.data.length) {
            $ingredient_results.append('<h5>Ингредиентов не найдено</h5>');
        }

        response.data.map((ingredient)=>{
            const $ingredient = $(`
                <div class="ingredient" data-id="${ingredient.id}">    
                    <h5><img src="/assets/img/herb/${ingredient.icon}" alt=""> ${ingredient.name}</h5>
                </div>`);

            $ingredient.click(() => {
                $ingredient.toggleClass('selected');
                addIngredient(ingredient);
            });

            $ingredient_results.append($ingredient);
        });
    })
    .catch(function (error) {
        console.log('catch',error);
    });
});