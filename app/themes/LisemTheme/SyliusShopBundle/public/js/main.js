$(document).ready(function() {
    $('.ui.normal.dropdown').dropdown();

    // The Bulk option product selector logic
    var BulkSelector = function() {
        this.form = null;

        this.initBulkForm = function() {
            var surfaceInput = $('<input/>')
                .attr({
                    'type': 'text',
                    'pattern': '[0-9\,\.]*',
                    'name': 'bulk-surface',
                    'placeholder': 'Surface'
                });

            var weightInput = $('<input/>')
                .attr({
                    'type': 'text',
                    'pattern': '[0-9\,\.]*',
                    'name': 'bulk-weight',
                    'placeholder': 'Poid'
                });

            var weightUnitInput = $('<select/>')
                .attr({
                    'name': 'bulk-weight-unit'
                })
                .addClass('ui dropdown normal compact')
                .append(
                    $('<option/>').attr({
                        'value': 'Kg'
                    }).text('Kg'),
                    $('<option/>').attr({
                        'value': 'g'
                    }).text('g')
                );

            this.form = $('<div/>')
                .addClass('bulkSelectorForm ui segment secondary')
                .append(
                    $('<div/>').text('Choix du vrac'),
                    $('<div/>').addClass('inline fields').append(
                        $('<div/>').addClass('sixteen wide ui field icon').append(
                            $('<i class="crop icon"></i>'),
                            surfaceInput
                        )
                    ),
                    $('<div/>').addClass('inline fields').append(
                        $('<div/>').addClass('sixteen wide field icon').append(
                            '<i class="law icon"></i>',
                            weightInput
                        ),
                        $('<div/>').addClass('field').append(weightUnitInput)
                    )
                );
        };

        this.addToView = function(view) {
            this.initBulkForm();
            $(view).before(this.form);
            $('.ui.normal.dropdown').dropdown();
        };
    }

    var selector = new BulkSelector();
    selector.addToView($('#sylius-product-adding-to-cart .primary.button'));
});
