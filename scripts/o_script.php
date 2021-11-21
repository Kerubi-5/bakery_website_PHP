<script>
    /* Add item products to cart */
    $(document).ready(function() {
        $(".addItemBtn").click(function(e) {
            e.preventDefault();
            const $form = $(this).closest(".form-submit");
            let quantity = $form.find(".o_quantity").val();
            let productID = $form.find(".prodid").val();
            let params = "productID=" + productID + "&quantity=" + quantity;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./database/process.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }
            }
            xhr.send(params);
        });
        $(".checkoutBtn").click(function(e) {
            e.preventDefault();
            const $form = $(this).closest(".checkout-form");
            let flag = $form.find(".logged").val();
            if (flag == 1) {
                let instructions = $('#o_instructions').val();
                let quantity = parseInt($('#total_price').text());
                params = "qty=" + quantity + "&instructions=" + instructions;
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./database/checkout.php", true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                }
                xhr.send(params);
            } else {
                $('#confirm-order').modal('show');
            }
        });
    });
    /*
        Carousel
    */
    $('#carousel-example').on('slide.bs.carousel', function(e) {
        /*
            CC 2.0 License Iatek LLC 2018 - Attribution required
        */
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 5;
        var totalItems = $('.carousel-item').length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                } else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
    });
</script>