$('.select-ingredient-popup').click(() => {
    $('#selectIngredientPopup').modal('show');
});

$('#selectIngredientPopup').on('shown.bs.modal', () => {
    $('input[name="ingredient_name"]').focus().val('');
    $('.ingredient-results').html('');
});

let ingredients = [];
const $addedIngredients = $('.added-ingredients');

$('.remove-ingredient').on('click', function() {
    $(this).closest('.added-ingredient').remove();
});

$('.save-selected-ingredients').click(() => {
    $('#selectIngredientPopup').modal('hide');

    removeUnselectedIngredients();

    ingredients.map((i) => {
        if(!alreadyAdded(i)) {
            addIngredientToHtml(i);
        }
    });

    //ingredients = [];
});

let removeIngredient = (item) => ingredients = ingredients.filter(ingredient => ingredient.id !== item.id);
let addIngredient = (item) => ingredients.push(item);
let hasIngredient = (item) => ingredients.filter(ingredient => ingredient.id === item.id).length;

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

        response.data.map((ingredient) => {
            const item_class = hasIngredient(ingredient) ? 'alert-success' : 'alert-info';

            const $ingredient = $(`
                <div class="ingredient" data-id="${ingredient.id}">    
                    <div class="alert ${item_class}"><img src="/assets/img/icons/${ingredient.icon}" alt=""> ${ingredient.name}</div>
                </div>`);

            $ingredient.click(() => {
                if(hasIngredient(ingredient)) {
                    removeIngredient(ingredient);
                    $ingredient.children().removeClass('alert-success').addClass('alert-info');
                } else {
                    addIngredient(ingredient);
                    $ingredient.children().removeClass('alert-info').addClass('alert-success');
                }
            });

            $ingredient_results.append($ingredient);
        });
    })
    .catch(function (error) {
        console.log('catch',error);
    });
});


let removeUnselectedIngredients = () => {
    $('.added-ingredient').each((index, node) => {
        const id = $(node).data('id');

        if(!hasIngredient({id:id})) {
            $(node).remove();
        }
    });
};

let alreadyAdded = (i) => {
    return $('.added-ingredient').filter((index,node) => $(node).data('id') === i.id).length;
};

let addIngredientToHtml = (i) => {
    const $item = $(`
<div class="added-ingredient row form-inline" data-id="${i.id}">
    <label class="col-md-4">
        <img src="/assets/img/icons/${i.icon}" class="col-md-3">
        <span class="col-md-9">${i.name}</span>
    </label>
    <input type="hidden" name="ingredients[${i.id}][id]" value="${i.id}">
    <input type="text" name="ingredients[${i.id}][notes]" value="" class="form-control col-md-4" placeholder="Нотации">
    <input type="text" name="ingredients[${i.id}][quantity]" value="1" class="form-control col-md-4" placeholder="Количество">
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

    $item.find('.remove-ingredient').click(() => {
        removeIngredient({id:i.id});
        $item.remove();
    });

    $addedIngredients.append($item);
};
