var focim;

$(function (){
    init();
});

function init(){
    var attr = new Object({
       'title': 'Ez a főcím szöveg jq',
       'text': 'Ez a főcím jq',
       'class': 'red'
    });
    
    focim = new Tag('#container', 'h1', attr);
    focim.show();
    
    attr = new Object({
       'title': 'Ez a főcím paragrafus szöveg jq',
       'text': 'Ez a főcím paragrafus jq',
       'class': 'red'
    });
    bekezdes = new Tag(focim.jqid, 'p', attr);
    bekezdes.show();
    
    attr = new Object({
       'title': 'elso form',
       'method': 'POST',
       'action': 'http://localhost/alapok_jq/formsubmit.php'
    });
    elsoform = new Form('#container', attr);
    elsoform.show();
    attr = new Object({
       'name': 'username',
       'id': 'username',
       'class': 'green',
       'type': 'text',
       'text': 'Felhasználónév: '
    });
    elsoform.addField(attr);
    attr = new Object({
       'name': 'age',
       'id': 'age',
       'class': 'green',
       'type': 'text',
       'text': 'Életkor: '
    });
    elsoform.addField(attr);
    attr = new Object({
       'name': 'address',
       'id': 'address',
       'class': 'green',
       'type': 'text',
       'text': 'Cím: ',
       'value' : 'Budapest'
    });
    elsoform.addField(attr);
    attr = new Object({
       'name': 'password',
       'id': 'password',
       'class': 'green',
       'type': 'password',
       'text': 'Jelsző: '
    });
    elsoform.addField(attr);
    
    //alert(elsoform.fields[2]['label']);
    var s = '';
    var mit = 'input';
    for (v in elsoform.fields[2].children(mit)){
        s += v + ' - ' + elsoform.fields[2].children(mit)[v];
    }
    alert(s);
    alert(elsoform.fields[2].children(mit).val());
}