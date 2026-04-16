</div>
            </div>
        </div>
        <!-- Page content -->


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="js/metisMenu.js"></script>
    <script src="./js/popup.js"></script>
    <!-- <script type="text/javascript">
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
        })
    </script> -->
    <script>
        $('.sidebar_icon').on('click', function() {
            $('.sidebar ,#page-content-wrapper').toggleClass('active_sidebar');
        });
        $('.sidebar_close_icon').on('click', function() {
            $('.sidebar ,#page-content-wrapper').removeClass('active_sidebar');
        });
    </script>
    <script>
        $(document).on("click.nice_select", ".nice-select", function(event) {
            var $dropdown = $(this);

            $(".nice-select")
                .not($dropdown)
                .removeClass("open");
            $dropdown.toggleClass("open");

            if ($dropdown.hasClass("open")) {
                $dropdown.find(".option");
                $dropdown.find(".nice-select-search").val("");
                $dropdown.find(".nice-select-search").focus();
                $dropdown.find(".focus").removeClass("focus");
                $dropdown.find(".selected").addClass("focus");
                $dropdown.find("ul li").show();
            } else {
                $dropdown.focus();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $("#sidebar_menu").metisMenu();
        // metisMenu 
        $("#admin_profile_active").metisMenu();
        $("#sidebar_menu").find("a").removeClass("active");
        $("#sidebar_menu").find("li").removeClass("mm-active");
        $("#sidebar_menu").find("li ul").removeClass("mm-show");

        var current = window.location.pathname
        $("#sidebar_menu >li a").filter(function() {

            var link = $(this).attr("href");
            if (link) {
                if (current.indexOf(link) != -1) {
                    $(this).parents().parents().children('ul.mm-collapse').addClass('mm-show').closest('li').addClass('mm-active');
                    $(this).addClass('active');
                    return false;
                }
            }
        });
    </script>
</body>

</html>