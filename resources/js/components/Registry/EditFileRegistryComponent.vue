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
							<label>Class</label>
         <input class="form-control"  name="file_registry_id" v-model="fields.file_registry_id" value="" type="hidden" placeholder="" required>

  <multiselect  name="registry_id" v-model="fields.registry_id"   label="class" placeholder="Select class" :options="class_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
          
            </multiselect>
                            <div v-if="errors && errors.class" class="text-danger">{{ errors.class[0] }}</div>
						</div>


                            <div class="col-md-6">
							<label>Class</label>
         <input class="form-control"  name="file_registry_id" v-model="fields.file_registry_id" value="" type="hidden" placeholder="" required>

  <multiselect  name="registry_id" v-model="fields.class"  placeholder="Select class" :options="class_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
          
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
   
</template>

<script>
import FormMixin from '../shared/FormMixin';
import Multiselect from 'vue-multiselect';

// register globally
Vue.component('multiselect', Multiselect)
export default {
  mixins: [ FormMixin ],
      components: { Multiselect },
  props: [ 'filingdata' ],
data() {
    return {
        action: '/desk/public/registry/updateregistry', //edit action
        text: 'Updated Succesfully',
        redirect: '',
        //redirect: '/desk/public/registry',
   class_names: [],
        fields: {

            registry_id:this.filingdata.file_registry_registry ? this.filingdata.file_registry_registry.registry_id : '',
            class:[this.filingdata.file_registry_registry ? this.filingdata.file_registry_registry.class : ''],
          subject:this.filingdata.file_registry_registry.subject,

            file_registry_id:this.filingdata.file_registry_id,
            folio:this.filingdata.folio,
            subject_heading:this.filingdata.subject_heading,
            registry_date:this.filingdata.registry_date,
            status:this.filingdata.status,

                        
        }
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
    mounted() {
        this.fields.registry_id=this.filingdata.file_registry_registry.registry_id;
        this.fields.subject=this.filingdata.file_registry_registry.subject;
  this.fields.class=[this.filingdata.file_registry_registry ? this.filingdata.file_registry_registry.class : ''];

        this.fields.file_registry_id=this.filingdata.file_registry_id;
        this.fields.folio=this.filingdata.folio;
        this.fields.subject_heading=this.filingdata.subject_heading;
        this.fields.registry_date=this.filingdata.registry_date;
        this.fields.status=this.filingdata.status;
      console.log(this.filingdata)
        
        },
          created: function(){  
     this.getClassName() ; 
        console.log(FileRegistryRegistry)
    },
}
</script>
