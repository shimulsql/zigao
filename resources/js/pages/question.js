import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
// question editor


document.addEventListener("DOMContentLoaded", function(){
  if(document.querySelector('#q-editor')){
    ClassicEditor.create(document.querySelector("#q-editor"))
    .then((editor) => {

      // init Alpine
      Alpine.data('questionState', () => ({
        title: '',
        content: '',
        tags: [],
        
        complete: {
          title: false,
          content: false,

          nextTitle: false,
          nextContent: false,
        },

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

          if( this.complete.title && this.complete.content )
          {
            // axios.post(`${import.meta.env.VITE_APP_URL}/api`)
          }

        },

        init(){
          const that = this;

          editor.model.document.on( 'change:data', () => {
            this.content = editor.getData();
          });

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

          this.$watch(['title', 'content', 'tags'], () => {
            console.log('data changing');
          })



          // tag selector
          $(this.$refs.select2).select2({
              width: "100%",
              tags: true,
              templateResult: optionTemplate,
              ajax: {
                  url: import.meta.env.VITE_APP_URL + '/api/tags/search',
                  data: function(params){
                    var query = {
                      q: params.term,
                      _token: localStorage.getItem('token')
                    }

                    return query
                  },
                  dataType: 'json',
                  delay: 300,
                  processResults: function (data) {
                      return {
                        results: data
                      };
                  },
              }
          });

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