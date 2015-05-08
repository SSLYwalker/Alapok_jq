// Global variables
var nav;
var gombok = [];





// Functions

function init(){
	var attrs = {
		title : 'Navigátor',
		//id : 'menu'
		class :'menu'
	};
	nav = new Tag('#container', 'nav', attrs);
	
	attrs = [{
			title : 'Első gomb',
			id : 'elso',
			text : 'Első',
			class : 'nav-button'
		},
		{
			title : 'Második gomb',
			id : 'masodik',
			text : 'Második',
			class : 'nav-button'
		},
		{
			title : 'Harmadik gomb',
			id : 'harmadik',
			text : 'Harmadik',
			class : 'nav-button'
		}			
	];
/*	
	for(var i = 0; i < attrs.length; i++){
		gombok[i]= new Tag('nav', 'button', attrs[i]);	
		gombok[i].button();
	}
*/	
	for(v in attrs){
		gombok[v] =  new Tag('nav', 'button', attrs[v]);
		gombok[v].button();
	}
	
	
	 
}



$(function(){
	init();
	//alert(nav.attr('id'));
});