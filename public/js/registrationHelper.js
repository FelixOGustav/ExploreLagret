// Move one page forward as long as current page is not "last"
$('#formNextPage').click(function(){
    if($(".formPage.current").attr("form-index") == "last")
        return;
/*
    var allInputsForCurrentPage = $('formPage.current input');
        allInputsForCurrentPage.forEach(selected => {
            if(selected.val().length() <= 0){
                console.log("found an invalid input")
                selected.css("border-color", "red");
                alert("du har inte fyllt i rätt!");
                return;
            }
        }
    ); 
*/
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
$('#email').keyup(CheckInputsEqual); // Change to first email id
$('#emailConfirm').keyup(CheckInputsEqual); // change to second email id

// Checks if two input elements have the same value. If not, a btn will be disabled
function CheckInputsEqual(){
    var email = $('#email').val(); // Change to first email id
    var repeatEmail = $('#emailConfirm').val(); // change to second email id

    if(email == repeatEmail){
        $('#formNextPage').removeAttr('disabled');
        console.log("Enabling btn");
    }
    else{
        $('#formNextPage').attr('disabled', true);
        console.log("Disabling btn");
    }
}

// Detects a key change on input element with an id and calls CheckInputsEqual function
$('#emailAdvocate').keyup(CheckInputsEqualAdvocate); // Change to first email id
$('#emailAdvocateConfirm').keyup(CheckInputsEqualAdvocate); // change to second email id

// Checks if two input elements have the same value. If not, a btn will be disabled
function CheckInputsEqualAdvocate(){
    var email = $('#emailAdvocate').val(); // Change to first email id
    var repeatEmail = $('#emailAdvocateConfirm').val(); // change to second email id

    if(email == repeatEmail){
        $('#formNextPage').removeAttr('disabled');
        console.log("Enabling btn");
    }
    else{
        $('#formNextPage').attr('disabled', true);
        console.log("Disabling btn");
    }
}

// Set border color to white on key up on any input in current form page
$('.formPage.current input').keyup(function(){
    $(this).css("border-color", "#fff");
});