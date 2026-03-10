$(document).ready(function() {
    // console.log('filter.js');
    function scrollToFilter() {
        let top = $('.filter_top_js').offset().top - 100;
        $('body,html').animate({scrollTop: top}, 700);
    }
    
    $(".filter-list-js :radio").click(function() {
        scrollToFilter();
        my_filter_get_posts();
    });

    $(".order_js").click(function() {
        my_filter_get_posts();
    });

    $(document).on("click",".page-numbers",function(e){
        e.preventDefault();
        scrollToFilter();

        var url = $(this).attr('href');
        var paged = url.split('&paged=');

        if(~url.indexOf('&paged=')){
            paged = url.split('&paged=');
        } else {
            paged = url.split('/page/');
        }

        my_filter_get_posts(paged[1]);
    });

    //Получаем данные
    function getPostType () {
        let post_type = [];
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-post-type');
            post_type.push(val);
        });
        return post_type;
    }

    function getTaxonomy () {
        let taxonomy;
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-taxonomy');
            taxonomy = val;
        });
        return taxonomy;
    }
    function getCat() {
        let cat = []; 
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).val();
            cat.push(val); 
        });
        return cat; 
    }
    function getPostsPerPage() {
        let posts_per_page; 
        $(".filter-cat-js input:checked").each(function() {
            let val = $(this).attr('data-posts_per_page');
            posts_per_page = val; 
        });
        return posts_per_page; 
    }

    function custom_order () {
        let order;
        if ($(".order_js").prop('checked')) {
            order = 'desk';
        }
        else {
            order = 'asc';
        }
        return order;
    }

    function my_filter_get_posts(paged) {
        let paged_value = paged;
        let ajax_url = '/wp-admin/admin-ajax.php';
        
        $.ajax({
            type: 'GET',
            url: ajax_url,
            data: {
                action: 'my_filter',
                postType: getPostType,
                taxonomy: getTaxonomy,
                cat: getCat,
                postsPerPage: getPostsPerPage,
                order: custom_order,
                paged: paged_value,
            },

            beforeSend: function () {
                initPreloder();
            },
            complete: function() {
                destroyPreloder();
            },
            success: function(data) {
                $('.filter__content').html(data);
            },
            error: function() {
                $(".filter__content").html('<p>There has been an error</p>');
            }
        });
    }

    function initPreloder() {
        // $('.preloaderFilter-js').show(800);
        $('.preloaderFilter-js').addClass('active');
    }

    function destroyPreloder() {
        setTimeout( () => {
            // $('.preloaderFilter-js').hide(800);
            $('.preloaderFilter-js').removeClass('active');
        },300);
    }

});

