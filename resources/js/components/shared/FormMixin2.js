export default {
    data() {
      return {
        fields: {},
        errors: {},
        success: false,
        loaded: true,
        action: '', //save action
        action2: '', //edit action
        action3: '', //import action
        action5: '', 
        text5: '',
        text: '',
        redirect: '',
        busy:false,
      }
    },
  
    methods: {
      
      submit() {
        this.busy = true;//
        if (this.loaded) {
          this.loaded = false;
          this.success = false;
          this.errors = {};
          axios.post(this.action, this.fields).then(response => {
            //this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            this.busy = false;//
            //sweet alert with redirect
            var mtext = this.text;
            var back = this.redirect;
            swal({
              title: 'Success',
              text: mtext,
              icon: 'success',
              type: 'success',
              buttons:{
                confirm: {
                  text : 'Go Back',
                  className : 'btn btn-success'
                },
                cancel: {
                  text: 'Add more..',
                  visible: true,
                  className: 'btn btn-info'
                }
              }
            }).then((Delete) => {
              if (Delete) {
                window.location.href = back;
              } else {
                swal.close();
              }
            });

          }).catch(error => {
            this.loaded = true;
            if (error.response.status === 422) {
              this.busy = false;//
              this.errors = error.response.data.errors || {};
            }
            else {
              swal({
                title: 'Error!',
                text: 'Something went wrong, please try again',
                type: 'failure',
                buttons : {
                  confirm: {
                    className : 'btn btn-danger'                 
                  }
                }             
              }).then(function(){
                window.location.href = '';
              });
            }
            this.busy = false;//
          });
        }
      },
      update() {
    
        
        if (this.loaded) {
          this.busy = true;//
          this.loaded = false;
          this.success = false;
          this.errors = {};
          console.log(this.fields);
          axios.post(this.action2, this.fields).then(response => {
            //this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            this.busy = false;//
            //console.log(response.data);
            //sweet alert with redirect
            var mtext = this.text;
            var back = this.redirect;
            swal({
              title: 'Success',
              text: mtext,
              icon: 'success',
              type: 'success',
              buttons:{
                confirm: {
                  text : 'Go Back',
                  className : 'btn btn-success'
                },
                cancel: {
                  text: 'Edit Again',
                  visible: true,
                  className: 'btn btn-info'
                }
              }
            }).then((Delete) => {
              if (Delete) {
                window.location.href = back;
              } else {
                swal.close();
              }
            });


          }).catch(error => {
           
            this.loaded = true;
            this.busy = false;//
            if (error.response.status === 422) {
              this.busy = false;//
              this.errors = error.response.data.errors || {};
             
            }
            else {
              swal({
                title: 'Error!',
                text: 'Something went wrong, please try again',
                type: 'failure',
                buttons : {
                  confirm: {
                    className : 'btn btn-danger'                 
                  }
                }             
              }).then(function(){
                window.location.href = '';
              });
            }
            
            console.log(this.errors);
          });
        }
      },
      update5() {
    
        
        if (this.loaded) {
          this.loaded = false;
          this.success = false;
          this.errors = {};
          console.log(this.fields);
          axios.post(this.action5, this.fields).then(response => {
            //this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            //console.log(response.data);
            //sweet alert with redirect
            var mtext = this.text5;
            var back = this.redirect;
            swal({
              title: 'Success',
              text: mtext,
              icon: 'success',
              type: 'success',
              buttons:{
                confirm: {
                  text : 'Go Back',
                  className : 'btn btn-success'
                },
                cancel: {
                  text: 'Edit Again',
                  visible: true,
                  className: 'btn btn-info'
                }
              }
            }).then((Delete) => {
              if (Delete) {
                window.location.href = back;
              } else {
                swal.close();
              }
            });


          }).catch(error => {
           
            this.loaded = true;
            this.busy = false;//
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
             
            }
            else {
              swal({
                title: 'Error!',
                text: 'Something went wrong, please try again',
                type: 'failure',
                buttons : {
                  confirm: {
                    className : 'btn btn-danger'                 
                  }
                }             
              }).then(function(){
                window.location.href = '';
              });
            }
            
            console.log(this.errors);
          });
        }
      },
      onFileChange(e){
        console.log(e.target.files[0]);
        this.fields.file = e.target.files[0];
        },
      formSubmit(e) {
        this.busy = true;//
          e.preventDefault();
          let currentObj = this;
          const config = {
              headers: { 'content-type': 'multipart/form-data' }
                  }
          let formData = new FormData();
          formData.append('file', this.fields.file);
          formData.append('sub_subcategory', this.fields.sub_subcategory ? this.fields.sub_subcategory.id : '');
          formData.append('data_type', this.fields.data_type ? this.fields.data_type.id : '');
          formData.append('content', this.fields.content);
          formData.append('news', this.fields.news);
          formData.append('status', this.fields.status);
          formData.append('title', this.fields.title);
          formData.append('publications_name', this.fields.publications_name);
          
          formData.append('name', this.fields.name ?? '');
formData.append('email', this.fields.email ?? '');
formData.append('perspnal_file_no', this.fields.perspnal_file_no ?? '');
formData.append('departments_id', this.fields.departments_id['departments_id'] ?? '');
formData.append('phone', this.fields.phone ?? '');
formData.append('section', this.fields.section ?? '');
formData.append('user_types_id', this.fields.user_types_id['user_types_id'] ?? '');
formData.append('password', this.fields.password ?? '');
formData.append('password_confirmation', this.fields.password_confirmation ?? '');
          // formData.append('category', this.fields.category ? this.fields.category.id : '');
          formData.append('id', this.fields.id);
          console.log(formData);
          this.errors = {};
          axios.post(this.action3, formData, config)
          .then(response => {
          currentObj.success = true;
          this.loaded = true;
          this.busy = false;//
          var mtext = this.text;
            var back = this.redirect;
          swal({
              title: 'Success',
              text: mtext,
              icon: 'success',
              type: 'success',
              buttons:{
                  confirm: {
                  text : 'Go Back',
                  className : 'btn btn-success'
                  },
                  cancel: {
                  text: 'Add more..',
                  visible: true,
                  className: 'btn btn-info'
                  }
              }
              }).then((Delete) => {
              if (Delete) {
                  window.location.href = back;
              } else {
                  swal.close();
              }
              });
      })
  .catch(error => {
    this.busy = false;//
      if (error.response.status === 422) {
        
      this.errors = error.response.data.errors || {};                
          }
        else {
          swal({
            title: 'Error!',
            text: 'Something went wrong, please try again',
            type: 'failure',
            buttons : {
              confirm: {
                className : 'btn btn-danger'                 
              }
            }             
          }).then(function(){
            window.location.href = '';
          });
        }
      console.log(this.errors);
      });
  },
    formSubmit1(e) {
      this.busy = true;//
      e.preventDefault();
      let currentObj = this;
      const config = {
          headers: { 'content-type': 'multipart/form-data' }
              }
      let formData = new FormData();
      formData.append('file', this.fields.file);
      formData.append('image', this.fields.image);
      formData.append('name', this.fields.name);     
      formData.append('type', this.fields.type);      
      formData.append('id', this.fields.id);      
      formData.append('status', this.fields.status);     
      formData.append('title', this.fields.title);
      formData.append('message', this.fields.message);      
      formData.append('visible', this.fields.visible);
      console.log(formData);
      this.errors = {};
      axios.post(this.action3, formData, config)
      .then(response => {
      currentObj.success = true;
      this.busy = false;//
      var mtext = this.text;
        var back = this.redirect;
      swal({
          title: 'Success',
          text: mtext,
          icon: 'success',
          type: 'success',
          buttons:{
              confirm: {
              text : 'Go Back',
              className : 'btn btn-success'
              },
              cancel: {
              text: 'Add more..',
              visible: true,
              className: 'btn btn-info'
              }
          }
          }).then((Delete) => {
          if (Delete) {
              window.location.href = back;
          } else {
              swal.close();
          }
          });
  })
  .catch(error => {
    this.busy = false;//
  if (error.response.status === 422) {
    this.busy = false;//
  this.errors = error.response.data.errors || {};                
      }
    else {
      swal({
        title: 'Error!',
        text: 'Something went wrong, please try again',
        type: 'failure',
        buttons : {
          confirm: {
            className : 'btn btn-danger'                 
          }
        }             
      }).then(function(){
        window.location.href = '';
      });
    }
      
  console.log(this.errors);
  });
  }
    },
    created: function(){
      
  }
  }