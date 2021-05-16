$(document).ready(function () {

    var date_input=$('input[id="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);


    let elementCount = 0

    function handler() {
        $(this).parent().remove();
    }

    $(".append-btn").click(function () {
        let id = 'testukas-' + elementCount;
        elementCount++;
        $("#append").clone().appendTo(".append-copy").removeAttr("id").attr('copy', id);
        $("[copy=" + id + "]").append(function () {
            return $('<button type="button" name="add" class="btn btn-danger remove-btn">Remove</button>').click(handler);
        })
    });

/**
    $("#fillPupil").click(function () {
        if (this.checked == true) {
                document.getElementById("employee-form").style.display = "none";
                document.getElementById("pupil-form").style.display = "block";
        }
        else{
            $('#pupil-form').prop("disabled", true);
            document.getElementById("employee-form").style.display = "none";
            document.getElementById("pupil-form").style.display = "none";
        }
    });

    $("#fillEmployee").click(function () {
        if (this.checked == true) {
                document.getElementById("employee-form").style.display = "block";
                document.getElementById("pupil-form").style.display = "none";

        }
        else{
            document.getElementById("employee-form").style.display = "none";
            document.getElementById("pupil-form").style.display = "none";
        }
    });


        $("#select-account").change(function () {
            if (this.value == 'pupil') {
                $('#fillEmployee').prop('checked', false);
                document.getElementById("employee-form").style.display = "none";
                document.getElementById("empCheck").style.display = "none"
                document.getElementById("pupCheck").style.display = "block"
            }
            if (this.value == 'employee') {
                $('#fillPupil').prop('checked', false);
                document.getElementById("pupil-form").style.display = "none";
                document.getElementById("empCheck").style.display = "block"
                document.getElementById("pupCheck").style.display = "none"
            }
        });

    $("#representativeSelect").change(function () {
        if (this.value == 'new') {
            document.getElementById("existingRepresentative").style.display = "none"
            document.getElementById("representative-form").style.display = "block"
        }
        if (this.value == 'existing') {
            document.getElementById("existingRepresentative").style.display = "block"
            document.getElementById("representative-form").style.display = "none"
        }
    });


    $("#userForm").submit(function() {

        var accType = document.getElementById("select-account");
        var fillPupil = document.getElementById("fillPupil");
        var fillEmployee = document.getElementById("fillEmployee");
        var representativeSelect = document.getElementById("representativeSelect");

        if(fillPupil.checked == false || fillEmployee.checked == false) {
            $("#employee-form").empty();
            $("#pupil-form").empty();
        }

        if (accType.value == 'pupil' && fillPupil.checked == true){
            $("#employee-form").remove();

            if (representativeSelect.value == 'new'){
                $("#existingRepresentative").remove();
            }
            if (representativeSelect.value == 'existing'){
                $("#representative-form").remove();
            }
        }

        if (accType.value == 'employee' && fillEmployee.checked == true){
            $("#pupil-form").remove();
        }
    });
*/
});

