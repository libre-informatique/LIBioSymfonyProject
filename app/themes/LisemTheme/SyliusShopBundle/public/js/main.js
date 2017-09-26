$(document).ready(function() {

    var BulkSelector = function() {

        /**
         * Packaging select input
         *
         * @type {object}
         */
        this.packagingSelect;

        /**
         * The custom form wrapper
         *
         * @type {object}
         */
        this.bulkForm;

        /**
         * The default quantity input
         *
         * @type {object}
         */
        this.quantityChooser;

        /**
         * The variety seed density for calculation
         *
         * @type {float}
         */
        this.varietyDensity;

        /**
         * The variety thousand kernel weight
         *
         * @type {float}
         */
        this.varietyTkw;

        this.__construct = function() {
            // init properties
            this.packagingSelect = $('[name*="sylius_add_to_cart[cartItem][variant][_lisem_packaging]"]');
            this.bulkForm = $('#librinfo-product-bulk-chooser');
            this.quantityChooser = $('#sylius_add_to_cart_cartItem_quantity').parent();
            this.varietyDensity = this.bulkForm.find('input[name="product-variety-density"]').val();
            this.varietyTkw = this.bulkForm.find('input[name="product-variety-tkw"]').val();

            // init form events
            this.initEvents();
        };

        this.initEvents = function() {
            var _self = this;
            var lastSourceInput = null;
            $(document)
                .on('keyup focusout', this.bulkForm.selector + ' input[name="bulk-weight"],' + this.bulkForm.selector + ' input[name="bulk-surface"]', function() {
                    _self.calculate($(this));
                    lastSourceInput = $(this);
                })
                .on('change', this.bulkForm.selector + ' select[name="bulk-weight-unit"],' + this.bulkForm.selector + ' select[name="bulk-surface-unit"]', function() {
                    let linkedFieldName = $(this).data('linked-field');
                    if (lastSourceInput === null) {
                        lastSourceInput = $('input[name="' + linkedFieldName + '"]');
                    }
                    _self.calculate(lastSourceInput);
                });
        };

        this.calculate = function(sourceInput) {
            let calculationType,
                destInput;

            if (sourceInput.val() === '') return;

            calculationType = sourceInput.attr('name') === 'bulk-weight' ? 'weightToSurface' : 'surfaceToWeight';

            destInput = this.bulkForm.find('input[name="bulk-' + (calculationType === 'weightToSurface' ? 'surface' : 'weight') + '"]');

            var Density = this.varietyDensity;
            var Tkw = this.varietyTkw;
            var Weight;
            var WeightUnitRatio;
            var Surface;
            var SurfaceUnitRatio;

            WeightUnitRatio = this.numberToFixed(this.bulkForm.find('select[name="bulk-weight-unit"] option:selected').data('ratio'));
            SurfaceUnitRatio = this.numberToFixed(this.bulkForm.find('select[name="bulk-surface-unit"] option:selected').data('ratio'));

            if (calculationType === 'surfaceToWeight') {
                Surface = this.numberToFixed(sourceInput.val()) * SurfaceUnitRatio;

                Weight = (Surface * Density) / Tkw;

                destInput.val(this.numberToFixed(Weight / WeightUnitRatio));
            } else {
                Weight = this.numberToFixed(sourceInput.val()) * WeightUnitRatio;

                Surface = (Weight * Tkw) / Density;

                destInput.val(this.numberToFixed(Surface / SurfaceUnitRatio));
            }
        };

        this.numberToFixed = function(value) {
            return parseFloat(value.toString().replace(',', '.')).toFixed(2);
        };

        this.handleChange = function(select, value) {
            if (select.attr('id') === this.packagingSelect.attr('id')) {
                value === 'BULK' ? this.showBulkForm() : this.hideBulkForm();
            }
        };

        this.showBulkForm = function() {
            this.bulkForm.show();
            this.quantityChooser.hide();
        };

        this.hideBulkForm = function() {
            this.quantityChooser.show();
            this.bulkForm.hide();
        };

        this.__construct(); // Hack to simulate class constructor call when instanciating
    }

    // Init missing dropdown
    $('.ui.normal.dropdown').dropdown();

    // Init bulk selector
    var selector = new BulkSelector();

    // Init if packaging
    selector.handleChange($(selector.packagingSelect.selector), $(selector.packagingSelect.selector).val());

    // Init packaging change event
    $(document).on('change', selector.packagingSelect.selector, function() {
        selector.handleChange($(this), $(this).val());
    });


});
