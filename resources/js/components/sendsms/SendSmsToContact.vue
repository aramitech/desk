<template>
    <div class="modal fade" id="addsms" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add  SMS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                 <div class="trf">
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body">

 <div class="col-md-12">
            <label for="contact"> Contact</label>        
		<input class="form-control"  name="contact" v-model="fields.contact"  type="text" placeholder="contact"  required>

            <div v-if="errors && errors.contact" class="text-danger">{{ errors.contact[0] }}</div>
       
        </div> 

                        <div class="form-group">
							<label> SMS</label>
            <textarea class="form-control" name="message" id="message" v-model="fields.message" placeholder="Type SMS..."></textarea>
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
        action: '/desk/public/sendsmstocontact/add', //save action
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
