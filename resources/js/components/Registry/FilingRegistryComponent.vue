 <template>
    <div class="modal fade" id="addshop" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
							<label>Class</label>

  <multiselect  name="registry_id" v-model="fields.registry_id"   label="class" placeholder="Select class" :options="class_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
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
						</div></div></div>


 <div class="trf"> 
<div class="form-group row">   

                            <div class="col-md-6">
							<label>folio</label>
							<input class="form-control"  name="folio" v-model="fields.folio" value="" type="text" placeholder="folio" required>
                            <div v-if="errors && errors.folio" class="text-danger">{{ errors.folio[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Subject Heading</label>
							<input class="form-control"  name="subject_heading" v-model="fields.subject_heading" value="" type="text" placeholder="subject heading" >
                            <div v-if="errors && errors.subject_heading" class="text-danger">{{ errors.subject_heading[0] }}</div>
						</div></div>

 <div class="form-group row">   

                            <div class="col-md-6">
							<label>Registry Date</label>
							<input class="form-control"  name="registry_date" v-model="fields.registry_date" value="" type="date" placeholder="Registry Date" >
                            <div v-if="errors && errors.registry_date" class="text-danger">{{ errors.registry_date[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Status</label>
				
         			<input class="form-control"  name="status" v-model="fields.status" value="" type="text" placeholder="status" >

    <div v-if="errors && errors.status" class="text-danger">{{ errors.status[0] }}</div>
						</div></div></div>



                        
                    </div>
                    <div class="modal-footer"> <div class="trf"> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div> </div>
                </form>
            </div>
        </div>
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
        class_names: [],
        action: '/desk/public/file_registry/add', //save action
        text: 'Added Succesfully',
        redirect: '/desk/public/filingregistry',
        }
    },

methods: {
      getClassName: function(){
        axios.get('/desk/public/class_names/get')
        .then(function(response){
          this.class_names = response.data;   
        }.bind(this));
      },


 onChange (value) {
      this.value = value;
    this.fields.subject=this.value.subject;
       this.fields.number=this.value.number;
     this.fields.file_name=this.value.file_name;
    //this.fields.shop_id = value.shopcompany;
    console.log(value)
    },

    },

    created: function(){  

     this.getClassName() ; 
    },

}
</script>
