// Move one page forward as long as current page is not "last"
$('#formNextPage').on('click', function(){
    if($(".formPage.current").attr("form-index") == "last"){
        if(!$("#terms").attr("checked")){
            $('#termsSlider').css("background-color", "red");
        }
        return;    
    }
        
        var foundFaults = false;
        var allInputsForCurrentPage = $('.formPage.current input, .formPage.current select');
        allInputsForCurrentPage.each(function() {
            if($(this).val().length <= 0 && $(this).attr("required")){
                $(this).css("border-color", "red");
                foundFaults = true;
            } 
        }
        ); 
        
    if(foundFaults)
        return;
        
    $(".progressbar > .active").last().next().toggleClass('active'); // sets next progressbar point to not active

    // Toggle current class to the next page
    var nextPage = $('.formPage.current').next();
    $('.formPage.current').toggleClass('current'); // Do not change order of this line and line under. Will breake
    nextPage.toggleClass('current');

    // When on last page, set next btn to submit
    if($(".formPage.current").attr("form-index") == "last"){
        $('#formNextPage').text("Skicka in");
        $('#formNextPage').attr('type', 'submit');
    }
    // Displays the previus page btn if not on the first page
    else if($(".formPage.current").attr("form-index") > "0"){
        $('#formPrevPage').css('display', "inherit");
    }    
    event.preventDefault()
});



// Move one page forward as long as current page is not "0"
$('#formPrevPage').on('click', function(){
    if($(".formPage.current").attr("form-index") == "0")
        return;

    $(".progressbar > .active").last().toggleClass('active'); // sets last progressbar point to active

    // Toggle current class to the last page
    var prevPage = $('.formPage.current').prev();
    $('.formPage.current').toggleClass('current'); // Do not change order of this line and line under. Will breake
    prevPage.toggleClass('current');

    // When not on last page, set next btn to next
    if($(".formPage.current").attr("form-index") != "last"){
        $('#formNextPage').text("Nästa");
        $('#formNextPage').attr('type', 'next');
    }
    // Hides the previus page btn if on the first page
    else if($(".formPage.current").attr("form-index") == "0"){
        $('#formPrevPage').css("display","none");
    }

    event.preventDefault()
});


// Set border color to white on key up on any input in current form page
//$('.formPage.current input').on("keyup", function(){
//    console.log("UP!");
//    $(this).css("border-color", "#fff");
//});

// Set border color to white on change on any select in current form page
$('input, select').on('change', function(){
    if($(this).val().length > 0) {
        $(this).css("border-color", "#fff");
    } else {
        $(this).css("border-color", "red");
    }
}); 

$("#terms").on('change', function() {
    if($(this).checked) {        
        $('#termsSlider').css("background-color", "#ccc");
    }
});

// Check validity of personnummer.
$('#socialSecurityNumber').on('keyup', function(){
    var valid = isValidSwedishSSN($('#socialSecurityNumber').val());
    if(valid){
        $('#socialSecurityNumber').css('border', 'inherit');
    }
    else {
        $('#socialSecurityNumber').css('border', '2px solid red');
    }
})

// Personnummer checksum
function isValidSwedishSSN(ssn) {
    ssn = ssn
        .replace(/\D/g, "")     // strip out all but digits
        .split("")              // convert string to array
        .reverse()              // reverse order for Luhn
        .slice(0, 10);          // keep only 10 digits (i.e. 1977 becomes 77)

    // verify we got 10 digits, otherwise it is invalid
    if (ssn.length != 10) {
        return false;
    }

    var sum = ssn
        // convert to number
        .map(function(n) {
            return Number(n);
        })
        // perform arithmetic and return sum
        .reduce(function(previous, current, index) {
            // multiply every other number with two
            if (index % 2) current *= 2;
            // if larger than 10 get sum of individual digits (also n-9)
            if (current > 9) current -= 9;
            // sum it up
            return previous + current;
        });

    // sum must be divisible by 10
    return 0 === sum % 10;
};