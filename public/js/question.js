var select_options_count = 2, connect_options_count = 2;

// on click to add question -> open modal
$("#add_question_to_test").on('click',function(){
    $("#add_question_modal").css('display', 'flex');
});

// modal button create -> submit form // TODO
$("#add_question_modal_create").on('click',function(){
    $("#add_question_modal").css('display', 'none');
})

// modal button cancel
$("#add_question_modal_cancel").on('click',function(){
    $("#add_question_modal").css('display', 'none');
})



// generate question based on select
$("#select_questionType").on('change', function() {
    let id = $(this).attr('id');

    if (this.value == "textQuestion"){
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
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="text_question">
            Znenie otazky:<br>
            <input name="question_text" type="text"><br>
            Odpoveď:
            <input name="question_answer" type="text">
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);
}

function createSelectQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="select_question">
            <input type="hidden" name="number_of_options" value="` + select_options_count + `">
            Znenie otazky:<br>
            <input name="question_text" type="text"><br>
            <button type="button" id="button_select_add_option" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Zadajte možnosti:
            <div id="select_question_options" class="flex flex-col">
                <input type="text" name="option_0">
                <input type="text" name="option_1">
            </div>


            Správna odpoveď:
            <input type="number">
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);


// add option on click
    $("#button_select_add_option").on('click',function(){
        $("#select_question_options").append('<input type="text" name="option_' + select_options_count +'">');
        select_options_count++;
    })
}

function createConnectQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="connect_question">
            <input type="hidden" name="number_of_options" value="` +connect_options_count +`">
            Znenie otazky:<br>
            <input name="question_text" type="text"><br>
            <button type="button" id="button_connect_add_option" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Páry otaázok:<br>
            <div id="connect_question_options" class="flex flex-col">
                Ľavá strana: <input type="text" name="option_0_left"> Pravá strana: <input type="text" name="option_0_right"><hr>
                Ľavá strana: <input type="text" name="option_1_left"> Pravá strana: <input type="text" name="option_1_right"><hr>
            </div>

        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);

// add option on click
    $("#button_connect_add_option").on('click',function(){
        $("#connect_question_options").append('Ľavá strana: <input type="text" name="option_' + connect_options_count +'_left"> Pravá strana: <input type="text" name="option_' + connect_options_count +'_right"><hr>');
        connect_options_count++;
    })
}

function createImageQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="image_question"><br>
            Znenie otazky:<br>
            <input name="question_text" type="text"><br>
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);
}

function createFormulaQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="formula_question"><br>
            Znenie otazky:<br>
            <input name="question_text" type="text"><br>
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);
}
