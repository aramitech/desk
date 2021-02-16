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
        if(confirm('Sure to delete user?')){
          axios.post(fpath,id).then(function (response) {
              alert('User deleted');
              window.location.href='';
          })["catch"](function (error) {
              this.loaded = false;
              alert('Failed to delete');
          });
        }
       }
    }
}