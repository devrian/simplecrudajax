$("#submit_comment").click(function(){
    var fill = $("#text_comment").val();

    $.ajax({
        method: "POST",
        url: "comment.php",
        data: {
            fill_comment: fill,
            type: "insert"
        },
        success: function(data) {
            if (data == "0") {
                swal("Login first!", "If you wanna comment the artice!", "error");
                $("#text_comment").val("");
            } else {
                swal("Thank You!", "Your comment has been created!", "success");
                $("#wrapper_comment").prepend(data);
                $("#text_comment").val("");
            }
        }
    })
});

$(document).on("click", ".delete", function(){
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "comment.php",
        data: {
            id_comment: id,
            type: "delete"
        },
        success: function(data) {
            if (data == "0") {
                swal("Login first!", "If you wanna comment the artice!", "error");
            } else if (data == "1") {
                swal("Thank You!", "Your comment has been deleted!", "success");
                $("#comment_" + id).fadeOut();
            }
        }
    })
});

$(document).on("click", ".comment_text", function(){
    var id = $(this).attr("data-id");
    var textbox = $(document.createElement("textarea")).attr({
        "id": "textarea_" + id,
        "class": "form-control",
        "placeholder": "Edit here...",
    });
    $(this).replaceWith(textbox);
});

$(document).on("click", ".edit", function(){
    var id   = $(this).attr("data-id");
    var fill = $("#textarea_" + id).val();
    var text = $(document.createElement("div")).attr({
        "id": "textarea_" + id,
        "class": "comment_text",
        "data-id": id
    }).text(fill);

    $.ajax({
        method: "POST",
        url: "comment.php",
        data: {
            fill_comment: fill,
            id_comment: id,
            type: "update"
        }, 
        success: function(data) {
            if (data == "0") {
                swal("Login first!", "If you wanna comment the artice!", "error");
            } else if (data == "1") {
                swal("Thank You!", "Your comment has been updated!", "success");
                $("#textarea_" +id).replaceWith(text)
            }
        }
    });
});
