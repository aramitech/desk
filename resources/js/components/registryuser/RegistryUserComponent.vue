  <template>
             <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add File</h4>
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
							<label>Class/Category</label>
							<input class="form-control"  name="class" v-model="fields.class" value="" type="text" placeholder="" required>
                            <div v-if="errors && errors.class" class="text-danger">{{ errors.class[0] }}</div>
						</div>
                        
  
                          <div class="col-md-6">
							<label>Subject</label>
							<input class="form-control"  name="subject" v-model="fields.subject" value="" type="text" placeholder="" >
                            <div v-if="errors && errors.subject" class="text-danger">{{ errors.subject[0] }}</div>
						</div></div>

 <div class="form-group row">   

                            <div class="col-md-4">
							<label>Serial Number</label>
							<input class="form-control"  name="serial_number" v-model="fields.serial_number" value="" type="text" placeholder="" >
                            <div v-if="errors && errors.serial_number" class="text-danger">{{ errors.serial_number[0] }}</div>
						</div>
                        
  
                          <div class="col-md-4">
							<label>File Title</label>
				
         			<input class="form-control"  name="file_name" v-model="fields.file_name" value="" type="text" placeholder="" >

    <div v-if="errors && errors.file_name" class="text-danger">{{ errors.file_name[0] }}</div>
						</div>
                        
                         <div class="col-md-4">
							<label>Volume </label>
				
         			<input class="form-control"  name="volume" v-model="fields.volume" value="" type="text" placeholder="" >

    <div v-if="errors && errors.volume" class="text-danger">{{ errors.volume[0] }}</div>
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

export default {
  mixins: [ FormMixin ],
data() {
    return {
    action: '/desk/public/registry/add', //save action
        text: 'Added Succesfully',
        redirect: '',
        // redirect: '/desk/public/registryuser',
        }
    },

methods: {

    }
}
</script>

 