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
        getLicenseeName: function() {
          axios.get('/getLicenseeName')
          .then(function(response){
              this.company_names = response.data;
          }.bind(this));
      },
    }
}