/** Ez az tag osztálydefiníciója*/

/**
 * @Brief Általános html elem létrehozó
 * @param {type} parent
 * @param {type} tagtype
 * @param {type} attributes
 * @returns {Tag}
 */
function Tag(parent, tagtype, attributes){
    this.parent = parent;
    this.tagtype = tagtype;
    this.attributes = attributes;
    this.jqid = this.setJqId();
    //this.id = (parent.charAt(0) == '#') ? parent.substring(1,parent.length) : parent;
    
    this.id = (parent.charAt(0) == '#') ? parent.substring(1,parent.length) + 
            '_' + this.id : parent + '_' + this.id;
    alert('this id:' + this.id);
    this.attributes.id = this.id;
    return this;
}

Tag.prototype.setJqId = function(){
    var retval = this.id = this.tagtype;
    if(typeof(this.attributes['id']) !== 'undefined' && this.attributes['id'] !== ''){
        retval = this.jqid = '#' + this.attributes['id'];
        this.id = this.attributes['id'];
    }
    alert('setjqid: ' + this.jqid);
    return retval;
};

/**
 *
 * @Brief Megjeleníti az adott html elemet
 */
Tag.prototype.show = function(){
    var thispoi = this;
    alert('thispoiparent: ' + thispoi.parent);
    var tag = $("<" + thispoi.tagtype + "/>", thispoi.attributes).appendTo(thispoi.parent);
};

/**
 * @Brief Kiegészíti a html elem osztályát
 * @param {type} value
  */
Tag.prototype.setClass = function(value){
    var currentClass = this.class;
    
    currentClass += ' ' + value;
    this.class = currentClass;
};


Tag.prototype.setText = function(value){
   this.text = value;
};

/** Ez a form osztálydefiníciója*/
/**
 * 
 * @param {type} parent
 * @param {type} attributes
 * @returns {undefined}
 */
function Form(parent, attributes){
    Tag.call(this, parent, 'form', attributes);
    this.fields = new Array();
}

Form.prototype = Object.create(Tag.prototype);

Form.prototype.addField = function(attributes){
    var thispoi = this;
    var local_attributes = new Object({
        'id': attributes['id'],
        'data-id' : thispoi.fields.length
    });
    var field_container = $('<div />', local_attributes).appendTo(thispoi.jqid);
    local_attributes = new Object({
        'title': attributes['title'],
        'for':  attributes['id'],
        'class': attributes['class'],
        'text': attributes['text']
    });
    var label = $('<label />' , local_attributes).appendTo(field_container);
    local_attributes = new Object({
        'title': attributes['title'],
        'type': attributes['type'],
        'class': attributes['class'],
        'name': attributes['name'],
        'id': attributes['id'],
        'value': attributes['value']
    });
    var input = $('<input />' , local_attributes).appendTo(field_container);
    local_attributes = new Object({
        'title': attributes['title'],
        'class': attributes['class'],
        'name': attributes['name'] + '_notification',
        'id': attributes['id'] + '_notification_id',
        'text': 'izé'
    });
    var notificationarea = $('<div />' , local_attributes).appendTo(field_container);
    /*thispoi.fields[thispoi.fields.length] = new Object({
        'label' : label,
        'input' : input,
        'notificationarea' : notificationarea
    });*/
    thispoi.fields.push(field_container);
};