/**
 * Created by Дмитрий on 21.03.2017.
 */


var lol = $('.input1, .input2');
var input1 =$('.input1');
var input2 =$('.input2');

function onlyNumb() {


    lol.bind("change keyup input click", function () {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    var type = $(".type_of_window").val();

    switch (type) {
        case "type_1.csv":
            lol.val(500);
            break;
        case "type_2.csv":
            lol.val(600);
            break;
        case "type_3.csv":
        case "type_4.csv":
            input1.val(600);
            input2.val(800);
            break;
        case "type_5.csv":
            input1.val(1800);
            input2.val(700);
            break;
        case "type_6.csv":
            input1.val(1800);
            input2.val(1000);
            break;
    }

}


function input1MinMax() {
    var val = input1.val();

    switch (type) {
        case "type_1.csv":
            if (val > 2300 && val < 500)
                input1.val(500);
            break;
        case "type_2.csv":
        case "type_3.csv":
        case "type_4.csv":
            if (val > 1900 && val < 600)

                input1.val(600);
            break;
        case "type_5.csv":
        case "type_6.csv":
            if (val > 2500 && val < 1800)
                input1.val(1800);
            break;
    }
}

function inptut2MinMax() {
    var val2 = input2.val();

    switch (type) {
        case "type_1.csv":
            if (val2 > 1800 && val2 < 500)
                input2.val(500);
            break;
        case "type_2.csv":
            if (val2 > 1600 && val2 < 600)
                input2.val(600);
            break;
        case "type_3.csv":
            if (val2 > 3000 && val2 < 800)
                input2.val(800);
            break;
        case "type_4.csv":
            if (val2 > 2600 && val2 < 800)

                input2.val(800);
            break;
        case "type_5.csv":
            if (val2 > 1200 && val2 < 700)
                input2.val(700);
            break;
        case "type_6.csv":
            if (val2 > 2500 && val2 < 1000)
                input2.val(1000);
            break;
    }
}



        var msg = $('.form').serialize();
        $.ajax({
            url: 'calculator.php',
            data: msg,
            success: function (data) {
                $('.results').html(data);
            }
        });

