import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
import _ from "lodash";
import { strToSelect } from "../helpers/select2";
// question editor


document.addEventListener("DOMContentLoaded", function(){
  if(document.querySelector('#q-editor')){
    ClassicEditor.create(document.querySelector("#q-editor"))
    .then((editor) => {

      // init Alpine
      Alpine.data('questionState', () => ({
        title: '',
        content: '',
        tagsStr: '',
        tags: [],
        loading: false,
        
        complete: {
          all: false,

          title: false,
          content: false,

          nextTitle: false,
          nextContent: false,
        },

        draft: false,

        unlockContent(){

          if(this.complete.nextTitle){
            this.complete.title = true;
            window.scrollTo({
              top: 300,
              behavior: "smooth"
            })
          }
          
        },

        unlockTags(){

          if(this.complete.nextContent){
            this.complete.content = true;
            window.scrollTo({
              top: 600,
              behavior: "smooth"
            })
          }
          
        },

        submitData(){
          if( this.complete.all )
          {
            this.loading = true;

            axios.post(`/question`)
            .then(res => {
              this.loading = false;
              // redirect
              window.location = '/'
            })
          }

        },

        saveDraft(){
          if(!this.draft) this.draft = true;

          axios.post(`/question/save-draft`, {
            data: {
              title: this.title,
              content: this.content,
              tags: Array.from(this.tags).join('+')
            }
          })
        },

        clearDraft(){
          Swal.fire({
            title: 'Discard Question',
            text: "Are you sure to discard this question? This cannot be undone",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#c94239',
            cancelButtonColor: '#757575',
            confirmButtonText: 'Discard Question',
            backdrop: 'rgba(94, 57, 57, 0.51)'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.delete('question/delete-draft')
              .then(() => {
                window.location.reload()
              })
            }
          })
        },

        init(){
          const that = this;

          editor.model.document.on( 'change:data', () => {
            this.content = editor.getData();
          });
          this.content = editor.getData();

          // if data is present on initialization, set complete status to true
          setTimeout(() => {
            if(
              this.title.length > 5 &&
              editor.getData().length > 20 
              )
            {
              this.complete.title = true;
              this.complete.content = true;
              this.complete.nextTitle = true;
              this.complete.nextContent = true;
            }
          }, 100);
          

          // watch title
          this.$watch('title', (data) => {
            data.length > 3 ? this.complete.nextTitle = true : this.complete.nextTitle = false;
          })

          // watch content
          this.$watch('content', (data) => {
            data.length > 20 ? this.complete.nextContent = true : this.complete.nextContent = false;
          })

          // watch status of nextTitle
          this.$watch('complete.nextTitle', (data) => {
            if(!data) this.complete.title = false; 
          })

          // watch status of nextContent
          this.$watch('complete.nextContent', (data) => {
            if(!data) this.complete.content = false; 
          })


          this.$watch('tags', (data) => {
          console.log('watching tags', data);
          })

          
          this.$watch('tagsStr', (data) => {
            // set string tags data to tags array
            that.tags = strToSelect(data, true);          
          })

          // watch all to save data as draft
          this.$watch(['title', 'content', 'tags'], _.debounce(() => {
            this.saveDraft()
          }, 1000))


          this.$watch(['complete.title', 'complete.content'], () => {
            if(
              this.complete.title &&
              this.complete.content 
            ){
              this.complete.all = true
            }
            else{
              this.complete.all = false
            }
          }, 1000)



        // tag selector
        setTimeout(() => {
          let s2inst = $(this.$refs.select2).select2({
            width: "100%",
            tags: true,
            templateResult: optionTemplate,
            data: strToSelect(this.tagsStr),
            ajax: {
                url: import.meta.env.VITE_APP_URL + '/api/tags/search',
                headers: {
                  "X-Token": localStorage.getItem('token'),
                },
                data: function(params){
                  var query = {
                    q: params.term
                  }

                  return query
                },
                dataType: 'json',
                delay: 500,
                processResults: function (data) {
                    return {
                      results: data
                    };
                },
            }
          });

        }, 100);
          

          $(this.$refs.select2).on('change', function(e){
            let options = Array.from(e.target.options)
            .filter(option => option.selected)
            .map(option => option.text)

            that.tags = options
          })

        }

      }));

    })
    .catch((error) => {
        console.error(error);
    });
  }
})


/**
 * Select 2
 * */


// question tag selector

// format list item
function optionTemplate(state){
    if (!state.id) {
        return state.text;
    }
    var count = state.count;

    if(count == undefined) return $('<span class="px-2 py-0.5 bg-sky-200 text-sky-700 text-xs rounded font-medium">' + state.text + '</span>'); 

    var template = $(
        '<div class="flex"><div class="w-[90%] grow"><span class="px-2 py-0.5 bg-sky-200 text-sky-700 text-xs rounded font-medium">' + state.text + '</span> <span class="text-gray-500 text-xs">'+count+'</span></div><div><a href="" target="_blank"><i class="fa-solid fa-circle-question text-xs text-gray-500 p-1 hover:bg-white rounded"></i></a></div></div>'
    );

    return template;
}


// Answer of question
document.addEventListener("DOMContentLoaded", function(){
  if(document.querySelector('#answer')) {

    ClassicEditor.create(document.querySelector('#answer'))
    .then( editor => {

      Alpine.data("answerState", () => ({
        content: '',
        question_id: 0,
        hasError: true,
        submit() {
          
        },
        saveDraft() {
          axios.post('/answer/draft/save', {
            content: this.content,
            question_id: this.question_id,
          })
        },
        init(){
          const that = this;

          editor.model.document.on( 'change:data', () => {
            this.content = editor.getData();
            console.log(editor.getData());
          });

          this.content = editor.getData();

          // Watchers 
          this.$watch('content', (data) => {
            if(data.length < 20) {
              this.hasError = true;
            } else{
              this.hasError = false;
            }
          })

          this.$watch('content', _.debounce(() => {
            this.saveDraft();
          }, 1000))

        }


      }));

      

    })
  }
})