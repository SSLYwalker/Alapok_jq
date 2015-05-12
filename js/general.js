// Global variables
var nav;
var gombok = [];





// Functions

function init(){
	var attrs = {
		title : 'Navigátor',
		id : 'menu',
		class :'menuclass'
	};
        /*Tároló div*/
	nav = new Tag('#container', 'nav', attrs);
        /*Tároló div vége*/
        
        /*Menü*/
        
        /*Menü vége*/
	
	attrs = [{
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
        
	for(v in attrs){
		gombok[v] =  new Tag('nav', 'button', attrs[v]);
		gombok[v].button();
	}
	
	$('.nav-button').on('click', function (e){
            alert($(this).attr('data-id'));
        });

}



$(function(){
	init();
	//alert(nav.attr('id'));
});