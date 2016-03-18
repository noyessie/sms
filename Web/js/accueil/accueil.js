$('.scrollBottom').click(function () {
    $('html, body').animate({
        scrollTop: $(document).height()+200
    }, 1500);
    $("input[name=login]").focus();
    return false;
});

//s'il y a une erreur alors, la classe 'err' existe

if($('.err').length){
	$('html, body').animate({
        scrollTop: $(document).height()+200
    }, 1500);
    $("input[name=login]").focus();
}