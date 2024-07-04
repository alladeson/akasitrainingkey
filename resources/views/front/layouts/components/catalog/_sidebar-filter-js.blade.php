<script>
    var categories = [];
    var certifications = [];
    var vendors = [];
    var levels = [];
    var level_all = [];
    var learning_mode = [];
    var prices = '';
    var price_all = 0;
    var durations = [];
    var duration_hours = 0;
    var duration_weeks = 0;
    var filter_items = [];
    var price_filter_item = '';
    var search_text = '';
    var filter_counter = 0;
    // Filter dropdown
    var filter_status = '';

    // handle filter sidebar on item checked
    function handleFilterSidebar(el) {
        var value = $(el).val();
        var el_id = $(el).attr('id');
        if ($(el).is(':checked')) {
            if ($(el).data('type') == 'category')
                categories.push(parseInt(value));
            if ($(el).data('type') == 'certification')
                certifications.push(parseInt(value));
            if ($(el).data('type') == 'vendor')
                vendors.push(parseInt(value));
            if ($(el).data('type') == 'learning-mode')
                learning_mode.push(value);
            if ($(el).data('type') == 'level') {
                if (value == 'All')
                    level_all = ['Beginner', 'Intermediate', 'Expert'];
                else
                    levels.push(value);
            }
            if ($(el).data('type') == 'price') {
                // Retirer l'ancien choix, utile parce que l'élément est un bouton radio
                // le choix est donc unique
                if (price_filter_item) {
                    filter_items.splice($.inArray(price_filter_item, filter_items), 1);
                    filter_counter--;
                }
                //
                if (value == 'All')
                    price_all = 1;
                else
                    prices = value;
                // Enregistre le nouveau choix
                price_filter_item = el_id;
            }
            if ($(el).data('type') == 'duration') {
                if (value == 'hours')
                    duration_hours = 1;
                else if (value == 'weeks')
                    duration_weeks = 1;
                else
                    durations.push(value);
            }

            //
            filter_items.push(el_id);
            formatFilterItems();

            //
            filter_counter++;
        } else {
            if ($(el).data('type') == 'category')
                categories.splice($.inArray(parseInt(value), categories), 1);
            if ($(el).data('type') == 'certification')
                certifications.splice($.inArray(parseInt(value), certifications), 1);
            if ($(el).data('type') == 'vendor')
                vendors.splice($.inArray(parseInt(value), vendors), 1);
            if ($(el).data('type') == 'learning-mode')
                learning_mode.splice($.inArray(value, learning_mode), 1);

            if ($(el).data('type') == 'level') {
                if (value == 'All')
                    level_all = [];
                else
                    levels.splice($.inArray(value, levels), 1);
            }
            if ($(el).data('type') == 'price') {
                if (value == 'All')
                    price_all = 0;
                else
                    prices = '';
            }
            if ($(el).data('type') == 'duration') {
                if (value == 'hours')
                    duration_hours = 0;
                else if (value == 'weeks')
                    duration_weeks = 0;
                else
                    durations.splice($.inArray(value, durations), 1);
            }

            //
            filter_items.splice($.inArray(el_id, filter_items), 1);
            formatFilterItems();

            //
            filter_counter--;
        }
        $('#filter-counter').text('(' + filter_counter + ')');
        getCourses();
    }

    /**
     * Show filter sidebar items when checked
     *
     * */
    function formatFilterItems() {
        var item_clear_all = `
                    <div class="col-md-2" style="width: auto!important;">
                        <span class="badge bg-light text-dark">Clear all filters
                            <button class="courses-tag__close" data-id="closeall"><svg width="25" height="25" class="icon icon-close" aria-hidden="true" role="img"><use href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#close') }}"></use></svg>
                            </button>
                        </span>
                    </div>
            `;

        var items = `<div class="row filter-item-wrapper">`;
        if (filter_items.length) {
            filter_items.forEach(item => {
                var item_text = $('label[for="' + item + '"]').text();
                items += `<div class="col-md-2 filter-item" style="width: auto!important;">
                        <span class="badge bg-light text-dark">${item_text}
                            <button class="courses-tag__close" data-id="${item}">
                                <svg width="25" height="25" class="icon icon-close" aria-hidden="true" role="img"><use href="{{ asset_own('front/img/customized/courses/icon-sprite.svg#close') }}"></use></svg>
                            </button>
                        </span>
                    </div>`;
            });
            items += item_clear_all + `</div>`;
        }

        // Show filter items
        $('div.filter-item-wrapper').replaceWith(items);
        manageFilterItemClearBtn();

    }

    /**
     * Update filter item when clear
     * */
    function manageFilterItemClearBtn() {
        $('button.courses-tag__close').on('click', function(event) {
            // Prevent propagation of click event twice
            event.stopImmediatePropagation();
            var el = $(this);
            var item_id = el.data('id');
            // On close clear all
            if (item_id == 'closeall') {
                filter_items.forEach(item => {
                    $('input#' + item).prop("checked", false);
                });
                filter_items = [];
                formatFilterItems();
                categories = [];
                certifications = [];
                vendors = [];
                levels = [];
                level_all = [];
                learning_mode = [];
                prices = '';
                price_all = 0;
                durations = [];
                duration_hours = 0;
                duration_weeks = 0;
                filter_items = [];
                price_filter_item = '';
                filter_counter = 0;
                $('#filter-counter').text('(' + filter_counter + ')');
                getCourses();

            } else { // On clear one
                // Uncheck el
                $('input#' + item_id).prop("checked", false);
                // Manage filter sidebar
                handleFilterSidebar($('input#' + item_id));
            }
        })
    }

    function setFilterStatus(event, el) {
        event.preventDefault();
        filter_status = $(el).val();
        getCourses();
    }
</script>
