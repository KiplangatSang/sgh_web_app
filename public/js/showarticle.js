function notifyDeleteform(id) {
    swal(
        {
            title: "Delete Post",
            text: "You are about to permanently delete this post,\n Are you sure?.",
            showCancelButton: true,
            confirmButtonText: "Confirm, Submit!",
            cancelButtonText: "No, Cancel !",
            closeOnConfirm: false,
            closeOnCancel: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                var form_route = id;
                var form_action = "/user/post/delete/";
                document.getElementById("postForm").action =
                    form_action + form_route;
                document.getElementById("postForm").submit();

                swal("Success!", "The post has been deleted.", "success");
            } else {
                swal("Cancelled", "Request Canceled :)", "error");
            }
        }
    );
}

function showDiv() {
    const el = document.getElementById("comment-cont");

    const hiddenDiv = document.getElementById("hidden-div");
    el.addEventListener("mouseover", function handleMouseOver() {
        hiddenDiv.style.visibility = "visible";
    });

    el.addEventListener("mouseout", function handleMouseOut() {
        hiddenDiv.style.visibility = "hidden";
    });
}
