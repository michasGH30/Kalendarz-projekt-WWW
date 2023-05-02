$("#submit").on("click", function () {
    // let values = [];
    // let data_user = [];
    // let check = [];
    // $('input').each(function () {
    //     values.push($(this).val());
    //     data_user.push($(this).data());
    //     check.push($(this).is(":checked"));
    // });
    // console.log(values);
    // console.log(data_user);
    // console.log(check);

    let number = $("#number").val();
    let date = $("#date").val();

    let check = [];
    let data_i = [];
    $("input[type=checkbox]").each(function () {
        data_i.push($(this).attr("data-user"));
        check.push($(this).is(":checked"));
    });
    // console.log(number);
    // console.log(date);
    // console.log(data_i);
    // console.log(check);


    let data_post = { numberR: number, dateR: date, dataR: JSON.stringify(data_i), checked: JSON.stringify(check) };

    $.post("test_query.php", data_post,
        function (data) {
            console.log(data);
        }
    );
});