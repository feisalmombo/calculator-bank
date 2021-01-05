$('#bank').change(function() {
    var bankID = $(this).val();
    // console.log(bankID);
    alert('Hello world');
    if (bankID) {
        $.ajax({
            type: "GET",
            url: "/all/account/types/list/?bank_id=" + bankID,
            success: function(res) {
                if (res) {
                    // console.log(res);
                    $("#accountType").empty();
                    $("#accountType").append('<option>Select Type of Account</option>');
                    $.each(res, function(key, value) {
                        // console.log(value);
                        $("#accountType").append('<option value="' + key + '">' + value + '</option>');
                    });

                } else {
                    $("#accountType").empty();
                }
            }
        });
    } else {
        $("#accountType").empty();
        $("#currency").empty();
    }
});
$('#accountType').on('change', function() {
    var accountTypeID = $(this).val();
    console.log(accountTypeID);;
    if (accountTypeID) {
        $.ajax({
            type: "GET",
            url: "/all/currencies/list/?accountType_id=" + accountTypeID,
            success: function(res) {
                if (res) {
                    // console.log(res);
                    $("#currency").empty();
                    $("#currency").append('<option>Select Currecy</option>');
                    $.each(res, function(key, value) {
                        $("#currency").append('<option value="' + key + '">' + value + '</option>');
                    });

                } else {
                    $("#currency").empty();
                }
            }
        });
    } else {
        $("#currency").empty();
    }

});