export default {
    data() {
      return {
        
        fields: {},
        errors: {},
        loaded: true,
        action: '', 
        text: '',
        redirect: ''
      }
    },  
    methods: {  
      //method for deleting admin user used in the views/adminuser.index blade
      deleteItem: function deleteItem(path,id){
       
        var userdeletepath='/users/delete';

        var fpath='';
        var item='';
        if(path=="userdelete"){
          fpath=userdeletepath;
          item="User ";
        }
        swal({
          title:'Sure to delete?',id,
          text: 'Delete '+item,
          icon: 'warning',
          type: 'warning',
          buttons:{
            confirm: {
              text : 'Sure',
              className : 'btn btn-success'
            },
            cancel: {
              visible: true,
              className: 'btn btn-info'
            }
          }
        }).then((Delete) => {
          if (Delete) {
            console.log("before: " , fpath +id);
            axios.post(fpath,id).then(function (response) {
                //this.loaded = true;
                console.log("while:" , fpath +id);
                console.log(response);
                swal({
                  title: 'Deleted!',
                  text: item+' has been deleted.',
                  type: 'success',
                  buttons : {
                    confirm: {
                      className : 'btn btn-success'                 
                    }
                  }             
                }).then(function(){
                  window.location.href = '';
                });
              
            })["catch"](function (error) {
                this.loaded = false;
            });
          } else {
                swal.close();
            }
        });
       }
    }
}