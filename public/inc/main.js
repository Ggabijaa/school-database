$(document).ready(function(){
    let elementCount = 0

    function handler() {
        $(this).parent().remove();
    }

    $(".append-btn").click(function(){
        let id = 'testukas-' + elementCount;
        elementCount++;
        $("#append").clone().appendTo(".append-copy").removeAttr("id").attr('copy', id);
        $("[copy="+id+"]").append(function () {
            return $('<button type="button" name="add" class="btn btn-danger remove-btn">Remove</button>').click(handler);
        })
    });
});