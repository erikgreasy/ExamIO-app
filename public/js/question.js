

// on click to add question -> open modal 
$("#add_question_to_test").on('click',function(){
    $("#add_question_modal").css('display', 'flex');
});

// modal button create -> submit form // TODO
$("#add_question_modal_create").on('click',function(){
    $("#add_question_modal").remove();
})
// modal button cancel 
$("#add_question_modal_cancel").on('click',function(){
    $("#add_question_modal").css('display', 'none')
})




// generate question based on select
$("#select_questionType").on('change', function() {
    let id = $(this).attr('id');

    if (this.values == "textQuestion"){
        createTextQuestion(id)
    } else if (this.value == "selectQuestion") {
        createSelectQuestion(id);
    } else if (this.value == "connectQuestion") {
        createConnectQuestion(id);
    } else if (this.value == "imageQuestion") {
        createImageQuestion(id);
    } else if (this.value == "formulaQuestion") {
        createFormulaQuestion(id);
    }

});

function createTextQuestion(id){
    $("#add_question_modal").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            Znenie otázky: <input type="text"><br>
            Správna odpoveď: <input type="text">
        </div>
    `);
}

function createSelectQuestion(id){
    $("#add_question_modal").html("");
}

function createConnectQuestion(id){
    $("#add_question_modal").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            Páry otaázok:<br>

            Ľavá strana: <input type="text"> Pravá strana: <input type="text"><br>
            Ľavá strana: <input type="text"> Pravá strana: <input type="text"><br>
            Ľavá strana: <input type="text"> Pravá strana: <input type="text"><br>
        </div>
    `);
}

function createImageQuestion(id){
    $("#add_question_modal").html().text(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            Páry otaázok:<br>
            Znenie otázky: <input type="text"><br>
            Správna odpoveď: <input type="text">
        </div>
    `);
}

function createFormulaQuestion(id){
    $("#add_question_modal").html().text(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            Páry otaázok:<br>
            Znenie otázky: <input type="text"><br>
            Správna odpoveď: <input type="text">
        </div>
    `);
}