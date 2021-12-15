<template>
    <div class="modal fade" id="emailtaskingpdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">MAIL TASKING AS PDF</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                 <div class="trf">
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">

 <div class="col-md-12">
            <label for="email"> email</label>        
		<input class="form-control"  name="email" v-model="fields.email"  type="text" placeholder="email"  required>

            <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
       
        </div> 



 <div class="col-md-12">
            <label for="subject"> Subject</label>        
		<input class="form-control"  name="subject" v-model="fields.subject"  type="text" placeholder="subject"  >

            <div v-if="errors && errors.subject" class="text-danger">{{ errors.subject[0] }}</div>
       
        </div> 

                        <div class="form-group">
							<label> Message</label>
            <textarea class="form-control" name="message" id="message" v-model="fields.message" placeholder="Type Message..."></textarea>
                            <div v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</div>
						</div>
						
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormMixin from '../shared/FormMixin';


export default {
  mixins: [ FormMixin ],
data() {
    return {
        action: '/desk/public/send-mail-tasking', //save action
        text: 'Sent Succesfully',
        redirect: '',

             company_names: [],
             fields: {
  
      }
        }

     
    },

methods: {
     getCompanyName: function(){
        axios.get('/desk/public/company_name/get')
        .then(function(response){
          this.company_names = response.data;        
        }.bind(this));
      },
    },

       created: function(){  
     this.getCompanyName()   
    },
}
</script>
