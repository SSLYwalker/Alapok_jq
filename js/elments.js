function Tag(parent, tagname, attributes){
	this.parent = parent;
	this.tagname = tagname;
	this.attributes = attributes;
		
	if(typeof(attributes.id)=== 'undefined' || attributes.id === ''){
		this.attributes.id = attributes.id = tagname.toLowerCase();
	}

	this.parentId = this.setId();	
	return this.show();
}


Tag.prototype.setId = function(){
	var thispoi = this;
	var parent = $(thispoi.parent);
	var parentId = parent.attr('id');
	
	if(typeof(parentId)=== 'undefined' || parentId === ''){
		parentId = parent.prop('tagName').toLowerCase();
	}

	thispoi.attributes.id = parentId + '_' + thispoi.attributes.id;
	return parentId;
};


Tag.prototype.show = function(){
	var thispoi = this;
	return $('<' + thispoi.tagname + ' />', thispoi.attributes).appendTo(thispoi.parent);
};