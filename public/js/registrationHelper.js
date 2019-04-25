// Move one page forward as long as current page is not "last"
$('#formNextPage').click(function(){
    if($(".formPage.current").attr("form-index") == "last")
        return;

    $(".progressbar > .active").last().next().toggleClass('active'); // sets next progressbar point to not active

    // Toggle current class to the next page
    var nextPage = $('.formPage.current').next();
    $('.formPage.current').toggleClass('current'); // Do not change order of this line and line under. Will breake
    nextPage.toggleClass('current');
});



// Move one page forward as long as current page is not "0"
$('#formPrevPage').click(function(){
    if($(".formPage.current").attr("form-index") == "0")
        return;

    $(".progressbar > .active").last().toggleClass('active'); // sets last progressbar point to active

    // Toggle current class to the last page
    var prevPage = $('.formPage.current').prev();
    $('.formPage.current').toggleClass('current'); // Do not change order of this line and line under. Will breake
    prevPage.toggleClass('current');
});



// Detects a key change on input element with an id and calls CheckInputsEqual function
$('#firstName').keyup(CheckInputsEqual); // Change to first email id
$('#lastName').keyup(CheckInputsEqual); // change to second email id

// Checks if two input elements have the same value. If not, a btn will be disabled
function CheckInputsEqual(){
    var email = $('#firstName').val(); // Change to first email id
    var repeatEmail = $('#lastName').val(); // change to second email id

    if(email == repeatEmail){
        $('#formNextPage').removeAttr('disabled');
        console.log("Enabling btn");
    }
    else{
        $('#formNextPage').attr('disabled', true);
        console.log("Disabling btn");
    }
}