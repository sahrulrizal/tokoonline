var my_skins = ['skin-blue', 'skin-black', 'skin-red', 'skin-yellow', 'skin-purple', 'skin-green'];
$(function() {
    /* For demo purposes */
    var demo = $('<div />').css({
        position: 'fixed',
        top: '3px',
        right: '0',
        background: '#fff',
        "border-radius": '5px 0 0 5px',
        padding: '10px 15px',
        "font-size": '16px',
        "z-index": '99999',
        cursor: 'pointer',
        color: '#3c8dbc',
        "box-shadow": '0 1px 3px rgba(0,0,0,0.1)'
    }).html('<i class="fa fa-gear"></i>').addClass('no-print');

    var demoSettings = $("<div />").css({
        "padding": "10px",
        position: "fixed",
        top: "3px",
        right: "-250px",
        background: "#fff",
        border: "0 solid #ddd",
        "width": "250px",
        "z-index": "99999",
        "box-shadow": "0 1px 3px rgba(0,0,0,0.1)"
    }).addClass("no-print");
    demoSettings.append(
        "<h4 class='text-light-blue' style='margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;'>Layout Options</h4>"
        //Fixed layout
        + "<div class='form-group'>"
        + "<div class='checkbox'>"
        + "<label>"
        + "<input type='checkbox' onchange='change_layout(\"fixed\");'/> "
        + "Fixed layout"
        + "</label>"
        + "</div>"
        + "</div>"
        //Boxed layout
        + "<div class='form-group'>"
        + "<div class='checkbox'>"
        + "<label>"
        + "<input type='checkbox' onchange='change_layout(\"layout-boxed\");'/> "
        + "Boxed Layout"
        + "</label>"
        + "</div>"
        + "</div>"
        //Sidebar Collapse
        + "<div class='form-group'>"
        + "<div class='checkbox'>"
        + "<label>"
        + "<input type='checkbox' onchange='change_layout(\"sidebar-collapse\");'/> "
        + "Collapsed Sidebar"
        + "</label>"
        + "</div>"
        + "</div>"
    );
    var skinsList = $("<ul />", { "class": 'list-unstyled' });
    var skinBlue =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-blue\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div><span style='display:block; width: 20%; float: left; height: 10px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin Blue</p>"
                + "</a>");
    skinsList.append(skinBlue);
    var skinBlack =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-black\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 10px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 10px; background: #fefefe;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin White</p>"
                + "</a>");
    skinsList.append(skinBlack);
    var skinPurple =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-purple\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin Purple</p>"
                + "</a>");
    skinsList.append(skinPurple);
    var skinGreen =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-green\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin Green</p>"
                + "</a>");
    skinsList.append(skinGreen);
    var skinRed =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-red\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin Red</p>"
                + "</a>");
    skinsList.append(skinRed);
    var skinYellow =
        $("<li />", { style: "float:left; width: 50%; padding: 5px;" })
            .append("<a class=\"theme-changer\" href='javascript:void(0);' onclick='change_skin(\"skin-yellow\")' style='display: block; box-shadow: -1px 1px 2px rgba(0,0,0,0.0);' class='clearfix full-opacity-hover'>"
                + "<div><span style='display:block; width: 20%; float: left; height: 10px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 10px;'></span></div>"
                + "<div><span style='display:block; width: 20%; float: left; height: 40px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;'></span></div>"
                + "<p class='text-center'>Skin Yellow</p>"
                + "</a>");
    skinsList.append(skinYellow);

    demoSettings.append("<h4 class='text-light-blue' style='margin: 0 0 5px 0; border-bottom: 1px solid #ddd; padding-bottom: 15px;'>Skins</h4>");
    demoSettings.append(skinsList);

    demo.click(function() {
        if (!$(this).hasClass("open")) {
            $(this).animate({ "right": "250px" });
            demoSettings.animate({ "right": "0" });
            $(this).addClass("open");
            
        } else {
            $(this).animate({ "right": "0" });
            demoSettings.animate({ "right": "-250px" });
            $(this).removeClass("open");
        }
    });

    $("body").append(demo);
    $("body").append(demoSettings);

    setup();
});

function change_layout(cls) {
    $("body").toggleClass(cls);
    $.AdminLTE.layout.fixSidebar();
}
function change_skin(cls) {
    $.each(my_skins, function (i) {
        $("body").removeClass(my_skins[i]);
    });

    $("body").addClass(cls);
    store('skin', cls);
    return false;
}
function store(name, val) {
    if (typeof (Storage) !== "undefined") {
        localStorage.setItem(name, val);
    } else {
        alert('Please use a modern browser to properly view this site!');
    }
}
function get(name) {
    if (typeof (Storage) !== "undefined") {
        return localStorage.getItem(name);
    } else {
        alert('Please use a modern browser to properly view this site!');
    }
}

function setup() {
    var tmp = get('skin');
    if (tmp && $.inArray(tmp, my_skins))
        change_skin(tmp);
}