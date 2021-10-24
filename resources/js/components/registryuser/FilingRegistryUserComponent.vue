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
							<label>Reference</label>

  <multiselect  name="file_registry_ref" v-model="fields.file_registry_ref"   label="allpref" placeholder="Select " :options="class_names"  :allow-empty="true" :multiple="false" :hide-selected="true" :max-height="150" @input="onChange">
              
            </multiselect>
                            <div v-if="errors && errors.file_registry_ref" class="text-danger">{{ errors.file_registry_ref[0] }}</div>
						</div>
      </div>

</div>





 <div class="trf"> 
<div class="form-group row">   

                            <div class="col-md-6">
							<label>Class</label>

							<input class="form-control"  name="class" v-model="fields.class" value="" type="text" placeholder="" >

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
							<input class="form-control"  name="serial_number" v-model="fields.serial_number" value="" type="text" placeholder="Shop Number" >
                            <div v-if="errors && errors.serial_number" class="text-danger">{{ errors.serial_number[0] }}</div>
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
							<label>Comment</label>
				
<textarea class="form-control" name="status" id="message" v-model="fields.status" placeholder=""></textarea>

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
  props:['data'],
data() {
    return {
        class_names: [],
        action: '/desk/public/file_registry/add', //save action
        text: 'Added Succesfully',
        redirect: '',
        //redirect: '/desk/public/filingregistryuser',
        }
    },

methods: {
      getClassName: function(){
        axios.get('/desk/public/class_names_filing/get')
        .then(function(response){
          this.class_names = response.data;   
        }.bind(this));
      },


 onChange (value) {
      this.value = value;
       this.fields.class=this.value.class;
    this.fields.subject=this.value.subject;
       this.fields.serial_number=this.value.serial_number;
     this.fields.file_name=this.value.file_name;
    //this.fields.shop_id = value.shopcompany;
   
    },

    },

    created: function(){  

     this.getClassName() ; 
    },

}
</script>
  
  
  
  