// Global variables
var nav;
/*Menu*/
var menu_gomb;
var menu;
var beallitasok_menu;
var beallitasok_almenu;
var adatbazis_beallitasok;
var nyelvi_beallitasok;

var gombok = [];





// Functions

function init(){
	attrs = {
		'title' : 'Menü',
                'text' : 'Menü',
		'id' : 'menu_gomb',
		'class' :'menuclass'
                
        };
        menu_gomb = new Tag('#tarolo', 'button', attrs);
        var attrs = {
		'title' : 'Navigátor',
		'id' : 'navigator',
		'class' :'rejtettmenu',
                'data-statusz' : 'rejtett'
	};
        /*Tároló */
	nav = new Tag('#tarolo', 'nav', attrs);
        /*Tároló vége*/
        
        /*Menü*/
        var attrs ={
			'id' : 'menu',
			'class' : 'menu',
                        'data-id' : Math.floor(Math.random()*1000)
		};
                
        menu = new Tag('#' + nav.attr('id'), 'ul', attrs);        
        
        attrs = {
			'id' : 'menuBeallitasok',
			'text' : 'Beállítások',
			'class' : 'menu-item',
                        'data-id' : Math.floor(Math.random()*1000)
		};
        beallitasok_menu = new Tag('#'+menu.attr('id'), 'li', attrs);
        attrs = {
                        'title' : 'Beállítások',
			'id' : 'bealliatsokAlmenu',
			'class' : 'menu-item',
                        'data-id' : Math.floor(Math.random()*1000)
		};
        beallitasok_almenu = new Tag('#'+beallitasok_menu.attr('id'), 'ul', attrs);
        attrs = {
			'title' : 'Adatbázis beállítok',
			'id' : 'adatbazisBeallitasok',
			'text' : 'Adatbázis beállítások',
			'class' : 'menu-item',
                        'data-id' : Math.floor(Math.random()*1000)
		};
        adatbazis_beallitasok = new Tag('#'+beallitasok_almenu.attr('id'), 'li', attrs);
        attrs = {
			'title' : 'Nyelvi beállítok',
			'id' : 'nyelviBeallitasok',
			'text' : 'Nyelvi beállítok',
			'class' : 'menu-item',
                        'data-id' : Math.floor(Math.random()*1000)
		};
        nyelvi_beallitasok = new Tag('#'+beallitasok_almenu.attr('id'), 'li', attrs);
        /*Menü vége*/
	
	/*attrs = [{
			'title' : 'Első gomb',
			'id' : 'elso',
			'text' : 'Első',
			'class' : 'nav-button',
                        'data-id' : Math.floor(Math.random()*1000)
		},
		{
			'title' : 'Második gomb',
			'id' : 'masodik',
			'text' : 'Második',
			'class' : 'nav-button',
                        'data-id' : Math.floor(Math.random()*1000)
		},
		{
			'title' : 'Harmadik gomb',
			'id' : 'harmadik',
			'text' : 'Harmadik',
			'class' : 'nav-button',
                        'data-id' : Math.floor(Math.random()*1000)
		}			
	];
	
/*	for(var i = 0; i < attrs.length; i++){
		gombok[i]= new Tag('nav', 'button', attrs[i]);	
		gombok[i].button();
	}
*/	
        
/*	for(v in attrs){
		gombok[v] =  new Tag('nav', 'button', attrs[v]);
		gombok[v].button();
	}*/
    
        $('#'+menu.attr('id')).menu({
            
        });
        function menushow(){
            $('#'+nav.attr('id')).show()
                        .animate({width: "30%"}, 200, function(){
                            nav.attr('data-statusz', 'megjelenitett');
                        });
        }
        
        $('#'+nav.attr('id')).hide();
        $('#'+menu_gomb.attr('id')).on('click',function(){
            menushow();
        });
        /*$('#'+menu_gomb.attr('id')).on('click',function(){
            if(nav.attr('data-statusz') === 'rejtett'){
                $('#'+nav.attr('id')).show()
                        .animate({width: "30%"}, 200, function(){
                            nav.attr('data-statusz', 'megjelenitett');
                        });
            } else {
                $('#'+nav.attr('id')).animate({width: "0%"}, 200, function(){
                    $('#'+nav.attr('id')).hide();
                    nav.attr('data-statusz', 'rejtett');
                });
            }
        });*/
    }





$(function(){
	init();
});