$( document ).ready(function() {
    // default modal contains text question
    createTextQuestion();
});

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

    if (this.value == "textQuestion"){
        createTextQuestion();
    } else if (this.value == "selectQuestion") {
        createSelectQuestion();
    } else if (this.value == "connectQuestion") {
        createConnectQuestion();
    } else if (this.value == "imageQuestion") {
        createImageQuestion();
    } else if (this.value == "formulaQuestion") {
        createFormulaQuestion();
    }

});

function createTextQuestion(){
    $("#add_question_selected").html(`
        <div class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="text_question">

            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
            Odpoveď:<br>
            <div class="mb-4">
                    <input placeholder="Odpoveď" name="question_answer"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text">
            </div>

        </div>
    `);
}

function createSelectQuestion(){
    $("#add_question_selected").html(`
        <div class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="select_question">
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
            <button type="button" id="button_select_add_option" class="max-w-xs my-5  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Zadajte možnosti:
            <div id="select_question_options" class="flex flex-col">
                <div class="mb-4">
                    <input placeholder="Možnosť 1" name="options[0]"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text">
                </div>
                <div class="mb-4">
                    <input placeholder="Možnosť 2" name="options[1]"
                        class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text">
                </div>
            </div>


            Správna odpoveď:
            <div class="mb-4">
                <input placeholder="Poradie správnej odpovede" name="correct_option"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="number">
            </div>
        </div>
    `);


// add option on click
    $("#button_select_add_option").on('click',function(){
        $("#select_question_options").append(`
        <div class="mb-4">
            <input placeholder="Možnosť ` + (select_options_count+1) +`" name="options[` + select_options_count +`]"
                class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="text">
        </div>`);
        select_options_count++;
    })
}

function createConnectQuestion(){
    $("#add_question_selected").html(`
        <div class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="connect_question">
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
            <button type="button" id="button_connect_add_option" class="max-w-xs my-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pridať možnosť</button>

            Páry otaázok:<br>
            <div id="connect_question_options" class="flex flex-col">
                <div class="flex flex-row">
                     <div class="mb-4">
                        <input placeholder="Otázka" name="options[0][left]"
                            class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text">
                    </div>
                    <div class="mb-4 ml-4">
                        <input placeholder="Správna odpoveď" name="options[0][right]"
                            class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text">
                    </div>
                </div>
                <div class="flex flex-row">
                     <div class="mb-4">
                        <input placeholder="Otázka" name="options[1][left]"
                            class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text">
                    </div>
                    <div class="mb-4 ml-4">
                        <input placeholder="Správna odpoveď" name="options[1][right]"
                            class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text">
                    </div>
                </div>
            </div>

        </div>
    `);

// add option on click
    $("#button_connect_add_option").on('click',function(){
        $("#connect_question_options").append(`
        <div class="flex flex-row">
             <div class="mb-4">
                <input placeholder="Otázka" name="options[` + connect_options_count +`][left]"
                    class="shadow appearance-none  rounded w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
            <div class="mb-4 ml-4">
                <input placeholder="Správna odpoveď" name="options[` + connect_options_count +`][right]"
                    class="shadow appearance-none  rounded  w-50 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
        </div>
        `);
        connect_options_count++;
    })
}

function createImageQuestion(){
    $("#add_question_selected").html(`
        <div class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="image_question"><br>
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
        </div>
    `);
}

function createFormulaQuestion(){
    $("#add_question_selected").html(`
        <div class="my-5 flex flex-col">
            <input type="hidden" name="question_type" value="formula_question"><br>
            Znenie otazky:<br>
            <div class="mb-4">
                <input placeholder="Otázka" name="question_text"
                    class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text">
            </div>
        </div>
    `);
}
