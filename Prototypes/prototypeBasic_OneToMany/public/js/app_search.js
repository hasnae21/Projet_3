

$("#search").on("keyup", function () {
    $IdKey = $("#IdKey").val();

    $value = $(this).val();
    $.ajax({
        type: "get",
        url: "searchs",
        data: { key: $value, id: $IdKey },

        success: function (data) {
            $("#tbody").html(data);
        },
    });
});
