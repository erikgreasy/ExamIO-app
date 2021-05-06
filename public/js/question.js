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
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
            Odpoveď:<br>
            <div class="mb-4">
                    <input placeholder="Odpoveď" name="question_answer"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text">
            </div>

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
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
            <button type="button" id="button_select_add_option" class="max-w-xs my-5  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Zadajte možnosti:
            <div id="select_question_options" class="flex flex-col">
                <div class="mb-4">
                    <input placeholder="Otázka" name="options[0]"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="text_question_text" type="text">
                </div>
                <div class="mb-4">
                    <input placeholder="Otázka" name="options[1]"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="text_question_text" type="text">
                </div>
            </div>


            Správna odpoveď:
            <div class="mb-4">
                <input placeholder="Otázka" name="correct_option"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);


// add option on click
    $("#button_select_add_option").on('click',function(){
        $("#select_question_options").append(`
        <div class="mb-4">
            <input placeholder="Možnosť ` + select_options_count +`" name="name="options[` + select_options_count +`]"
                class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="text_question_text" type="text">
        </div>`);
        select_options_count++;
    })
}

function createConnectQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="connect_question">
            <input type="hidden" name="number_of_options" value="` +connect_options_count +`">
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
            <button type="button" id="button_connect_add_option" class="max-w-xs my-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Páry otaázok:<br>
            <div id="connect_question_options" class="flex flex-col">
                <div class="flex flex-row">
                     <div class="mb-4">
                        <input placeholder="Otázka" name="options[0][left]"
                            class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="text_question_text" type="text">
                    </div>
                    <div class="mb-4 ml-4">
                        <input placeholder="Správna odpoveď" name="options[0][right]"
                            class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="text_question_text" type="text">
                    </div>
                </div>
                <div class="flex flex-row">
                     <div class="mb-4">
                        <input placeholder="Otázka" name="options[1][left]"
                            class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="text_question_text" type="text">
                    </div>
                    <div class="mb-4 ml-4">
                        <input placeholder="Správna odpoveď" name="options[1][right]"
                            class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="text_question_text" type="text">
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);

// add option on click
    $("#button_connect_add_option").on('click',function(){
        $("#connect_question_options").append(`
        <div class="flex flex-row">
             <div class="mb-4">
                <input placeholder="Otázka" name="options[` + connect_options_count +`][left]"
                    class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
            <div class="mb-4 ml-4">
                <input placeholder="Správna odpoveď" name="options[` + connect_options_count +`][right]"
                    class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
        </div>
        `);
        connect_options_count++;
    })
}

function createImageQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="image_question"><br>
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);
}

function createFormulaQuestion(id){
    $("#add_question_selected").html(`
        <div id="div_` + id[0] +`_question" class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="formula_question"><br>
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="text_question_text" type="text">
            </div>
        </div>
        <button type="submit" id="add_question_modal_create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať</button>
    `);
}
