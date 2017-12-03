// $('.select-picker')
//     .selectpicker({
//         liveSearch: true
//     })
//     .ajaxSelectPicker({
//         ajax: {
//             url: '/admin/ingredients/search/',
//             data: {q:'{{{q}}}'},
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         },
//         locale: {
//             emptyTitle: 'Search for contact...'
//         },
//         preprocessData: function(data){
//             let ingredients = [];
//             for(var i = 0; i < data.length; i++){
//                 var curr = data[i];
//                 ingredients.push(
//                     {
//                         'value': curr.id,
//                         'text': curr.name,
//                         'data': {
//                             'icon': curr.icon,
//                             'subtext': 'Internal'
//                         },
//                         'disabled': false
//                     }
//                 );
//             }
//
//             return ingredients;
//         },
//         preserveSelected: false
//     });

$('.ingredient-name').on('input', () => {
    const ingredient_name = $('.ingredient-name').val();

    if(ingredient_name.length < 2) return;

    axios.post('/admin/ingredients/search', { q: ingredient_name })
    .then(function (response) {
        let ingredients = '';

        response.data.map((ingredient)=>{
            ingredients += `
                <div class="ingredient" data-id="${ingredient.id}">
                    
                    <h5><img src="/assets/img/herb/${ingredient.icon}" alt=""> ${ingredient.name}</h5>
                    
                </div>
            `;
        });

        $('.ingredient-results').html(ingredients);
    })
    .catch(function (error) {
        console.log('catch',error);
    });
});