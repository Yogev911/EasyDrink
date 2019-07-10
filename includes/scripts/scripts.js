/**
 * Created by Yogev Heskia on 04/01/2017.
 */


$( document ).ready(function () {
    $(".hamburger").click(openNav);
    $(".sidenav .closebtn").click(closeNav);
    $(".btn-number").click(plusMinusBtn);
    $(".saveBtn").click(saveDrinkToFav);
    $(".deleteBtn").click(deleteCocktail);
    $(".saveMakeYourOwn").click(function () {
        saveMakeYourOwn();
        $('#myModal').modal('hide');
    });

    initContainer();
});


/**
 * Open up the sideNav
 */
function openNav() {
    $(".sidenav").slideToggle(300);
}

/**
 * Closing the sideNav
 */
function closeNav() {
    $(".sidenav").slideUp(300);
}

/**
 * using AJAX saving the drink to Favorites tbl
 */
function saveDrinkToFav() {

    var idVal = $(this).data("id");

    $.ajax({
        type:"POST",
        url: "saveDrink.php",
        data: "id="+idVal,
        cache: true,
        success: function (data) {
            if(!data.localeCompare("1")) {
                showSaveDialog()
            }else if (data.includes("error")){
                showDuplicateDialog()
            }
        }
    })

}

/**
 * using AJAX saving the drink to Favorites tbl using params
 */
function saveMakeYourOwn(){
    $.ajax({
        type:"POST",
        url: "saveDrink.php",
        data: $("#form").serialize(),
        cache: true,
        success: function (data) {
            if(!data.includes("error")) {
                $("#idHidden").val(data);
                showSaveDialog()
            }else {
                showDuplicateDialog();
            }
        }
    })

}

/**
 * Deleting cocktail from favorites
 */
function deleteCocktail() {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: "deleteFavorite.php",
        data: "id=" + id,
        cache: true,
        success: function (data) {
            if (!data.includes("error")) {
                showDeletedDialog();
                $("[data-id=" + id + "]").parentsUntil("li").parent().remove();
            }
        }
    })
}

/**
 * Showing user notification about Deleting an item
 */
function showDeletedDialog() {
    $(".alert-danger").slideToggle(300);
    setTimeout(function () {
        $(".alert-danger").slideUp(300);
    }, 3000)
}

/**
 * Showing user notification about Saving an item
 */
function showSaveDialog() {
    $(".alert-warning").slideToggle(300);
    setTimeout(function () {
        $(".alert-warning").slideUp(300);
    }, 3000)
}
function showDuplicateDialog() {
    $(".alert-danger").slideToggle(300);
    setTimeout(function () {
        $(".alert-danger").slideUp(300);
    }, 3000)
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

/**
 * init the MakeYourOwn MeasureCup
 */
function initContainer() {
    if($(".tube").css("display") != "none"  ) {
        var $inputs = $("input[type=number]");
        var times, i,j, size = $inputs.length;
        for(j = 0 ; j < size ; j++) {
            times = $inputs.eq(j).val() / 10;
            for (i = 0; i < times; i++) {
                addBlock($inputs.eq(j));
            }
        }
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
        if($btn.is("button")) {
            newDiv.style.backgroundColor = $("[name=" + $btn.data("for") + "]").find(":selected").data("color");
        }else {
            newDiv.style.backgroundColor = $("[name=" + $btn.data("for") + "]").find(":selected").data("color");
        }
        $tubeContainer.append(newDiv);

    }
}


function removeBlock($btn) {
    if($(".tube").css("display") != "none"  ){
        if($tubeContainer == null) {
            $tubeContainer = $(".tube section");
        }
        newDiv = document.createElement("div");
        if($btn.is("button")) {
            newDiv.style.backgroundColor = $("[name=" + $btn.data("for") + "]").find(":selected").data("color");
        }else {
            newDiv.style.backgroundColor = $("[name=" + $btn.data("for") + "]").find(":selected").data("color");
        }
        $tubeContainer.append(newDiv);

    }
}

