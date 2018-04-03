<script >
    $(document).ready(function () {

        $(".m-menu__subnav .m-menu__item ").click(function () {
            console.log("click");
            $.get("./test.blade.php", function (data) {
                $(".m-content").html(data);

            });

        });
    });

</script>