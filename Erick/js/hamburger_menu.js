function ponerClase(comp, clase) {
    if(!$(comp).hasClass(clase))
        $(comp).addClass(clase);
}

function quitarClase(comp, clase) {
    if($(comp).hasClass(clase))
        $(comp).removeClass(clase);
}

function ocultar(comp) {
    ponerClase(comp,"visually-hidden");
}

function mostrar(comp) {
    quitarClase(comp,"visually-hidden");
}

function moverScroll(btn, idSection) {
    $(btn).click(function () {
        $("html, body").animate({
            scrollTop: $(idSection).offset().top - 100
        }, 300);
        if($("#collapseMenu").hasClass("show")){
            $("#collapseMenu").removeClass("show");
        }
    });
}

function tablaSaber(menu, conts) {
    $(menu).click(function () {
        if(menu == "#tabMenuSaber1"){
            mostrar(conts[0]);
            ocultar(conts[1]);
            ocultar(conts[2]);
            ocultar(conts[3]);
            ponerClase("#tabMenuSaber1","bg-white");
            ponerClase("#tabMenuSaber1","negrita");
            quitarClase("#tabMenuSaber2","bg-white");
            quitarClase("#tabMenuSaber3","bg-white");
            quitarClase("#tabMenuSaber4","bg-white");
            quitarClase("#tabMenuSaber2","negrita");
            quitarClase("#tabMenuSaber3","negrita");
            quitarClase("#tabMenuSaber4","negrita");
        }
        else if(menu == "#tabMenuSaber2"){
            ocultar(conts[0]);
            mostrar(conts[1]);
            ocultar(conts[2]);
            ocultar(conts[3]);
            quitarClase("#tabMenuSaber1","bg-white");
            ponerClase("#tabMenuSaber2","bg-white");
            ponerClase("#tabMenuSaber2","negrita");
            quitarClase("#tabMenuSaber3","bg-white");
            quitarClase("#tabMenuSaber4","bg-white");
            quitarClase("#tabMenuSaber1","negrita");
            quitarClase("#tabMenuSaber3","negrita");
            quitarClase("#tabMenuSaber4","negrita");
        }
        else if(menu == "#tabMenuSaber3"){
            ocultar(conts[0]);
            ocultar(conts[1]);
            mostrar(conts[2]);
            ocultar(conts[3]);
            quitarClase("#tabMenuSaber1","bg-white");
            quitarClase("#tabMenuSaber2","bg-white");
            ponerClase("#tabMenuSaber3","bg-white");
            ponerClase("#tabMenuSaber3","negrita");
            quitarClase("#tabMenuSaber4","bg-white");
            quitarClase("#tabMenuSaber2","negrita");
            quitarClase("#tabMenuSaber1","negrita");
            quitarClase("#tabMenuSaber4","negrita");
        }
        else if(menu == "#tabMenuSaber4"){
            ocultar(conts[0]);
            ocultar(conts[1]);
            ocultar(conts[2]);
            mostrar(conts[3]);
            quitarClase("#tabMenuSaber1","bg-white");
            quitarClase("#tabMenuSaber2","bg-white");
            quitarClase("#tabMenuSaber3","bg-white");
            ponerClase("#tabMenuSaber4","bg-white");
            ponerClase("#tabMenuSaber4","negrita");
            quitarClase("#tabMenuSaber2","negrita");
            quitarClase("#tabMenuSaber3","negrita");
            quitarClase("#tabMenuSaber1","negrita");
        }
    })
}

function reOrdenar() {
    if($(window).width() < 640){
        //MENU
        ocultar('#menuPC');
        mostrar("#menuMovil");
        if($("main").hasClass("espacio-header-pc")){
            $("main").removeClass("espacio-header-pc");
            $("main").addClass("espacio-header-movil");
        }
        //TAB CONTAINER
        mostrar("#tabla-movil");
        ocultar('#tabla-pc');
        //NOTICIERO
        ocultar('#noticiasPC');
        mostrar("#noticiasMovil");
        //EMPRENDIMIENTO
        ocultar('#negociosPC');
        mostrar("#negociosMovil");
    }
    else{
        //MENU
        ocultar("#menuMovil");
        mostrar("#menuPC");
        if($("main").hasClass("espacio-header-movil")){
            $("main").removeClass("espacio-header-movil");
            $("main").addClass("espacio-header-pc");
        }
        //TAB CONTAINER
        ocultar('#tabla-movil');
        mostrar("#tabla-pc");
        //NOTICIERO
        ocultar('#noticiasMovil');
        mostrar("#noticiasPC");
        //EMPRENDIMIENTO
        mostrar("#negociosPC");
        ocultar('#negociosMovil');
    }
}

//Modificar y hacer mas general.


document.getElementById("cuerpo").onresize = reOrdenar;
$(document).ready(reOrdenar());
$("#tabMenuSaber1").click(tablaSaber("#tabMenuSaber1", ["#tabContainerSaber1","#tabContainerSaber2","#tabContainerSaber3","#tabContainerSaber4",]));
$("#tabMenuSaber2").click(tablaSaber("#tabMenuSaber2", ["#tabContainerSaber1","#tabContainerSaber2","#tabContainerSaber3","#tabContainerSaber4",]));
$("#tabMenuSaber3").click(tablaSaber("#tabMenuSaber3", ["#tabContainerSaber1","#tabContainerSaber2","#tabContainerSaber3","#tabContainerSaber4",]));
$("#tabMenuSaber4").click(tablaSaber("#tabMenuSaber4", ["#tabContainerSaber1","#tabContainerSaber2","#tabContainerSaber3","#tabContainerSaber4",]));
$("#btnMenu1PC").click(moverScroll("#btnMenu1PC", "#inicio"));
$("#btnMenu2PC").click(moverScroll("#btnMenu2PC", "#saber"));
$("#btnMenu3PC").click(moverScroll("#btnMenu3PC", "#noticias"));
$("#btnMenu4PC").click(moverScroll("#btnMenu4PC", "#emprendimientos"));
$("#btnMenu1Movil").click(moverScroll("#btnMenu1Movil", "#inicio"));
$("#btnMenu2Movil").click(moverScroll("#btnMenu2Movil", "#saber"));
$("#btnMenu3Movil").click(moverScroll("#btnMenu3Movil", "#noticias"));
$("#btnMenu4Movil").click(moverScroll("#btnMenu4Movil", "#emprendimientos"));







