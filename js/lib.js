
function SetCookie(cname, cvalue, exdays,cpath) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/" + cpath;
}

function DeleteCookie(cName) {
    document.cookie = cName + "= ," + "; expires = Thu, 01 Jan 1997 00:00:00 UTC; path=/" ;
}

function DeleteCartProduct(cName) {
    DeleteCookie(cName);
    
    console.log(cName);
}


function GetCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function AddCartProductCookie(pName, pPrice, pQuantity, pSize) {
    var total = pQuantity*pPrice;
    var pValue = pPrice + "-" + pQuantity + "-" + pSize + "-" + total.toString();    
    console.log("setcookie");
    SetCookie(pName, pValue, 1, "");
}

function PrintProductsToCartTable() {
    var cookie = document.cookie;
    var productsList = cookie.split(';');
    console.log(document.cookie);

    for ( i = 0; i < productsList.length; ++i) {
        var nameValue = productsList[i].split('=');
        var name = nameValue[0];
        var value = nameValue[1].split("-");
        console.log(name);
        SetHTMLTag(name);
    }
}

function SetHTMLTag(className) {
    console.log("sethtml");
    var tag =  "<tr class=" + "\"" + className + "\"" + "><td class=\"product-remove\" onclick=\"\"><a title=\"Remove this item\" class=\"remove\"  href=\"#\" onclick=\"DeleteCartProduct(\'" + className +"\');window.location.reload();\">×</a> </td> <td class=\"product-thumbnail\"><a href=\"single-product.html\"><img width=\"145\" height=\"145\" alt=\"poster_1_up\" class=\"shop_thumbnail\" src=\"img/product-thumb-2.jpg\"></a></td><td class=\"product-name\"><a href=\"single-product.html\">" + className +"</a> </td><td class=\"product-price\"><span class=\"amount\">£15.00</span> </td><td class=\"product-quantity\"><div class=\"quantity buttons_added\"><input type=\"button\" class=\"minus\" value=\"-\"><input type=\"number\" size=\"4\" class=\"input-text qty text\" title=\"Qty\" value=\"1\" min=\"0\" step=0\"1\"><input type=\"button\" class=\"plus\" value=\"+\"></div></td><td class=\"product-subtotal\"><span class=\"amount\">£15.00</span></td></tr>";
    
    var html = document.getElementById("cart-list");
    //html.insertBefore(html, html.childNodes[0]);
    document.getElementById("cart-list").innerHTML += tag;
}



/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */


// Close the dropdown if the user clicks outside of it