window.fileOrInput = function (id) {
    var stringId = String(id);
    if (stringId.includes("drw")){
        var hideEl = '#file_selected' + stringId.substr(3,stringId.length - 1);
        $(hideEl).css("display", "none");
        var showEl = '#draw_selected' + stringId.substr(3,stringId.length - 1);
        $(showEl).css("display", "block");
    } else {
        var hideEl = '#draw_selected' + stringId.substr(3,stringId.length - 1);
        $(hideEl).css("display", "none");
        var showEl = '#file_selected' + stringId.substr(3,stringId.length - 1);
        $(showEl).css("display", "block");
    }
    
}

var sketchs = [];

$(document).ready(function () {
    var els = document.getElementsByClassName('sketchpad');
    
    for (e =0; e < els.length; e++) {
        var id = '#' + els[e].id;
        var s = new Sketchpad({
            element: id,
            width: 400,
            height: 400
          });
        sketchs.push(s)
    }

    var seconds = 0;
    interval = setInterval(function(){
        document.getElementById("timer").innerHTML =seconds + " seconds";
        seconds++;  
    },1000);
    document.getElementById('timer').innerHTML = "uhorky";
    console.log("axaxa");
    
    
 });

$(".drop").droppable({
    drop: function(event, ui) {
        $(".drop").val(ui.draggable.text())   ;
        var id = '#h' + this.id ;
        var s1 = String(ui.draggable[0].id);
        var s2 = s1.substring(1);
        $(id).val(s2) ;
    }
  });
  
  $(".drag").draggable();
    //initialize();

 /*window.undoSketch = function(id) {
    var stringId = String(id);
    var actionId = 'sketchpad' + stringId.substr(4,stringId.length - 1);
    var els = document.getElementsByClassName('sketchpad');
    for (e in els) {
        if (els[e].id === actionId){
            var sketchEdited = sketchs[e].undo();
            return;
        }
    };
    
}

window.redoSketch = function(id) {
    var stringId = String(id);
    var actionId = 'sketchpad' + stringId.substr(4,stringId.length - 1);
    var els = document.getElementsByClassName('sketchpad');
    for (e in els) {
        if (els[e].id === actionId){
            var sketchEdited = sketchs[e].redo();
            event = null;
            return;
        }
    };
    
}*/

$('.equation').on('input',function(ev) {
    $(this).parent().find('input').val(ev.target.value);
    //todo - aky format outputu chceme: .value je .getValue() bez argumentu - https://cortexjs.io/mathlive/guides/interacting/ 
    // console.log($(this).parent().find('input').value);
});

$('.sketchpad').on('mouseout', function() {
    $(this).parent().find('input').val($(this)[0].toDataURL());
});


