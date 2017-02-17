/**
 * Created by Yogev Heskia on 04/01/2017.
 */

$( document ).ready(function () {
    $(".hamburger").click(openNav);
    $(".sidenav .closebtn").click(closeNav);
    $(".btn-number").click(plusMinusBtn);
    $(".saveBtn").click(saveDrinkToFav);
});


/* Set the width of the side navigation to 250px */
function openNav() {
    $(".sidenav").slideToggle(300);
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    $(".sidenav").slideUp(300);
}


function saveDrinkToFav() {

    var idVal = $(this).data("id");

    console.log("called");

    $.ajax({
        type:"POST",
        url: "saveDrink.php",
        data: "id="+idVal,
        cache: true,
        success: function (data) {
            console.log(data);
            if(!data.localeCompare("1")) {
                $(".alert-warning").slideToggle(300);
                setTimeout(function () {
                    $(".alert-warning").slideUp(300);
                }, 3000)
            }else if (data.includes("Duplicate")){
                debugger;
                $(".alert,.alert-danger").slideToggle(300);
                setTimeout(function () {
                    $(".alert-danger").slideUp(300);
                }, 3000)
            }
        }
    })

}

/**
 * Setting the plus and minus btns in the customize form
 */
function plusMinusBtn() {
    var jumps=10, $btn = $(this) ,val ;
    var $inpObj = $("[name="+$btn.data("field")+"]");
    var maxValue = parseInt($inpObj.attr("max")),minValue = parseInt($inpObj.attr("min"));
    if($btn.data("type").localeCompare("plus")==0){
        val = parseInt($inpObj.val())
        if(val + jumps <= maxValue )
            $inpObj.val(val + jumps);
        addBlock($(this));
    }else{
        val = parseInt($inpObj.val())
        if(val - jumps >=  minValue )
            $inpObj.val(val - jumps);
    }

}

var $tubeContainer = null;
var newDiv = null;
function addBlock($btn) {
    if($(".tube").css("display") != "none"  ){
        if($tubeContainer == null) {
            $tubeContainer = $(".tube section");
        }
        newDiv = document.createElement("div");
        newDiv.style.backgroundColor = $("[name="+$btn.data("for")+"]").find(":selected").data("color");
        $tubeContainer.append(newDiv);

    }
}
