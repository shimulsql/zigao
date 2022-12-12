import "./bootstrap";
import "../fonts/fontawesome/css/all.min.css";
import "select2/dist/css/select2.min.css";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic/build/ckeditor";
import select2 from "select2";

// text editor
ClassicEditor.create(document.querySelector("#q-editor")).catch((error) => {
    console.error(error);
});

/**
 * Select 2
 * */

// hook up jquery
select2($);

// question tag selector

// format list item
function optionTemplate(state){
    if (!state.id) {
        return state.text;
    }

    var count = $(state.element).data("count");

    if(count == undefined) return $('<span class="px-2 py-0.5 bg-sky-200 text-sky-700 text-xs rounded font-medium">' + state.text + '</span>'); 

    var template = $(
        '<div class="flex"><div class="w-[90%] grow"><span class="px-2 py-0.5 bg-sky-200 text-sky-700 text-xs rounded font-medium">' + state.text + '</span> <span class="text-gray-500 text-xs">'+count+'</span></div><div><a href="" target="_blank"><i class="fa-solid fa-circle-question text-xs text-gray-500 p-1 hover:bg-white rounded"></i></a></div></div>'
    );

    return template;
}

$('#tag-selector').select2({
    width: "100%",
    tags: true,
    templateResult: optionTemplate,
});