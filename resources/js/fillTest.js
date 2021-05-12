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
    
    for (e in els) {
        var id = '#' + els[e].id;
        var s = new Sketchpad({
            element: id,
            width: 400,
            height: 400
          });
        sketchs.push(s)
    }

    
    
    
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

 window.undoSketch = function(id) {
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
    
}

$('.equation').on('input',function(ev) {
    $(this).parent().find('input').val(ev.target.value);
    //todo - aky format outputu chceme: .value je .getValue() bez argumentu - https://cortexjs.io/mathlive/guides/interacting/ 
    // console.log($(this).parent().find('input').value);
});

$('.sketchpad').on('mouseout', function() {
    $(this).parent().find('input').val($(this)[0].toDataURL());
});



 /*function getPosition(mouseEvent, sigCanvas) {
    var x, y;
    if (mouseEvent.pageX != undefined && mouseEvent.pageY != undefined) {
       x = mouseEvent.pageX;
       y = mouseEvent.pageY;
    } else {
       x = mouseEvent.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
       y = mouseEvent.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return { X: x - sigCanvas.offsetLeft, Y: y - sigCanvas.offsetTop };
 }

 function initialize() {
    var sigCanvas = document.getElementById("canvasSignature");
    if(typeof(sigCanvas) != 'undefined' && sigCanvas != null){
        var context = sigCanvas.getContext("2d");
            context.strokeStyle = 'Black';
            var is_touch_device = 'ontouchstart' in document.documentElement;

            if (is_touch_device) {
            var drawer = {
                isDrawing: false,
                touchstart: function (coors) {
                    context.beginPath();
                    context.moveTo(coors.x, coors.y);
                    this.isDrawing = true;
                },
                touchmove: function (coors) {
                    if (this.isDrawing) {
                        context.lineTo(coors.x, coors.y);
                        context.stroke();
                    }
                },
                touchend: function (coors) {
                    if (this.isDrawing) {
                        this.touchmove(coors);
                        this.isDrawing = false;
                    }
                }
            };
            function draw(event) {
                var coors = {
                    x: event.targetTouches[0].pageX,
                    y: event.targetTouches[0].pageY
                };
                var obj = sigCanvas;

                if (obj.offsetParent) {
                    do {
                        coors.x -= obj.offsetLeft;
                        coors.y -= obj.offsetTop;
                    }
                    while ((obj = obj.offsetParent) != null);
                }
                drawer[event.type](coors);
            }
            sigCanvas.addEventListener('touchstart', draw, false);
            sigCanvas.addEventListener('touchmove', draw, false);
            sigCanvas.addEventListener('touchend', draw, false);
            sigCanvas.addEventListener('touchmove', function (event) {
                event.preventDefault();
            }, false); 
            }
            else {
            $("#canvasSignature").mousedown(function (mouseEvent) {
                var position = getPosition(mouseEvent, sigCanvas);

                context.moveTo(position.X, position.Y);
                context.beginPath();
                $(this).mousemove(function (mouseEvent) {
                    drawLine(mouseEvent, sigCanvas, context);
                }).mouseup(function (mouseEvent) {
                    finishDrawing(mouseEvent, sigCanvas, context);
                }).mouseout(function (mouseEvent) {
                    finishDrawing(mouseEvent, sigCanvas, context);
                });
            });

            }
    } else{
        return;
    }
    
 }
 function drawLine(mouseEvent, sigCanvas, context) {

    var position = getPosition(mouseEvent, sigCanvas);

    context.lineTo(position.X, position.Y);
    context.stroke();
 }
 function finishDrawing(mouseEvent, sigCanvas, context) {
    drawLine(mouseEvent, sigCanvas, context);

    context.closePath();
    $(sigCanvas).unbind("mousemove")
                .unbind("mouseup")
                .unbind("mouseout");
 }

 window.logconsole = function() {
     var el = document.getElementById('equation_question_1');
     console.log(el);
 }*/