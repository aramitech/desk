 <template>
               <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Filing Registry</h4>
      <!-- <form method="POST" @submit.prevent="submit">
          <button type="submit" class="btn btn-primary">View Bookmarker Shop</button>
       </form> -->
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" @submit.prevent="submit">
                    <div class="modal-body"> 
                        
 <div class="trf"> 
<div class="form-group row">   

                            <div class="col-md-6">
							<label>Folio</label>

  <multiselect  name="file_registry_id" v-model="fields.file_registry_id"   label="folio" placeholder="Select class" :options="folio_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
                            <div v-if="errors && errors.class" class="text-danger">{{ errors.class[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Subject</label>
							<input class="form-control"  name="subject" v-model="fields.subject" value="" type="text" placeholder="subject" >
                            <div v-if="errors && errors.subject" class="text-danger">{{ errors.subject[0] }}</div>
						</div></div>

 <div class="form-group row">   

                            <div class="col-md-6">
							<label>Number</label>
							<input class="form-control"  name="number" v-model="fields.number" value="" type="text" placeholder="Shop Number" >
                            <div v-if="errors && errors.number" class="text-danger">{{ errors.number[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>File Name</label>
				
         			<input class="form-control"  name="file_name" v-model="fields.file_name" value="" type="text" placeholder="file_name" >

    <div v-if="errors && errors.file_name" class="text-danger">{{ errors.file_name[0] }}</div>
						</div></div>

   <div class="form-group row">   

                            <div class="col-md-6">
							<label>Subject Heading</label>
							<input class="form-control"  name="subject_heading" v-model="fields.subject_heading" value="" type="text" placeholder="Subject Heading" >
                            <div v-if="errors && errors.subject_heading" class="text-danger">{{ errors.subject_heading[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Folio</label>
				
         			<input class="form-control"  name="folio" v-model="fields.folio" value="" type="text" placeholder="folio" >

    <div v-if="errors && errors.folio" class="text-danger">{{ errors.folio[0] }}</div>
						</div></div>                      
                        
                        
                        </div>
 <div class="trf"> 
     MOVEMENT OF FILES
</div>
 <div class="trf"> 
<div class="form-group row">   

                            <div class="col-md-6">
							<label>Date Issued</label>
							<input class="form-control"  name="date_issued" v-model="fields.date_issued" value="" type="date" placeholder="folio" required>
                            <div v-if="errors && errors.date_issued" class="text-danger">{{ errors.date_issued[0] }}</div>
						</div>
                        
  
             
                      

<div class="col-md-6">
							<label>Issued To</label>
							<input class="form-control"  name="issued_to" v-model="fields.issued_to" value="" type="text" placeholder="Issued To" >
                            <div v-if="errors && errors.issued_to" class="text-danger">{{ errors.issued_to[0] }}</div>
						</div>
                      
                        </div>

 <div class="form-group row">   

                            <div class="col-md-6">
							<label>Duration Issued</label>
				
         			<input class="form-control"  name="duration_issued" v-model="fields.duration_issued" value="" type="text" placeholder="Duration Issued" >

    <div v-if="errors && errors.duration_issued" class="text-danger">{{ errors.duration_issued[0] }}</div>
						</div>      
                        
   <div class="col-md-6"> 
							<label>Reason You Issued/Comment</label>
         		
                   <textarea class="form-control" name="reason_you_issue" id="reason_you_issue" v-model="fields.reason_you_issue" placeholder="Type Reason..."></textarea>
                            <div v-if="errors && errors.reason_you_issue" class="text-danger">{{ errors.reason_you_issue[0] }}</div>
						</div> 
                         </div></div>



                        
                    </div>
                    <div class="modal-footer"> <div class="trf"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> </div>
                </form>
            </div>
   
</template>

<script>
import FormMixin from '../shared/FormMixin';
import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)
export default {
  mixins: [ FormMixin ],
    components: { Multiselect },
  props:['data'],
data() {
    return {
        folio_names: [],
        action: '/desk/public/assign_registry/add', //save action
        text: 'Added Succesfully',
        redirect: '',
        // redirect: '/desk/public/assignregistryuser',
        }
    },

methods: {
      getClassName: function(){
        axios.get('/desk/public/folio_names/get')
        .then(function(response){
          this.folio_names = response.data;   
        }.bind(this));
      },


     onChange (value) {
    this.value = value;
    this.fields.subject=this.value.file_registry_registry.subject;
    this.fields.number=this.value.file_registry_registry.number;
    this.fields.file_name=this.value.file_registry_registry.file_name;
    this.fields.folio=this.value.folio;
    this.fields.subject_heading=this.value.subject_heading;

    //this.fields.shop_id = value.shopcompany;
    console.log(value)
    },

    },

    created: function(){  

     this.getClassName() ; 
    },

}
</script>
