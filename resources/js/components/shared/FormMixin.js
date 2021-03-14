export default {
data() {
    return {
        fields: {},
        errors: {},
        success: false,
        loaded: true,
        action: '/users/add', //save action
        action2: '/users/edit', //edit action
        text: 'Added Succesfully',
        redirect: '/users',
        }
    },

methods: {
    submit() {
        if (this.loaded) {
            this.loaded = false;
            this.success = false;
            this.errors = {};
            
            axios.post(this.action ?? this.action2, this.fields).then(response => {
                this.fields = {}; //Clear input fields.
                this.loaded = true;
                this.success = true;
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
                        text : 'Close',
                        className : 'btn btn-success'
                      },
                      cancel: {
                        text: 'Add New..',
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
                    this.errors = error.response.data.errors || {};
                }
                else if (error.response.status === 400)
                {
                    this.errors = error.response.data;
                }
                else {
                    this.errors = error.response.data.errors || {};
                }
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
                headers: { 'content-type': 'multipart/form-data','content-type': 'application/json' },
                    }
            let formData = new FormData();
            formData.append('file', this.fields.file);
            formData.append('company_id', this.fields.company_id );
            formData.append('licensee_name', this.fields.licensee_name ?? '');
            formData.append('trading_name', this.fields.trading_name ?? '');
            formData.append('license_no', this.fields.license_no ?? '');
            formData.append('return_for_the_period_of', this.fields.return_for_the_period_of ?? '');
            formData.append('return_for_the_period_to', this.fields.return_for_the_period_to ?? '');
            
            axios.post(this.action, formData, config)
            .then(response => {
            currentObj.success = true;
            var mtext = this.text;
            var back = this.redirect;
            swal({
              title: 'Success',
              text: mtext,
              icon: 'success',
              type: 'success',
              buttons:{
                  confirm: {
                  text : 'Go back',
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
       window.location.href = back;
      })
      .catch(error => {
          if (error.response.status === 422) {
                this.errors = error.response.data.errors || {};                
              }
              else
              {
                // start fail
                swal({
                  title: 'Oops!',
                  icon: 'error',
                  text: 'An error occurred. Try again later',
                  type: 'failure',
                  buttons : {
                    confirm: {
                      className : 'btn btn-danger'                 
                    }
                  }             
                }).then(function(){
                  window.location.href = '';
                });
                // end fail
              }
          console.log(this.errors);
          });
      },

        getLicenseeName: function() {
          axios.get('/getLicenseeName')
          .then(function(response){
              this.company_names = response.data;
          }.bind(this));
      },
    }
}