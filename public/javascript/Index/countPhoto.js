$("#refresh").on("click", function () {
    // console.log('click')
    $.ajax({
        url: "/index/getCountPhoto",
        success: function (response, result) {
            // console.log(response);
            // console.log(result);
            if (result === 'success') {
                if (result) {
                    $("#countPhoto").text(response);
                } else {
                    alert("Ooops! Something's off. Please, try again!");
                }
            }
        },
        // error: alert("Server messed up something. Please, try again later!"),
    });
});