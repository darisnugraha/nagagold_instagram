
<!-- <div id="keatas" class="filter-pencarian animate__backInUp">
<a href="#" target="_blank"><div class="button_filter"><i class="fa fa-filter"></i> Filter</div></a></div> -->

<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area pt-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">List Hadiah</h6>
                <!-- Layout Options-->
                <div class="layout-options">
                    <a class="active" href="<?= base_url('wp-tukar-point') ?>"><i class="fa fa-th-large"></i></a>
                </div>
            </div>
            <div id="load_data"></div>
            <div id="load_data_message"></div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
    // $("#keatas").hide();
    // // memberikan efek fade in pada id #keatas
    // $(function () {
    //      $(window).scroll(function () {
    //     if ($(this).scrollTop() > 300) {
    //         $('#keatas').fadeIn();
    //     } else {
    //         $('#keatas').fadeOut();
    //     }
    //     });
    // });
        var limit = 6;
        var start = 0;
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';

            output += '<div class="row">';
            for (var count = 0; count < limit; count++) {
                output += '<div class="col-6 col-sm-4">';
                output += '<div class="card top-product-card mb-3">';
                output += '<div class="card-body">';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
            }
            output += '</div>';
            $('#load_data_message').html(output);
        }

        lazzy_loader(limit);

        function load_data(limit, start) {
            $.ajax({
                url: base_url + "listbarangtukar",
                method: "POST",
                data: {
                    limit: limit,
                    start: start,
                    device: 'mobile'

                },
                cache: false,
                success: function(data) {
                    if (data == '') {
                        $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                        Load Data Barang Sudah Mencapai Batas.
                        </div>
                    </div><br>`);
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html("");
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action ==
                'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });

    });
</script>
<br>
<br>
<br>