<html>
    <head>
        <script src="js/jquery.js"></script>

         <!--we can also download the form plugin from this url-->
        <script src="js/jquery.form.js"></script>
        <script>
            function form_submit() {
                return false;
            }
            function showRequest() {
                alert("Confirm submition");
            }
            function showResponse(data) {
                alert(data);
            }
            $(document).ready(function() {
                var options = {
                    url:        'doajaxfileupload.php',
                    beforeSubmit:  showRequest,
                    success:    showResponse
                };
                $('#myForm').submit(function() {
                    // inside event callbacks 'this' is the DOM element so we first 
                    // wrap it in a jQuery object and then invoke ajaxSubmit 
                    $(this).ajaxSubmit(options); 
             
                    // !!! Important !!!
                    // always return false to prevent standard browser submit and page navigation 
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <form action="" id="myForm" enctype="multipart/form-data" method="POST" onSubmit="return form_submit();">
            <input type="file" name="myfile" />
            <input type="submit" name="submit_button" id="submit_button" value="Submit File"/>
        </form>
    </body>
</html>